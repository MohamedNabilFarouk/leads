<?php

namespace App\Http\Livewire\Front;

use Livewire\Component;

class AboutComponent extends Component
{
    public function render()
    {
        return view('livewire.front.about-component')->layout('livewire.layouts.front');
    }
}
