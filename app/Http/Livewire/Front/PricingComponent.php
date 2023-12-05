<?php

namespace App\Http\Livewire\Front;

use App\Models\User;
use App\Models\UserSubscriber;
use Livewire\Component;

use App\Models\SubscriptionPlan;
use Illuminate\Support\Facades\Http;
use Auth;
use Carbon\Carbon;

class PricingComponent extends Component
{

    public function ChoosePlan($value,$id){




        if(!Auth::guard('clients')->user()) {

            $this->redirect('/sign_in');

        }else {
            $plan = SubscriptionPlan::where('id', $id)->first();

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
                    "merchant_order_id" => rand(1, 1000),
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
                    "customer" => ["first_name" => Auth::guard('clients')->user()->name,
                        "last_name" => " ",
                        "email" => Auth::guard('clients')->user()->email,
                    ],
                    "extras" => [
                        "name" => Auth::guard('clients')->user()->name,
                        "userid" => Auth::guard('clients')->user()->id,
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

            $this->redirect('https://accept.paymob.com/api/acceptance/iframes/762987?payment_token=' . $to['token']);

            $duration='add'.$plan->frequency;
            UserSubscriber::create([
                'client_id'     => Auth::guard('clients')->user()->id,
                'plan_id'       => $plan->id,
                'order_id'         => $mod,
                'starting_date' => Carbon::now(),
                'end_date'      => Carbon::now()->$duration(),
                'total'         => $plan->price,
                'is_paid'         => 0
            ]);
        }
    }
    public function render()
    {
        $plans=SubscriptionPlan::all();
        return view('livewire.front.pricing-component',['plans'=>$plans])->layout('livewire.layouts.front');
    }

}
