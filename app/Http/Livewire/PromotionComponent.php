<?php

namespace App\Http\Livewire;

use App\Models\Activites;
use App\Models\ActivityUser;
use App\Models\Designations;
use App\Models\Promotion;

use Livewire\Component;

use Illuminate\Http\Request;

use DB;

use DateTime;

use App\Models\User;

class PromotionComponent extends Component
{

    public $promotion_for, $promotion_from, $promotion_to, $promotion_date,$promotion_edit_id,$promotion_delete_id,$users;

    public function mount(){
        $this->users=User::where('deleted_at',null)->get();
    }

    public function storePromotionData(Request $request)
    {

        //on form submit validation
        $this->validate([
            'promotion_for'  => 'required',
            'promotion_to'   => 'required',
            'promotion_date' => 'required|date',

        ]);

        //Add Promotion Data
        $promotion                 = new Promotion();
        $promotion->promotion_for  = $this->promotion_for;
        $promotion->promotion_from = $this->promotion_from;
        $promotion->promotion_to   = $this->promotion_to;
        $promotion->promotion_date = $this->promotion_date;
        $user_department = User::where('users.id', $this->promotion_for)->first();
        $promotion->promotion_from = $user_department->Job_title;
        $promotion->save();
        $promotionInfo = DB::table('promotions')
                     ->join('users','promotions.promotion_for','users.id')
                     ->join('designations as job_title','promotions.promotion_from','job_title.id')
                     ->join('designations as designation','promotions.promotion_to','designation.id')
                     ->where('promotions.id',$promotion->id)
                     ->select('users.name as user_name','job_title.name as job_title_name','designation.name as designation_name','promotions.promotion_date as promotion_date')
                    ->first();
        $toDate = new DateTime($promotionInfo->promotion_date);

        $dateTo = $toDate->format('d-m-Y');

        $activity = Activites::create([
            'page_name' => 'promotion',
            'link' => '/activities',
            'description'    => $promotionInfo->user_name . ' promotion from ' . $promotionInfo->job_title_name . ' to '.  $promotionInfo->designation_name .' at ' . $dateTo,
            'description_ar' => $promotionInfo->user_name . ' ترقية من ' . $promotionInfo->job_title_name . ' الي '.  $promotionInfo->designation_name .' في ' . $dateTo

        ]);

            ActivityUser::create([
                'activity_id' => $activity->id,
                'send_id'     => auth()->user()->id,
                'receive_id'  => $this->promotion_for
            ]);

        $promotionUser=User::where('id',$this->promotion_for)->first();
        $details = [
            'title' => 'Promotion',
            'name' =>   $promotionUser->name,
            'body' =>   $promotionInfo->user_name . ' promotion from ' . $promotionInfo->job_title_name . ' to '.  $promotionInfo->designation_name .' at ' . $dateTo,
            'body_ar'=> $promotionInfo->user_name . ' ترقية من ' . $promotionInfo->job_title_name . ' الي '.  $promotionInfo->designation_name .' في ' . $dateTo
        ];

        \Mail::to($promotionUser->email)->send(new \App\Mail\MyEmail($details));

        $promotionUsers = User::permission('promotion-read')->get();
        $activity = Activites::create([
            'page_name' => 'promotion',
            'link' => '/promotion',
            'description' => $promotionInfo->user_name . ' promotion from ' . $promotionInfo->job_title_name . ' to '.  $promotionInfo->designation_name .' at ' . $dateTo,
            'description_ar' => $promotionInfo->user_name . ' ترقية من ' . $promotionInfo->job_title_name . ' الي '.  $promotionInfo->designation_name .' في ' . $dateTo

        ]);

        foreach ($promotionUsers as $promotionUser) {

                ActivityUser::create([
                    'activity_id' => $activity->id,
                    'send_id'     => auth()->user()->id,
                    'receive_id'  => $promotionUser->id
                ]);
            }

        session()->flash('message', __('added successfully'));
        $this->promotion_for  = '';
        $this->promotion_from = '';
        $this->promotion_to   = '';
        $this->promotion_date = '';

        //For hide modal after add employee success
        $this->dispatchBrowserEvent('close-modal');
    }

    public function resetInputs()
    {
        $this->promotion_for  = '';
        $this->promotion_from = '';
        $this->promotion_to   = '';
        $this->promotion_date = '';

    }


    public function close()
    {
        $this->resetInputs();
    }

    public function editPromotion($id)
    {
        $promotion = Promotion::where('id', $id)->first();

        $user_prom = $user_department = DB::table('users')
            ->join('designations', 'users.job_title', '=', 'designations.id')
            ->where('users.id', $promotion->promotion_for)
            ->select('users.name as user_name','designations.name as designations_name')
            ->first();

        $this->promotion_edit_id = $promotion->id;
        $this->promotion_for     = $promotion->promotion_for;
        $this->promotion_from    = $user_prom->designations_name;
        $this->promotion_to      = $promotion->promotion_to;

        $this->promotion_date    = $promotion->promotion_date;

        $this->dispatchBrowserEvent('show-edit-promotion-modal');
    }

    public function editPromotionData()
    {
        //on form submit validation
        $this->validate([
            'promotion_to'   => 'required',
            'promotion_date' => 'required|date',

        ]);

        $promotion = Promotion::where('id', $this->promotion_edit_id)->first();

        $promotion->promotion_to      = $this->promotion_to;
        $promotion->promotion_date	  = $this->promotion_date;

        $promotion->save();



        session()->flash('message', __('updated successfully'));

        //For hide modal after add employee success
        $this->dispatchBrowserEvent('close-modal');
    }


    //Delete Confirmation
    public function deleteConfirmation($id)
    {
        $this->promotion_delete_id = $id; //employee id

        $this->dispatchBrowserEvent('show-delete-confirmation-modal');
    }

    public function deletePromotionData()
    {
        $promotion = Promotion::where('id', $this->promotion_delete_id)->first();
        $promotion->delete();

        session()->flash('message', __('deleted successfully'));

        $this->dispatchBrowserEvent('close-modal');

        $this->promotion_delete_id = '';
    }

    public function cancel()
    {
        $this->promotion_delete_id = '';
    }


    public function render()
     {
         $promotions = DB::table('users')
             ->join('promotions', 'users.id', '=', 'promotions.promotion_for')
             ->leftjoin('departments','promotions.promotion_from','departments.id')
             ->leftjoin('designations','users.job_title','designations.id')
             ->leftjoin('designations as job_title','promotions.promotion_to','job_title.id')
             ->select('promotions.*', 'users.id as user_id','users.photo as user_photo', 'users.first_name as user_first_name',
                      'users.last_name as user_last_name','departments.name as department_name','designations.name as designation_name',
                       'job_title.name as job_title_name')
             ->get();
         $users=User::all();
         $job_titles=Designations::all();
        return view('livewire.promotion-component',['promotions'=>$promotions,'users'=>$users,'job_titles'=>$job_titles])->layout('livewire.layouts.base');
     }
}
