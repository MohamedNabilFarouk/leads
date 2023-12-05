<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Models\Resignation;
use App\Models\User;
use App\Models\Termination;
use Carbon\Carbon;
use Session;
use DB;
use LaravelLocalization;
use Illuminate\Support\Str;

class LoginController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    protected function redirectTo()
    {


        $token=Str::random(60);
        User::where('email',auth()->user()->email)->update([
            'token' => $token
        ]);
        $userToken=Session::put('tokenSession', $token);

        //  dd(Auth::user()->lang);
        if(Auth::user()->lang != null){
            // dd('here');
            app()->setLocale(Auth::user()->lang);
        }else{
            app()->setLocale('en');
        }

        // active
        $url=request()->getHost();

            $urlrxplode=explode(".",$url);
        $client=  DB::connection('general')->table('clients')->where('slug',$urlrxplode[0])->first();
        // dd($client);
            if($client){
                    if($client->active == 0){
                        session()->flash('message', __('The account has been Deactivated'));
                        Auth::logout();
                        return '/login';
                    }else if($client->email_verified_at == null){
                        session()->flash('message', __('Please Verify Your Account'));
                        Auth::logout();
                        return '/login';
                    }

                    $userplan =  DB::connection('general')->table('user_subscribers')->where([['client_id',$client->id],['is_paid',1],['end_date','>=',Carbon::now()]])->get();
                    if(($userplan =='[]')&&(auth()->user()->id !='1')){
                       session()->flash('message', __('The account has been Deactivated'));
                       Auth::logout();
                       return '/login';
                    }
            }


        // User role
    //    $role = Auth::user()->hasRole('employee');
    //   dd(Auth::user()->hasDirectPermission('employee-dashboard-read'));
        // Check user role
        // $user_resignation = Resignation::where([['resigning_employee' , Auth::user()->id],['resignation_date','<=',Carbon::now()->toDateString()]])->first();
        // $user_termination = Termination::where([['terminated_employee' , Auth::user()->id],['termination_date','<=',Carbon::now()->toDateString()]])->first();
        // if(($user_resignation != null) || ($user_termination != null) ){
        //     $user = User::findOrFail(Auth::user()->id);
        //     $user->deleted_at = Carbon::now();
        //     $user->save();
        //     Auth::logout();
        //     session()->flash('message', __('The account has been disabled'));
        //     return '/login';
        // }
        // if (Auth::user()->hasDirectPermission('admin-dashboard-read') &&(! $client)) {
            if ((!Auth::guard('clients')->check()) &&(! $client)) {
            // return '/admin-dashboard';
        return  LaravelLocalization::getLocalizedURL(Auth::user()->lang ?? 'en','/superadmin-dashboard');
        }else if(Auth::user()->hasDirectPermission('admin-dashboard-read') &&($client)){

            return  LaravelLocalization::getLocalizedURL(Auth::user()->lang ?? 'en','/admin-dashboard');
        }
        else{

            // return '/my-dashborad';
            return  LaravelLocalization::getLocalizedURL(Auth::user()->lang ?? 'en','/my-dashboard');
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
                $url=request()->getHost();
                $urlrxplode=explode(".",$url);
            $client=  DB::connection('general')->table('clients')->where('slug',$urlrxplode[0])->first();

        if(($client) && ($client->email_verified_at == null)){
            session()->flash('message', __('Please Verify Your Account'));
            Auth::logout();
            return '/login';
        }
       $this->middleware('guest')->except('logout');
        $this->middleware('guest:clients')->except('logout');
    }
}
