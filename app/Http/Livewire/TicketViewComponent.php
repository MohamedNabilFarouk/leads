<?php

namespace App\Http\Livewire;



use App\Models\Company_client;
use App\Models\Designations;
use App\Models\ProjectImage;
use Google\Service\Batch\Resource\Projects;
use Illuminate\Http\Request;
use Livewire\Component;
use App\Models\Ticket;
use App\Models\TicketActivity;

use App\Models\User;
use App\Http\Controllers\UploadPhoto;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Session;
class TicketViewComponent extends Component
{
    use WithFileUploads;
    public $subject,$des,$status, $priority, $ticket_id, $activity_edit_id, $ticket_delete_id,$users,$clients,$client_id,
    $search_subject, $search_status,$search_priority,$search_from,$search_to, $comment;
    public  $assign_staff=[];
    public  $followers=[];
    public $editorValue;

    public function mount($id){
        $this->ticketId = \Crypt::decrypt($id);
    }

    public function storeActivity(){
           //on form submit validation
           $this->validate([
            'comment'  => 'required',

        ]);
        $ticket_activity=  new TicketActivity();
        $ticket_activity->comment          = $this->comment;
        $ticket_activity->user_id                 = auth()->user()->id;;
        $ticket_activity->ticket_id                 = $this->ticketId;
        $ticket_activity->file                =(session()->get('photo'));
        $ticket_activity->file_name     =(session()->get('photoName'));
        $ticket_activity->save();
        session()->flash('message', __('added successfully'));
        $this->comment           ='';

        Session::forget('photo');
        Session::forget('photoName');
    }

    public function updatePhoto(Request $request){


        if($request->has('file')){
            $photo = $request->file('file');


            foreach ($photo as $file) {
                $path[] = $file->store('photos', 'public');
                $photoName[]=$file->getClientOriginalName();
            }
            $json_path = json_encode($path);
            $json_photoName = json_encode($photoName);


            $id = $request->input('id');
            // $id = $this->ticket_edit_id;
            // dd($id);

            TicketActivity::where('id', $id)
                    ->update([
                        'file' => $json_path,
                        'file_name' => $json_photoName,
                    ]);
                    return 'success';
                }

                // TODO: Perform any additional tasks here, such as resizing the photo or saving it to a database

                return 'no file';
            }



    public function render()
    {
        $ticket=Ticket::find($this->ticketId);

        return view('livewire.ticket-view-component',compact('ticket'))->layout('livewire.layouts.base');
    }

}
