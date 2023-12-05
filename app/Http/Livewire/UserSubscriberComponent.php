<?php

namespace App\Http\Livewire;

use App\Models\UserSubscriber;
use Livewire\Component;
use Illuminate\Http\Request;
use Carbon\Carbon;

class UserSubscriberComponent extends Component
{

    public $terminated_employee,$termination_type,$termination_date,$reason,$notice_date,$termination_edit_id,$termination_delete_id,$termination_type_selects;




    public function resetInputs()
    {
        $this->terminated_employee = '';
        $this->termination_type    = '';
        $this->termination_date    = '';
        $this->reason              = '';
        $this->notice_date         ='';
    }


    public function close()
    {
        $this->resetInputs();
    }

    public function editTermination($id)
    {
        $termination = Termination::where('id', $id)->first();
        $employee_name=User::where('id',$termination->terminated_employee)->first();
        $this->termination_edit_id   = $termination->id;
        $this->terminated_employee   = $employee_name->name;
        $this->termination_type      = $termination->termination_type;
        $this->termination_date      = $termination->termination_date;
        $this->reason                = $termination->reason;
        $this->notice_date           = $termination->notice_date;

        $this->dispatchBrowserEvent('show-edit-termination-modal');
    }

    public function editTerminationData()
    {
        //on form submit validation
        $this->validate([
            'termination_type'    => 'required',
            'termination_date'    => 'required|date',
            'reason'               => 'required',
            'notice_date'         => 'required|date'

        ]);

        $termination = Termination::where('id', $this->termination_edit_id)->first();
        $termination->termination_type    = $this->termination_type;
        $termination->termination_date    = $this->termination_date;
        $termination->reason              = $this->reason;
        $termination->notice_date         = $this->notice_date;
        $termination->save();

        session()->flash('message', __('updated successfully'));

        //For hide modal after add employee success
        $this->dispatchBrowserEvent('close-modal');
    }


    //Delete Confirmation
    public function deleteConfirmation($id)
    {
        $this->termination_delete_id = $id; //termination id

        $this->dispatchBrowserEvent('show-delete-confirmation-modal');
    }

    public function deleteResignationData()
    {
        $termination = Termination::where('id', $this->termination_delete_id)->first();
        $termination->delete();

        session()->flash('message', __('deleted successfully'));

        $this->dispatchBrowserEvent('close-modal');

        $this->termination_delete_id = '';
    }

    public function cancel()
    {
        $this->termination_delete_id = '';
    }

    public function render(Request $request)
    {
        // $plans=UserSubscriber::all();

// dd($request->all());
        $today = Carbon::now()->startOfDay();
        $future_date = Carbon::now()->addDays(30)->endOfDay();
        $query = UserSubscriber::query();

        if($request['anneualrRevenue']){

            $query->whereYear('created_at', '=', Carbon::now()->year)->where('is_paid','1')->get();
        }
        if($request['nearExpire']){
            // dd(Carbon::now()->subDays(30)->format('d-m-Y'));
        // $query->where('end_date', '<=', Carbon::now()->addDays(30)->format('d-m-Y'))->where('is_paid','1')->get();

        $query->whereBetween('end_date', [$today, $future_date])->where('is_paid','1')->get();

        }

        if($request->expired){

            $query->where('end_date','<', $today)->where('is_paid','1')->get();
    }
            $plans =   $query ->get();


        return view('livewire.user-subscriber-component',['plans'=>$plans])->layout('livewire.layouts.base');
    }
}
