<?php

namespace App\Http\Livewire;

use Livewire\Component;

class LoginComponent extends Component
{
    public $email,$password;
    public function render()
    {

        return view('livewire.login-component')->layout('livewire.layouts.front');
    }

    private function resetInputFields(){
        $this->email = '';
        $this->password = '';
    }

    public function login()
    {
        $validatedDate = $this->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(\Auth::attempt(array('email' => $this->email, 'password' => $this->password))){
                session()->flash('message', __('You are Login successful'));
                return redirect()->to('/contact-form-success');

        }else{
            session()->flash('error', __('email or password are wrong'));
        }
    }
}
