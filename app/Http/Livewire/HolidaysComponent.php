<?php

namespace App\Http\Livewire;

use App\Models\Holiday;
use Livewire\Component;
use Carbon;
class HolidaysComponent extends Component
{
    public $title, $date_from, $date_to, $holiday_edit_id, $holiday_delete_id;




    //Input fields on update validation
    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'title'  => 'required',
            'date_from' => 'required|before:date_to',
            'date_to'   => 'required',
        ]);
    }


    public function storeHolidayData()
    {
        //on form submit validation
        $this->validate([
            'title'  => 'required',
            'date_from' => 'required|before:date_to',
            'date_to'   => 'required',
        ]);

        //Add Student Data
        $holiday = new Holiday();
        $holiday->title  = $this->title;
        $holiday->date_from = $this->date_from;
        $holiday->date_to   = $this->date_to;

        $holiday->save();

        session()->flash('message', __('added successfully'));

        $this->title  = '';
        $this->date_from = '';
        $this->date_to   = '';

        //For hide modal after add student success
        $this->dispatchBrowserEvent('close-modal');
    }

    public function resetInputs()
    {
        $this->title        = '';
        $this->date_from       = '';
        $this->date_to         = '';
        $this->holiday_edit_id = '';
    }

    public function close()
    {
        $this->resetInputs();
    }

    public function editHoliday($id)
    {
        $holiday = Holiday::where('id', $id)->first();

        $this->holiday_edit_id = $holiday->id;
        $this->title           = $holiday->title;
        $this->date_from       = $holiday->date_from;
        $this->date_to         = $holiday->date_to;

        $this->dispatchBrowserEvent('show-edit-holiday-modal');
    }

    public function editHolidayData()
    {
        //on form submit validation
        $this->validate([
            'title'  => 'required',
            'date_from' => 'required|before:date_to',
            'date_to'   => 'required',
        ]);

        $holiday = Holiday::where('id', $this->holiday_edit_id)->first();
        $holiday->title  = $this->title;
        $holiday->date_from = $this->date_from;
        $holiday->date_to   = $this->date_to;

        $holiday->save();

        session()->flash('message', __('updated successfully'));

        //For hide modal after add student success
        $this->dispatchBrowserEvent('close-modal');
    }

    //Delete Confirmation
    public function deleteConfirmation($id)
    {
        $this->holiday_delete_id = $id; //student id

        $this->dispatchBrowserEvent('show-delete-confirmation-modal');
    }

    public function deleteHolidayData()
    {
        $holiday = Holiday::where('id', $this->holiday_delete_id)->first();
        $holiday->delete();

        session()->flash('message', __('deleted successfully'));

        $this->dispatchBrowserEvent('close-modal');

        $this->holiday_delete_id = '';
    }

    public function cancel()
    {
        $this->holiday_delete_id = '';
    }


    public function render()
    {
        //Get all students
        $holidays = Holiday::where([['date_from','like',Carbon\Carbon::now()->year.'%']])->orderby('date_from','asc')->get();
        // Absence::where([['user_id',(int)$employee->employee_id],['date','like',$payrollDateYear.'-'."$payrollDateMonth".'-%']]

        return view('livewire.holidays-component', ['holidays'=>$holidays])->layout('livewire.layouts.base');
    }
}
