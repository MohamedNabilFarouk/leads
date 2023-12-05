<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ClientMissingInfo
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    public function handle(Request $request, Closure $next)
    {

        $user = auth()->user();
        // dd('here');
        if( $user){
            $slug = explode(".",$_SERVER['HTTP_HOST'])[0];
            $client = \DB::connection('general')->table('clients')->where('slug',$slug)->first();
            if(($client) && (!$request->ajax())){
                if((!$client->employees_number) || (!$client->company_business) || (!$client->company_name) ||
                (!$client->currency)|| (!$client->country)
                || (!$client->business_registration_number)){
// dd('check if empty' );

                    if(strval(\Route::current()->uri) != "en/missing-info" && strval(\Route::current()->uri) != "ar/missing-info"){
// dd('check if not config page' );

                        return redirect('en/missing-info');
                    }else{
// dd('else' );

                        return $next($request);
                    }
                }
            }else{

                return $next($request);
            }
        }
        return $next($request);
    }
}
