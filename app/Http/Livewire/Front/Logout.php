<?php

namespace App\Http\Livewire\Front;

use Livewire\Component;
use Session;
use Auth;
class Logout extends Component
{
    public function mount(){

            Session::flush();

            Auth::logout();

            return redirect('/index');
    }
    public function render()
    {
        return view('livewire.front.logout');
    }
}
