<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Page;
class PagesComponent extends Component
{
    public $page_edit_id,$description_en,$description_ar;
//    public function mount(){
//        $page=Page::first();
//
//$this->description_en=$page->description_en;
//$this->description_ar=$page->description_ar;
//
//}

    public function mount()
    {
        $page = Page::where('id', 1)->first();

        $this->page_edit_id    = $page->id;
        $this->description_en  = $page->description_en;
        $this->description_ar  = $page->description_ar;
    }

    public function editPageData()
    {
        //on form submit validation
        $this->validate([
            'description_en'  => 'required',
            'description_ar' => 'required'
        ]);

        $page = page::where('id', 1)->first();
        $page->description_en    = $this->description_en;
        $page->description_ar    = $this->description_ar;

        $page->save();

        session()->flash('message', __('updated successfully'));

    }
    public function render()
    {
//$page=Page::first();
//
//$this->description_en=$page->description_en;
//$this->description_ar=$page->description_ar;

        return view('livewire.pages-component')->layout('livewire.layouts.base');
    }
}
