<?php

namespace App\Http\Livewire\Front;

use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\EmailVerification;
use App\Models\Client;
use Carbon\Carbon;


class LoginComponent extends Component
{
    public $email,$password,$field1,$field2,$sum,$m;
    public function render()
    {
        return view('livewire.front.login-component')->layout('livewire.layouts.front');
    }
    public function mount(){
        $this->field1=1;
        $this->field2=2;
        $this->sum;
        $this->m;

    }

    public function changeEvent(){
        $this->m=$this->field1+$this->field2;
    }
    private function resetInputFields(){
        $this->email = '';
        $this->password = '';
    }

    public function login()
    {
///        dd(1);
//        $validatedDate = $this->validate([
//            'email' => 'required|email',
//            'password' => 'required',
//        ]);
        if(\Auth::guard('clients')->attempt(array('email' => $this->email, 'password' => $this->password))){
            $user=\Auth::guard('clients')->user();



            // $verificationUrl = route('verify.email', ['token' => $user->verification_token]);
            // Mail::to($user->email)->send(new EmailVerification($verificationUrl));


            if($user->email_verified_at==NULL){
                $user->verification_token = Str::random(40);
                $user->save();
                session()->flash('message','Please Verify Your Email' );
                // $user->sendEmailVerificationNotification();
                 // Send the verification email
                Mail::to($user->email)->send(new EmailVerification($user));
                return redirect()->back();
            }else {
                session()->flash('message', __('You are Login successful'));
                return redirect()->to('/index');
            }
        }else{
            session()->flash('message', __('email or password are wrong'));
        }
    }





}
