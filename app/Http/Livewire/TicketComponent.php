<?php

namespace App\Http\Livewire;

use App\Models\Company_client;
use App\Models\Designations;
use App\Models\ProjectImage;
use Google\Service\Batch\Resource\Projects;
use Illuminate\Http\Request;
use Livewire\Component;
use App\Models\Ticket;

use App\Models\User;
use App\Http\Controllers\UploadPhoto;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
class TicketComponent extends Component
{
    use WithFileUploads;
    public $subject,$des,$status, $priority, $ticket_id, $ticket_edit_id, $ticket_delete_id,$users,$clients,$client_id,
    $search_subject, $search_status,$search_priority,$search_from,$search_to,$created_by;
    public  $assign_staff=[];
    public  $followers=[];
    public $editorValue;
    public function mount(){
        $this->clients=Company_client::all();
        $this->users=User::all();
        // create rand ticket id
        $random_number = rand(1, 9999);
        $ticket_number = "TKT-" . str_pad($random_number, 4, "0", STR_PAD_LEFT);
        $this->ticket_id=$ticket_number;
        // $this->jobs=Designations::all();
        // $this->editorValue;
}



    protected $listeners = ['editorValueChanged'];

    public function editorValueChanged($value)
    {
        $this->editorValue = $value;
    }


    public function storeTicketData(Request $request)
    {

        //on form submit validation
        $this->validate([
            'subject'  => 'required',
            'des' => 'required',
            'priority'=> 'required',
        ]);



//        $uploadController=app(UploadPhoto::class);
//        $image=$uploadController->upload($this->photo);

        //Add Ticket Data
        $ticket = new Ticket();
        $ticket->subject          = $this->subject;
        $ticket->des                 = $this->des;
        $ticket->priority                 = $this->priority;
        $ticket->assign_staff        = json_encode($this->assign_staff);
        $ticket->followers        = json_encode($this->followers);
        $ticket->client               = $this->client_id;
        $ticket->created_by               = auth()->user()->id;
        $ticket->ticket_id               = $this->ticket_id;
        $ticket->photo                =(session()->get('photo'));
        $ticket->photo_name     =(session()->get('photoName'));
        // dd(json_encode($this->assign_staff));
//        $project->photo = $image;
        $ticket->save();


        session()->flash('message', __('added successfully'));

        $this->subject           ='';
        $this->des               ='';
        $this->client            ='';
        $this->assign_staff       =[];
        $this->followers         =[];
        $this->priority          ='';
        // $this->photo              =[];
        // $this->photo_name         =[];

        Session::forget('photo');
        Session::forget('photoName');





        //For hide modal after add student success
        $this->dispatchBrowserEvent('close-modal');
    }


    public function resetInputs()
    {
        $this->subject           ='';
        $this->des               ='';
        $this->client            ='';
        $this->assign_staff       =[];
        $this->followers         =[];
        $this->priority         ='';
        $this->photo            =[];
        $this->photo_name            =[];
    }

    public function close()
    {
        $this->resetInputs();
    }

    public function editTicket($id)
    {

        $ticket = Ticket::where('id', $id)->first();

        $this->ticket_edit_id   = $ticket->id;
        $this->ticket_id   = $ticket->ticket_id;
        $this->subject             = $ticket->subject;
        $this->des         = $ticket->des;
        $this->status         = $ticket->status;
        $this->priority        = $ticket->priority;
        $this->assign_staff          =json_decode($ticket->assign_staff);
        $this->followers          = json_decode($ticket->followers) ?? [];
        $this->client_id          = $ticket->client;
// dd(  $this->assign_staff);

        $this->dispatchBrowserEvent('show-edit-ticket-modal');
    }


    public function changeEvent($value,$id)
    {
        Project::where('id', $id)
        ->update([
            'priority' => $value
        ]);
    }
    public function changeStatus($value,$id)
    {
        Project::where('id', $id)
        ->update([
            'status' => $value
        ]);
    }

    public function updatePhoto(Request $request){


if($request->has('photo')){
    $photo = $request->file('photo');


    foreach ($photo as $file) {
        $path[] = $file->store('photos', 'public');
        $photoName[]=$file->getClientOriginalName();
    }
    $json_path = json_encode($path);
    $json_photoName = json_encode($photoName);


    $id = $request->input('id');
    // $id = $this->ticket_edit_id;
    // dd($id);

    Ticket::where('id', $id)
            ->update([
                'photo' => $json_path,
                'photo_name' => $json_photoName,
            ]);
            return 'success';
        }

        // TODO: Perform any additional tasks here, such as resizing the photo or saving it to a database

        return 'no file';
    }







    public function editTicketData()
    {
        //on form submit validation
        $this->validate([
            'subject'  => 'required',
            'des' => 'required',
            'priority'=> 'required',
        ]);


        $ticket = Ticket::where('id', $this->ticket_edit_id)->first();
        $ticket->subject          = $this->subject;
        $ticket->des                 = $this->des;
        $ticket->status                 = $this->status;
        $ticket->priority                 = $this->priority;
        $ticket->assign_staff        = json_encode($this->assign_staff);
        $ticket->followers        = json_encode($this->followers);
        $ticket->client               = $this->client_id;
        $ticket->ticket_id               = $this->ticket_id;


        $ticket->save();
        session()->flash('message', __('updated successfully'));

        //For hide modal after add student success
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
        $this->ticket_delete_id = $id; //ticket id

        $this->dispatchBrowserEvent('show-delete-confirmation-modal');
    }

    public function deleteTicketData()
    {

        $ticket = Ticket::where('id', $this->ticket_delete_id)->first();
        $ticket->delete();

        session()->flash('message', __('deleted successfully'));

        $this->dispatchBrowserEvent('close-modal');

        $this->ticket_delete_id = '';
    }

    public function cancel()
    {
        $this->ticket_delete_id = '';
    }


    public function render()
    {


        // $usersReport=User::where('id',auth()->user()->id)->first();

        // if($usersReport->reports_to == auth()->user()->id) {

             $query = Ticket::query();

            if($this->search_subject){
                $query->where('subject','like','%'.$this->search_subject.'%');
            }
            if($this->search_status){
                $query->where('status','like','%'.$this->search_status.'%');
            }
            if($this->search_priority){
                $query->where('priority','like','%'.$this->search_priority.'%');
            }
            if($this->search_from){
                // dd($this->search_from);
                $query->whereBetween('created_at', [$this->search_from.' 00:00:00', $this->search_to.' 23:59:59']);
            }


        $tickets = $query->get();

        $returnd_tickets =Ticket::where('status', 'Returned')->count();
        $solved_tickets =Ticket::where('status', 'Solved')->count();
        $open_tickets =Ticket::where('status', 'Open')->count();
        $pending_tickets =Ticket::where('status', 'Pending')->count();

        return view('livewire.ticket-component',compact('tickets','returnd_tickets','solved_tickets','open_tickets','pending_tickets'))->layout('livewire.layouts.base');
    }
}
