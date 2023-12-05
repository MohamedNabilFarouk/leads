<?php

namespace App\Http\Livewire;



use App\Models\Company_client;
use App\Models\Designations;
use App\Models\ProjectImage;
use Google\Service\Batch\Resource\Projects;
use Illuminate\Http\Request;
use Livewire\Component;
use App\Models\Lead;
use App\Models\LeadActivity;

use App\Models\User;
use App\Http\Controllers\UploadPhoto;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Session;
class LeadViewComponent extends Component
{
    use WithFileUploads;
    public $activity,$status, $lead_id, $activity_edit_id, $activity_delete_id,$clients,$user_id,$comment;
    public  $assign_staff=[];


    public function mount($id){
        $this->leadId = \Crypt::decrypt($id);
    }

    public function storeActivity(){
           //on form submit validation
           $this->validate([
            'comment'  => 'required',
        ]);
        $lead_activity=  new LeadActivity();
        $lead_activity->comment                 = $this->comment;
        $lead_activity->user_id                 = auth()->user()->id;
        $lead_activity->lead_id                 = $this->leadId;
        $lead_activity->activity                = $this->activity;
        $lead_activity->status                = $this->status;
        $lead_activity->save();
        session()->flash('message', __('added successfully'));
        $this->comment           ='';
        $this->activity           ='';
    }





    public function render()
    {
        $lead=Lead::find($this->leadId);

        return view('livewire.lead-view-component',compact('lead'))->layout('livewire.layouts.base');
    }

}
