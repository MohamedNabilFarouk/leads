<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserSubscriber;
use Carbon\Carbon;

use DB;
use LaravelLocalization;
class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {



         // active
         $url=request()->getHost();
         $urlrxplode=explode(".",$url);
     $client=   DB::connection('general')->table('clients')->where('slug',$urlrxplode[0])->first();

         if($client){

                 if($client->active == 0){
                     session()->flash('message', __('The account has been Deactivated'));
                     Auth::logout();
                    //  return 'en/login';
                 }




         }


        $guards = empty($guards) ? [null] : $guards;
        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {

                if(Auth::guard('clients')->check()){
                    return redirect('/pricing');
                }
// dd(Auth::guard($guard)->check());
                // return redirect(RouteServiceProvider::HOME);
                // dd(Auth::user()->permissions());
                if ((!Auth::guard('clients')->check()) &&(! $client)) {

                    // return '/admin-dashboard';
                    return redirect('/superadmin-dashboard');
                }else if(Auth::user()->hasDirectPermission('admin-dashboard-read') &&($client)){

                    return redirect('/admin-dashboard');
                }
                else{
                    // return '/my-dashborad';
                    return redirect('/my-dashboard');
                    // return  LaravelLocalization::getLocalizedURL(Auth::user()->lang ?? 'en','/my-dashborad');
                }
        }

        return $next($request);
    }
}
}
