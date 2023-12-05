<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;
use App\Models\Region;

class RegionComponent extends Component
{
    public $title_en,$title_ar,$row_edit_id,$row_delete_id;


    public function storeRegionData(Request $request)
    {

        //on form submit validation
        $this->validate([
            'title_en'  => 'required',
            'title_ar' => 'required',
        ]);

        $row = new Region();
        $row->title_en                  =  $this->title_en;
        $row->title_ar                 =  $this->title_ar;
        $row->save();
        session()->flash('message', __('added successfully'));

       $this->resetInputs();
        $this->dispatchBrowserEvent('close-modal');
    }

    public function resetInputs()
    {
        $this->title_en           ='';
        $this->title_ar           ='';
    }

    public function close()
    {
        $this->resetInputs();
    }


    public function editRegion($id)
    {
        $row = Region::where('id', $id)->first();
        $this->row_edit_id   = $row->id;
        $this->title_en   = $row->title_en;
        $this->title_ar   = $row->title_ar;

        $this->dispatchBrowserEvent('show-edit-modal');
    }

    public function editRegionData()
    {
        //on form submit validation
        $this->validate([
            'title_en'  => 'required',
            'title_ar' => 'required',

        ]);


        $row = Region::where('id', $this->row_edit_id)->first();
        $row->title_ar          = $this->title_ar;
        $row->title_en                 = $this->title_en;
        $row->save();
        session()->flash('message', __('updated successfully'));
        $this->dispatchBrowserEvent('close-modal');
    }

    public function deleteConfirmation($id)
    {
        $this->row_delete_id = $id;

        $this->dispatchBrowserEvent('show-delete-confirmation-modal');
    }

    public function deleteRegionData()
    {

        $row = Region::where('id', $this->row_delete_id)->first();
        $row->delete();

        session()->flash('message', __('deleted successfully'));

        $this->dispatchBrowserEvent('close-modal');

        $this->row_delete_id = '';
    }

    public function cancel()
    {
        $this->row_delete_id = '';
    }



    public function render(){
        $regions = Region::all();
        return view('livewire.Region.region-component',['regions'=>$regions])->layout('livewire.layouts.base');
    }


}
