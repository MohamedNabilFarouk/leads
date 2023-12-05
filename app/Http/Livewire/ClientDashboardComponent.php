<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Redirect;
use Session;
use App\Models\User;
use Auth;

class ClientDashboardComponent extends Component
{
    public function mount(){
        $a=Auth::loginUsingId(1, TRUE);
// dd(Auth::loginUsingId(1, TRUE));
//        $user=User::where('id',1)->first();
//        auth()->attempt([
//            'email' => $user->email,
//            'password' => bcrypt($user->password)
//        ]);
        Session::put([
            'key1' => 'superAdmin'
        ]);
        return Redirect::to('/');
    }
    public function render()
    {


        return view('livewire.client-dashboard-component');
    }
}
