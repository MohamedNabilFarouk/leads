<?php

namespace App\Http\Livewire\Front;

use Livewire\Component;

use App\Models\SubscribeRequest;
class SubscribeFormComponent extends Component
{

    public $email;

    public function subscribeRequest(){
            $validatedData = $this->validate([
                'email' => 'required|email|unique:subscribe_requests'
            ]);

            SubscribeRequest::create($validatedData);

            $this->email='';

            session()->flash('message', __('Send Successfully'));

        }
    public function render()
    {
        return view('livewire.front.subscribe-form-component');
    }
}
