<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\JobApplicant;
use App\Models\Job;

use Livewire\WithPagination;
use Illuminate\Http\Request;

class JobApplicantComponent extends Component
{
    use WithPagination;

    public $job_id,$name,$email,$message,$cv,$interview_date,$status,$interview_result,$applicant_edit_id,$jobApplicant_delete_id;

    public function mount(Request $request){
        $this->job_id= $request->job_id;
    }
    //Input fields on update validation
    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'status'  => 'required|string'
        ]);
    }


    public function resetInputs()
    {
        $this->status           = '';
        $this->interview_result        = '';
        $this->applicant_edit_id = '';
        $this->interview_date = '';
    }

    public function close()
    {
        $this->resetInputs();
    }

    public function editJobApplicant($id)
    {
        $jobApplicant = JobApplicant::where('id', $id)->first();
        $this->applicant_edit_id = $jobApplicant->id;
        $this->status              = $jobApplicant->status;
        $this->interview_result           = $jobApplicant->interview_result;
        $this->interview_date           = $jobApplicant->interview_date;

        $this->dispatchBrowserEvent('show-edit-job-applicants-modal');
    }

    public function editJobApplicantData()
    {
        //on form submit validation
        $this->validate([
            'status'  => 'required|string'
        ]);

        $job = JobApplicant::where('id', $this->applicant_edit_id)->first();
        $job->status   = $this->status;
        $job->interview_result   = $this->interview_result;
        $job->interview_date   = $this->interview_date;
        $job->save();

        session()->flash('message', __('updated successfully'));

        //For hide modal after add student success
        $this->dispatchBrowserEvent('close-modal');
    }

    //Delete Confirmation
    public function deleteConfirmation($id)
    {
        $this->jobApplicant_delete_id = $id; //student id

        $this->dispatchBrowserEvent('show-delete-confirmation-modal');
    }

    public function deleteJobApplicantData()
    {
        $job = JobApplicant::where('id', $this->jobApplicant_delete_id)->first();
        $job->delete();

        session()->flash('message', __('deleted successfully'));

        $this->dispatchBrowserEvent('close-modal');

        $this->jobApplicant_delete_id = '';
    }

    public function cancel()
    {
        $this->jobApplicant_delete_id = '';
    }


    public function render()
    {
        //Get all students
        $applicants = JobApplicant::where('job_id',$this->job_id)->paginate(10);
        $job = Job::where('id',$this->job_id)->first();
        return view('livewire.job-applicants-component', ['job'=>$job,'applicants'=>$applicants])->layout('livewire.layouts.base');
    }
}
