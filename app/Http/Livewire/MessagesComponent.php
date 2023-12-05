<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use Livewire\Component;

class MessagesComponent extends Component
{
    public function render()
    {
        $messages = Contact::orderBy('id','DESC')->get();
        return view('livewire.Messages',['messages'=>$messages])->layout('livewire.layouts.base');
    }
}
