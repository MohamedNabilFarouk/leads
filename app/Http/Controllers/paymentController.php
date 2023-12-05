<?php

namespace App\Http\Controllers;


use App\Models\User;

use App\Models\UserSubscriber;
use Livewire\Component;

use App\Models\SubscriptionPlan;
use Illuminate\Support\Facades\Http;
use Auth;
use DB;
use Carbon\Carbon;

class paymentController extends Controller
{

public function ChoosePlan($id){


$id = \Crypt::decrypt($id);


if(!Auth::guard('clients')->user()&&(!Auth::guard()=='web')) {

return redirect('/sign_in');

}else {

    $url=request()->getHost();

    $urlrxplode=explode(".",$url);
    $client=  DB::connection('general')->table('clients')->where('slug',$urlrxplode[0])->first();


$plan = DB::connection('general')->table('subscription_plans')->where('id',$id)->first();

$duration='add'.$plan->frequency;
$new_subscribe=  DB::connection('general')->table('user_subscribers')->insertGetId([
    'client_id'     => $client->id,
    'plan_id'       => $plan->id,
    'starting_date' => Carbon::now(),
    'end_date'      => Carbon::now()->$duration(),
    'total'         => $plan->price,
    'is_paid'         => 0
]);




$response = Http::accept('application/json')
    ->post('https://accept.paymob.com/api/auth/tokens', [
        'api_key' => 'ZXlKaGJHY2lPaUpJVXpVeE1pSXNJblI1Y0NJNklrcFhWQ0o5LmV5SmpiR0Z6Y3lJNklrMWxjbU5vWVc1MElpd2ljSEp2Wm1sc1pWOXdheUk2T0RBMk5EUXdMQ0p1WVcxbElqb2lhVzVwZEdsaGJDSjkuc2tPTEVKaHZZUzd0b2t5OVJ4a0lLUlNKbURLYXlnOWdsczFmTlRGX3FSQVlBMzJZaE9janhIbWNzV2FNVjJQWElsa2NZcHZrbWRMVTNWcXBELVVwVFE=',
    ]);

$m = json_decode($response->getBody(), true);
$s = $m['token'];

$response1 = Http::accept('application/json')
    ->post('https://accept.paymob.com/api/ecommerce/orders', [
        "auth_token" => $s,
        "delivery_needed" => "false",
        "amount_cents" => $plan->price*100,
        "currency" => "EGP",
        "merchant_order_id" => $new_subscribe,
        $items = [
            [
                "name" => $plan->name,
                "amount" => "1",
                "description" => $plan->name,
                "quantity" => "1"
            ]
        ],
        "billing_data" => [
            "apartment" => "803",
            "email" => "claudette09@exa.com",
            "floor" => "42",
            "first_name" => "Clifford",
            "street" => "Ethan Land",
            "building" => "8028",
            "phone_number" => "+86(8)9135210487",
            "shipping_method" => "PKG",
            "postal_code" => "01898",
            "city" => "Jaskolskiburgh",
            "country" => "CR",
            "last_name" => "Nicolas",
            "state" => "Utah",
        ],
        "customer" => ["first_name" => "test",
            "last_name" => "test",
            "email" => "claudettex09@exa.com",
        ],
        "extras" => [
            "name" => Auth::user()->name,
            "userid" => Auth::user()->id,
        ],
    ]);

$h = json_decode($response1->getBody(), true);

$mod = $h['id'];
$t = $h['token'];

$response2 = Http::accept('application/json')
    ->post('https://accept.paymob.com/api/acceptance/payment_keys', [
        "auth_token" => $s,
        "amount_cents" => $plan->price*100,
        "expiration" => 3600,
        "order_id" => $mod,
        "billing_data" => [
            "apartment" => "803",
            "email" => "m.maamoun@alefsoftware.com",
            "floor" => "42",
            "first_name" => "Clifford",
            "street" => "Ethan Land",
            "building" => "8028",
            "phone_number" => "+201100947777",
            "shipping_method" => "PKG",
            "postal_code" => "01898",
            "city" => "Jaskolskiburgh",
            "country" => "CR",
            "last_name" => "Nicolas",
            "state" => "Utah"
        ],
        "currency" => "EGP",
        "integration_id" => 3861381,
        "lock_order_when_paid" => "false"

    ]);
$to = json_decode($response2->getBody(), true);

return redirect('https://accept.paymob.com/api/acceptance/iframes/762987?payment_token=' . $to['token']);


}
}
}
