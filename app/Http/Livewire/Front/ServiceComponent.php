<?php

namespace App\Http\Livewire\Front;
use App\Models\Feature;
use App\Models\Layout;

use Livewire\Component;

class ServiceComponent extends Component
{
    public function render()
    {
        $services      = Feature::where('section_no',2)->get();
        $section_two   = Layout::where('id',2)->first();
        return view('livewire.front.service-component',compact('services','section_two'))->layout('livewire.layouts.front');
    }
}
