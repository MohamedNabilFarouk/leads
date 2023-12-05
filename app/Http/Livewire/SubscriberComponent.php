<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SubscriberComponent extends Component
{
    public function render()
    {
        return view('livewire.subscriber-component')->layout('livewire.layouts.base');
    }
}
