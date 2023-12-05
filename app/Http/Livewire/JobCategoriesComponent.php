<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\JobCategory;

use Livewire\WithPagination;

class JobCategoriesComponent extends Component
{
    use WithPagination;

    public $title,$title_ar,$jobCategory_edit_id,$jobCategory_delete_id;
    //Input fields on update validation
    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'title'  => 'required|string'
        ]);
    }


    public function storeDepartmentData()
    {
        //on form submit validation
        $this->validate([
            'title'  => 'required',
            'title_ar'=>'required'
        ]);

        //Add Student Data
        $department = new JobCategory();
        $department->title  = $this->title;
        $department->title_ar  = $this->title_ar;
        $department->save();

        session()->flash('message', __('added successfully'));

        $this->title  = '';
        $this->title_ar  = '';


        //For hide modal after add student success
        $this->dispatchBrowserEvent('close-modal');
    }

    public function resetInputs()
    {
        $this->title           = '';
        $this->title_ar        = '';
        $this->jobCategory_edit_id = '';
    }

    public function close()
    {
        $this->resetInputs();
    }

    public function editJobCategory($id)
    {
        $job = JobCategory::where('id', $id)->first();
        $this->jobCategory_edit_id = $job->id;
        $this->title              = $job->title;
        $this->title_ar           = $job->title_ar;


        $this->dispatchBrowserEvent('show-edit-job-category-modal');
    }

    public function editJobCategoryData()
    {
        //on form submit validation
        $this->validate([
            'title'  => 'required|string',
            'title_ar'  => 'required|string'

        ]);

        $job = JobCategory::where('id', $this->jobCategory_edit_id)->first();
        $job->title   = $this->title;
        $job->title_ar   = $this->title_ar;
        $job->save();

        session()->flash('message', __('updated successfully'));

        //For hide modal after add student success
        $this->dispatchBrowserEvent('close-modal');
    }

    //Delete Confirmation
    public function deleteConfirmation($id)
    {
        $this->jobCategory_delete_id = $id; //student id

        $this->dispatchBrowserEvent('show-delete-confirmation-modal');
    }

    public function deleteJobCategoryData()
    {
        $job = JobCategory::where('id', $this->jobCategory_delete_id)->first();
        $job->delete();

        session()->flash('message', __('deleted successfully'));

        $this->dispatchBrowserEvent('close-modal');

        $this->jobCategory_delete_id = '';
    }

    public function cancel()
    {
        $this->jobCategory_delete_id = '';
    }


    public function render()
    {
        //Get all students
        $jobs = JobCategory::paginate(10);

        return view('livewire.job-categories-component', ['jobs'=>$jobs])->layout('livewire.layouts.base');
    }
}
