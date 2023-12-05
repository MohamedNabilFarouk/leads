<?php

namespace App\Http\Livewire;

use App\Models\Company_client;
use App\Models\Designations;
use App\Models\ProjectImage;

use Illuminate\Http\Request;
use Livewire\Component;
use App\Models\Lead;
use App\Models\LeadActivity;
use App\Models\Project;

use App\Models\User;
use App\Http\Controllers\UploadPhoto;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use App\Imports\LeadsImport;
use Maatwebsite\Excel\Facades\Excel;
use Validator;

class LeadsComponent extends Component
{
    use WithFileUploads;
    public $name,$email,$phone, $project_id, $lead_edit_id, $lead_delete_id,$users,$status,$channel,$projects,$note,
    $search_subject, $search_status,$created_by,$comment,$activity,$leads_channel;
    public  $assign_staff=[];
    public  $followers=[];
    public $editorValue;
    public function mount(){
        $this->users=User::all();
        $this->projects=Project::all();
        $this->leads_channel=[
            '1' =>  ["en"=>'olx',"ar"=>'اولكس'],
            '2' =>  ["en"=>'Facebook',"ar"=>'فيسبوك'],
            '3' =>  ["en"=>'Fresh Lead',"ar"=>'جديد'],
            '4' =>  ["en"=>'Old Lead',"ar"=>'قديم'],
            '5' =>  ["en"=>'Open Sooq',"ar"=>'Open Sooq'],
            '6' =>  ["en"=>'property finder',"ar"=>'property finder'],
            '7' =>  ["en"=>'Campain',"ar"=>'حملة اعلانية'],
            '8' =>  ["en"=>'Other',"ar"=>'أخري']
        ];
}



    protected $listeners = ['editorValueChanged'];

    public function editorValueChanged($value)
    {
        $this->editorValue = $value;
    }


    public function storeLeadData(Request $request)
    {

        //on form submit validation
        $this->validate([
            // 'name'  => 'required',
            // 'email' => 'required',
            'phone'=> 'required',
            // 'status'=> 'required',
            // 'project_id'=> 'required',
        ]);



//        $uploadController=app(UploadPhoto::class);
//        $image=$uploadController->upload($this->photo);

        //Add Ticket Data
        $lead = new Lead();
        $lead->name          = $this->name;
        $lead->email                 = $this->email;
        $lead->phone                 = $this->phone;
        $lead->project_id                 = $this->project_id;
        $lead->status                 = $this->status;
        $lead->note                 = $this->note;
        $lead->channel                 = $this->channel;
        $lead->assign_staff        = json_encode($this->assign_staff);
        $lead->created_by               = auth()->user()->id;

        // dd(json_encode($this->assign_staff));
//        $project->photo = $image;
        $lead->save();


        session()->flash('message', __('added successfully'));

        $this->name           ='';
        $this->channel           ='';
        $this->email               ='';
        $this->phone            ='';
        $this->status            ='';
        $this->note            ='';
        $this->project_id            ='';
        $this->assign_staff       =[];


        //For hide modal after add student success
        $this->dispatchBrowserEvent('close-modal');
    }


    public function resetInputs()
    {
        $this->name           ='';
        $this->email               ='';
        $this->phone            ='';
        $this->status            ='';
        $this->note            ='';
        $this->project_id            ='';
        $this->assign_staff       =[];

    }

    public function close()
    {
        $this->resetInputs();
    }

    public function editLead($id)
    {

        $lead = Lead::where('id', $id)->first();
        // dd($lead);
        $this->name           =  $lead->name  ;
        $this->lead_edit_id     =  $id ;
        $this->email           = $lead->email ;
        $this->project_id           = $lead->project_id ;
        $this->status           = $lead->status ;
        $this->note           = $lead->note ;
        $this->channel           = $lead->channel ;
        $this->phone           = $lead->phone  ;
        $this->assign_staff    = json_decode($lead->assign_staff);
        $this->created_by     =  $lead->created_by ;




        $this->dispatchBrowserEvent('show-edit-lead-modal');
    }



    public function editLeadData()
    {
        //on form submit validation
        $this->validate([
            // 'name'  => 'required',
            // 'status' => 'required',
            'phone'=> 'required',
        ]);
// dd($this->project_id);

        $lead = Lead::where('id', $this->lead_edit_id)->first();

        $lead->name          = $this->name;
        $lead->email                 = $this->email;
        $lead->phone                 = $this->phone;
        $lead->project_id            = $this->project_id;
        $lead->note                 = $this->note;
        $lead->channel                 = $this->channel;
        // $lead->status                 = $this->status;
        $lead->assign_staff        = json_encode($this->assign_staff);
        $lead->created_by           = auth()->user()->id;
        $lead->save();


        session()->flash('message', __('updated successfully'));

        //For hide modal after add student success
        $this->dispatchBrowserEvent('close-modal');
    }



    public function showChangeStatus($id)
    {

        $lead = Lead::where('id', $id)->first();
        $this->lead_edit_id     =  $id  ;
        $this->status           = $lead->status ;


        $this->dispatchBrowserEvent('show-edit-lead-status-modal');
    }


    public function changeStatus(){
        // dd($this->status);
            $lead = Lead::findOrFail($this->lead_edit_id);
           $updated= $lead->update([
            'status'=>$this->status,
            ]);




            if ($updated) {
                $this->activity = __('Status Updated');
                LeadActivity::create([
                    'comment'                => $this->comment,
                    'user_id'                => auth()->user()->id,
                    'lead_id'                => $this->lead_edit_id,
                    'activity'                => $this->activity,
                    'status'                => $this->status,
                ]);
                session()->flash('message', __('Updated successfully'));
            }
            $this->dispatchBrowserEvent('close-modal');

        }

    // public $view = 'grid';

    // public function setGridView()
    // {
    //     $this->view = 'grid';
    // }

    // public function setListView()
    // {
    //     $this->view = 'list';
    // }

    public function deleteConfirmation($id)
    {
        $this->lead_delete_id = $id; //lead id

        $this->dispatchBrowserEvent('show-delete-confirmation-modal');
    }

    public function deleteLeadData()
    {

        $lead = Lead::where('id', $this->lead_delete_id)->first();
        $lead->delete();

        session()->flash('message', __('deleted successfully'));

        $this->dispatchBrowserEvent('close-modal');

        $this->lead_delete_id = '';
    }

    public function cancel()
    {
        $this->lead_delete_id = '';
    }


    public function upload_Excel(Request $request)
    {
        //  dd($request->all());


        $validation =  Validator::make(request()->all(), [
            'leads_excel' => 'required|mimes:xlx,xls,xlsx,csv|max:2048'
        ]);
        //  dd($this->leads_excel);
        // Excel::import(new UsersImport, $this->leads_excel);
        // $this->dispatchBrowserEvent('show-edit-employee-modal');

        if ($validation->fails()) {
            session()->flash('error', __('Error in Import Please try Again..'));
            return back();
        }
        try {
            if($request->leads_excel){
              Excel::import(new LeadsImport, $request->leads_excel);
                session()->flash('message', __('Imported successfully'));
            }else{
                session()->flash('error', __('Error in Import Please try Again..'));
                return back();
            }
        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
            $failures = $e->failures();

            foreach ($failures as $failure) {
                $failure->row(); // row that went wrong
                $failure->attribute(); // either heading key (if using heading row concern) or column index
                $failure->errors(); // Actual error messages from Laravel validator
                $failure->values(); // The values of the row that has failed.

                //  $message = "Row" . $failure->row()  . implode(',', $failure->errors());
                //  session()->flash('message', $message);
            }
            //  dd($failure->errors(0));
            // $message = "Row { $failure->row()}: " . implode(',', $failure->errors());
            // session()->flash('message', $message);
            session()->flash('error', $failure );
        }


        return back();
    }



    public function render()
    {


        // $usersReport=User::where('id',auth()->user()->id)->first();

        // if($usersReport->reports_to == auth()->user()->id) {

             $query = Lead::query();

            if($this->search_subject){ //name or phone
                $query->where('name','like','%'.$this->search_subject.'%')->orwhere('phone','like','%'.$this->search_subject.'%');
            }
            if($this->search_status){
                $query->where('status','like','%'.$this->search_status.'%');
            }

        $leads = $query->get();



        // $returnd_tickets =Ticket::where('status', 'Returned')->count();
        // $solved_tickets =Ticket::where('status', 'Solved')->count();
        // $open_tickets =Ticket::where('status', 'Open')->count();
        // $pending_tickets =Ticket::where('status', 'Pending')->count();

        return view('livewire.Leads.lead-component',compact('leads'))->layout('livewire.layouts.base');
    }
}
