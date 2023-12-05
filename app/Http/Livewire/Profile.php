<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\User; 

class Profile extends Component
{
    public function render()
    {
        $employees=User::all();
        return view('livewire.profile',['employees'=>$employees])->layout('livewire.layouts.base');
}
}
