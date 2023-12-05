<?php

namespace App\Http\Livewire;

use App\Models\Company_client;
use App\Models\Designations;
use App\Models\ProjectImage;
use Google\Service\Batch\Resource\Projects;
use Illuminate\Http\Request;
use Livewire\Component;
use App\Models\Job;

use App\Models\JobCategory;
use App\Http\Controllers\UploadPhoto;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Illuminate\Support\Str;

class JobComponent extends Component
{
    use WithFileUploads;
    public $categoris ,$title,$title_ar,$status, $content,$content_ar, $job_id, $job_edit_id, $job_delete_id,$category_id,
    $salary_from, $salary_to,$job_type,$max_age,$address,$address_ar,$search_category_id,$search_status,$search_title;
    
    public function mount(){
        $this->categoris=JobCategory::all();
    }



    protected $listeners = ['editorValueChanged'];

    public function editorValueChanged($value)
    {
        $this->editorValue = $value;
    }


    public function storeJobData(Request $request)
    {

        //on form submit validation
        $this->validate([
            'title'  => 'required',
            'title_ar' => 'required',
            'category_id'=> 'required',
            'content'=> 'required',
            'content_ar'=> 'required',
        ]);


        //Add Ticket Data
        $job = new Job();
        $job->title        = $this->title;
        $job->title_ar     = $this->title_ar;
        $job->content      = $this->content;
        $job->content_ar   = $this->content_ar;
        $job->category_id  = $this->category_id;
        $job->salary_from  = $this->salary_from;
        $job->salary_to    = $this->salary_to;
        $job->max_age      = $this->max_age;
        $job->address      = $this->address;
        $job->address_ar   = $this->address_ar;
        $job->job_type   = $this->job_type;
        $job->status   = $this->status;

        $job->slug       = Str::slug($this->title);
        $job->save();


        session()->flash('message', __('added successfully'));

        $this->title        = '';
        $this->title_ar     = '';
        $this->content      = '';
        $this->content_ar   = '';
        $this->category_id  = '';
        $this->salary_from  = '';
        $this->salary_to    = '';
        $this->max_age      = '';
        $this->address      = '';
        $this->address_ar   = '';
        $this->job_type   = '';
        $this->status   = '';
        //For hide modal after add student success
        $this->dispatchBrowserEvent('close-modal');
    }


    public function resetInputs()
    {
        $this->title           ='';
        $this->category_id               ='';
    }

    public function close()
    {
        $this->resetInputs();
    }

    public function editJob($id)
    {

        $job = Job::where('id', $id)->first();
        $this->job_edit_id   = $id;
        $this->title        = $job->title;
        $this->title_ar     = $job->title_ar;
        $this->content      = $job->content;
        $this->content_ar   = $job->content_ar;
        $this->category_id  = $job->category_id;
        $this->salary_from  = $job->salary_from;
        $this->salary_to    = $job->salary_to;
        $this->max_age      = $job->max_age;
        $this->address      = $job->address;
        $this->address_ar   = $job->address_ar;
        $this->job_type   = $job->job_type;
        $this->status   = $job->status;
        $this->dispatchBrowserEvent('show-edit-job-modal');
    }
    

    public function editJobData()
    {
        //on form submit validation
        $this->validate([
            'title'  => 'required',
            'title_ar' => 'required',
            'category_id'=> 'required',
            'content'=> 'required',
            'content_ar'=> 'required',
        ]);


        $job = Job::where('id', $this->job_edit_id)->first();
        $job->title        = $this->title;
        $job->title_ar     = $this->title_ar;
        $job->content      = $this->content;
        $job->content_ar   = $this->content_ar;
        $job->category_id  = $this->category_id;
        $job->salary_from  = $this->salary_from;
        $job->salary_to    = $this->salary_to;
        $job->max_age      = $this->max_age;
        $job->address      = $this->address;
        $job->address_ar   = $this->address_ar;
        $job->job_type      = $this->job_type;
        $job->status   = $this->status;
        $job->slug       = Str::slug($this->title);
        $job->save();
        session()->flash('message', __('updated successfully'));

        //For hide modal after add student success
        $this->dispatchBrowserEvent('close-modal');
    }


    public function deleteConfirmation($id)
    {
        $this->job_delete_id = $id;

        $this->dispatchBrowserEvent('show-delete-confirmation-modal');
    }

    public function deleteJobData()
    {

        $job = Job::where('id', $this->job_delete_id)->first();
        $job->delete();

        session()->flash('message', __('deleted successfully'));

        $this->dispatchBrowserEvent('close-modal');

        $this->job_delete_id = '';
    }

    public function cancel()
    {
        $this->job_delete_id = '';
    }


    public function render()
    {
         $query = Job::query();

        if($this->search_title){
            $query->where('title','like','%'.$this->title.'%');
        }
        if($this->search_status){
            $query->where('status','like','%'.$this->search_status.'%');
        }
        if($this->search_category_id){
            $query->where('category_id','like','%'.$this->search_category_id.'%');
        }
            

        $jobs = $query->get();
        return view('livewire.jobs-component',compact('jobs'))->layout('livewire.layouts.base');
    }
}
