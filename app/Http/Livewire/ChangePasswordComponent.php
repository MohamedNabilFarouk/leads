<?php

namespace App\Http\Livewire;

use Livewire\Component;

use Illuminate\Support\Facades\Hash;

use App\Models\User;

class ChangePasswordComponent extends Component
{
    public $old_password,$new_password,$new_password_confirmation;

    public function storeChangePasswordData()
    {
        //on form submit validation
        $this->validate([
            'old_password'  => 'required',
            'new_password' => 'required|min:8|confirmed'
        ]);
        if(!Hash::check($this->old_password, auth()->user()->password)){
            session()->flash('message', __('Old Password Does Not Match'));
        }else{

           #Update the new Password
            User::whereId(auth()->user()->id)->update([
                'password' => Hash::make($this->new_password)
            ]);
            session()->flash('message', __('Password Change Successfully'));

        }

    }

public function render()
    {
        return view('livewire.change-password-component')->layout('livewire.layouts.base');
    }
}
