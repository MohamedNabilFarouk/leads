<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\EmailVerification;
use App\Models\Client;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EmailVerificationController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:clients');
    }


    public function verify($token)
{
 
    // dd($token);
    $client = Client::where('verification_token', $token)->firstOrFail();
// dd($client);
    $client->email_verified_at = Carbon::now();
    $client->verification_token = null;
    $client->save();
    session()->flash('message','Please Choose Your Plan' );
    return redirect()->to('/pricing');

}

}
