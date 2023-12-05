<?php

namespace App\Http\Livewire\Front;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use App\Models\Client;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Mail;
use App\Mail\EmailVerification;
use Spatie\Multitenancy\Models\Tenant;
use Illuminate\Support\Facades\Artisan;
use App\Models\User;
use Illuminate\Support\Facades\DB;
class RegisterComponent extends Component
{
   public $name,$email,$password,$password_confirmation,$slug,$phone,$theme_color,$first_name,$last_name;

    public function  register()
    {

        $validatedData = $this->validate([
            'first_name' => 'required|string|min:2|max:255',
            'last_name' => 'required|string|min:2|max:255',
            'slug' => 'required|string|min:2|max:255|unique:clients|regex:/(^[a-zA-Z]+[a-zA-Z0-9]*$)/u',
            'email' => 'required|email|max:255|unique:clients',
            'password' => 'required|string|min:8',
            'password_confirmation' => 'required|same:password',
            'phone' => 'required|numeric|unique:clients'
        ]);


        DB::beginTransaction();
        try {

        $client = new Client;
        $client->name = $this->first_name.' '.$this->last_name;
        $client->slug = ($this->slug == "" ? NULL : $this->slug);
        $client->email = ($this->email == "" ? NULL : $this->email);
        $client->password = Hash::make($this->password);
        $client->phone = ($this->phone == "" ? NULL : $this->phone);
        $client->theme_color =  ($this->theme_color == "" ? NULL : $this->theme_color);
        $client->verification_token = Str::random(40);
        $client->save();


  $tenant = new Tenant;
  $tenant->name = $this->first_name.' '.$this->last_name;
  $tenant->domain = $this->slug.'.'. request()->getHttpHost();
  $tenant->database=$this->slug;
  $tenant->save();


  Client::where('id', $client->id)
 ->update([
     'tenants_id' => $tenant->id
  ]);

  Artisan::call('db:create '.$this->slug);
  $tenantId = $tenant->id; // ID of the tenant you want to migrate
  Artisan::call('tenants:artisan migrate --tenant=' . $tenantId);

  $tenant->makeCurrent();
  Artisan::call('db:seed');
  //Add Client Data
  $user = new User;
  $user->first_name                       = ($this->first_name  == "" ? NULL : $this->first_name);
  $user->last_name                        = ($this->last_name   == "" ? NULL  : $this->last_name);
  $user->name                             =  $this->first_name.' '.$this->last_name;
  $user->email                            = ($this->email       == "" ? NULL  : $this->email);
  $user->password                         = ($this->password    == "" ? NULL  : Hash::make($this->password));
  $user->phone_number                     = (int)$this->phone;
  $user->role_id                          = 1;
  $user->employee_id                      = 1;
  $user->save();

  $rand=$client->id;

//   $data = array('name'=>$client->name,'token'=>\Crypt::encrypt($rand));
//   Mail::send('mail', $data, function($message) {
//       $message->to('minaw77@gmail.com', 'Tutorials Point')->subject
//       ('Laravel HTML Testing Mail');
//       $message->from('xyz@gmail.com','Virat Gandhi');
//   });


$data = array('name'=>$client->name,'token'=>\Crypt::encrypt($rand));
// Mail::send('mail', $data, function($message) {
//     $message->to($this->email, $this->name)->subject
//     ('Activation Mail');
//     $message->from('info@alefsoftware.com','Alef Software');
// });

// $client->sendEmailVerificationNotification();

session()->flash('message','Please Verify Your Email' );
 // Send the verification email
Mail::to($client->email)->send(new EmailVerification($client));


  $t=Tenant::where('domain',request()->getHost())->first();

  $t->makeCurrent();

  session()->flash('message', __('Check Your Mail To Activate Account'));

  DB::commit();
  \Auth::guard('clients')->login($client);

//   if(\Auth::guard('clients')->attempt(array('email' => $this->email, 'password' => $this->password))){
//     $user=\Auth::guard('clients')->user();

//   }

} catch (\Exception $e) {
    // If an exception is thrown, rollback the transaction
    session()->flash('message', __('Error.. try again later'));
    DB::rollback();

    // Handle the exception
    throw $e;
}

     return redirect('/index');

    }
    public function render()
    {

//        $response = Http::accept('application/json')
//            ->post('https://accept.paymob.com/api/auth/tokens', [
//            'api_key' => 'ZXlKaGJHY2lPaUpJVXpVeE1pSXNJblI1Y0NJNklrcFhWQ0o5LmV5SmpiR0Z6Y3lJNklrMWxjbU5vWVc1MElpd2ljSEp2Wm1sc1pWOXdheUk2T0RBMk5EUXdMQ0p1WVcxbElqb2lhVzVwZEdsaGJDSjkuc2tPTEVKaHZZUzd0b2t5OVJ4a0lLUlNKbURLYXlnOWdsczFmTlRGX3FSQVlBMzJZaE9janhIbWNzV2FNVjJQWElsa2NZcHZrbWRMVTNWcXBELVVwVFE=',
//        ]);
//
//$m=json_decode($response->getBody(),true);
//$s=$m['token'];
//
//        $response1 = Http::accept('application/json')
//            ->post('https://accept.paymob.com/api/ecommerce/orders', [
//                "auth_token"=>  $s,
//                 "delivery_needed"=> "false",
//                 "amount_cents"=> "100",
//                  "currency"=> "EGP",
//                  "merchant_order_id"=> 300,
//                    $items=[
//                        [
//                            "name"=>"ASC1124",
//                            "amount"=>"150",
//                            "description"=> "Smart Watch",
//                            "quantity"=> "1"
//                        ],
//                        [
//                            "name"=>"ERT6565",
//                            "amount"=> "150",
//                            "description"=> "Power Bank",
//                            "quantity"=>"1"
//                        ]
//                    ],
//                    $billing_data=[
//                        "apartment"=> "803",
//                        "email"=> "claudette09@exa.com",
//                        "floor"=> "42",
//                        "first_name"=> "Clifford",
//                        "street"=> "Ethan Land",
//                        "building"=> "8028",
//                        "phone_number"=> "+86(8)9135210487",
//                        "shipping_method"=> "PKG",
//                        "postal_code"=> "01898",
//                        "city"=> "Jaskolskiburgh",
//                        "country"=> "CR",
//                        "last_name"=> "Nicolas",
//                        "state"=> "Utah",
//                    ],
//                    $customer=["first_name"=> "test",
//                        "last_name"=> "test",
//                        "email"=> "claudettex09@exa.com",
//                    ],
//                    $extras= [
//                        "name" => "test",
//                        "userid"=> "30",
//                    ],
//           ]);
//
//$h=json_decode($response1->getBody(),true);
//$mod=$h['id'];
//$t=$h['token'];
//
//;
//        $response2 = Http::accept('application/json')
//            ->post('https://accept.paymob.com/api/acceptance/payment_keys', [
//  "auth_token"=> $s,
//  "amount_cents"=> "100",
//  "expiration"=> 3600,
//  "order_id"=> $mod,
//  $billing_data=[
//        "apartment"=> "803",
//    "email"=> "m.maamoun@alefsoftware.com",
//    "floor"=> "42",
//    "first_name"=> "Clifford",
//    "street"=> "Ethan Land",
//    "building"=> "8028",
//    "phone_number"=> "+201100947777",
//    "shipping_method"=> "PKG",
//    "postal_code"=> "01898",
//    "city"=> "Jaskolskiburgh",
//    "country"=> "CR",
//    "last_name"=> "Nicolas",
//    "state"=> "Utah"
//  ],
//  "currency"=> "EGP",
//  "integration_id"=> 3861389,
//  "lock_order_when_paid"=> "false"
//
//            ]);
//dd(json_decode($response2->getBody(),true));


        return view('livewire.front.register-component')->layout('livewire.layouts.front');
    }
}
