<?php

namespace App\Http\Livewire;

use App\Models\Branch;

use Livewire\Component;
use Carbon;
class BranchesComponent extends Component
{
    public $title,$title_ar,$nfc_id, $lat, $lng, $radius, $device_ip ,$device_port,$model_name;




    //Input fields on update validation
    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'title'  => 'required',
            'title_ar'   => 'required',
            'nfc_id'  => 'required',
            'lat'  => 'required',
            'lng'  => 'required',
            'radius'  => 'required'
        ]);
    }


    public function storeBranchData()
    {
        //on form submit validation
        $this->validate([
            'title'  => 'required',
            'title_ar'   => 'required',
            'nfc_id'  => 'required',
            'lat'  => 'required',
            'lng'  => 'required',
            'radius'  => 'required'
        ]);

        //Add  Data
        $branch = new Branch();
        $branch->title  = $this->title;
        $branch->title_ar = $this->title_ar;
        $branch->nfc_id   = $this->nfc_id;
        $branch->lat   = $this->lat;
        $branch->lng   = $this->lng;
        $branch->radius   = $this->radius;

        if($this->device_ip){
            $branch->device_ip  = $this->device_ip;
        }
        if($this->device_port){
            $branch->device_port  = $this->device_port;
        }
        if($this->model_name){
            $branch->model_name  = $this->model_name;
        }
        $branch->save();

        session()->flash('message', __('added successfully'));

        $this->title  = '';
        $this->title_ar = '';
        $this->lat   = '';
        $this->lng   = '';
        $this->radius   = '';
        $this->device_ip   = '';
        $this->device_port   = '';
        $this->model_name   = '';

        //For hide modal after add  success
        $this->dispatchBrowserEvent('close-modal');
    }

    public function resetInputs()
    {
        $this->title  = '';
        $this->title_ar = '';
        $this->lat   = '';
        $this->lng   = '';
        $this->radius   = '';
        $this->device_ip   = '';
        $this->device_port   = '';
        $this->model_name   = '';
    }

    public function close()
    {
        $this->resetInputs();
    }

    public function editBranch($id)
    {
        $branch = Branch::where('id', $id)->first();
        $this->branch_edit_id = $branch->id;
        $this->title = $branch->title;
        $this->title_ar = $branch->title_ar;
        $this->nfc_id = $branch->nfc_id;
        $this->lat = $branch->lat;
        $this->lng = $branch->lng;
        $this->radius = $branch->radius ;
        $this->model_name = $branch->model_name ;
        $this->device_port = $branch->device_port ;
        $this->device_ip = $branch->device_ip ;

        $this->dispatchBrowserEvent('show-edit-branch-modal');
    }

    public function editBranchData()
    {
        //on form submit validation
        $this->validate([
            'title'  => 'required',
            'title_ar'   => 'required',
            'nfc_id'  => 'required',
            'lat'  => 'required',
            'lng'  => 'required',
            'radius'  => 'required'
        ]);

        $branch = Branch::where('id', $this->branch_edit_id)->first();
        $branch->title  = $this->title;
        $branch->title_ar = $this->title_ar;
        $branch->nfc_id   = $this->nfc_id;
        $branch->lat   = $this->lat;
        $branch->lng   = $this->lng;
        $branch->radius   = $this->radius;

        if($this->device_ip){
            $branch->device_ip  = $this->device_ip;
        }
        if($this->device_port){
            $branch->device_port  = $this->device_port;
        }
        if($this->model_name){
            $branch->model_name  = $this->model_name;
        }

        $branch->save();

        session()->flash('message', __('updated successfully'));

        //For hide modal after add  success
        $this->dispatchBrowserEvent('close-modal');
    }

    //Delete Confirmation
    public function deleteConfirmation($id)
    {
        $this->branch_delete_id = $id; // id

        $this->dispatchBrowserEvent('show-delete-confirmation-modal');
    }

    public function deleteBranchData()
    {
        $branch = Branch::where('id', $this->branch_delete_id)->first();
        $branch->delete();

        session()->flash('message', __('deleted successfully'));

        $this->dispatchBrowserEvent('close-modal');

        $this->branch_delete_id = '';
    }

    public function cancel()
    {
        $this->branch_delete_id = '';
    }


    public function render()
    {
        //Get all branches
        $branches = Branch::all();

        return view('livewire.branchs-component', ['branches'=>$branches])->layout('livewire.layouts.base');
    }
}
