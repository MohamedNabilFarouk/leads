<?php

namespace App\Http\Livewire;

use Illuminate\Http\Request;

use Livewire\Component;

use App\Models\User;

use App\Models\Department;
use App\Models\Module;

use App\Models\Designations;


use App\Models\Education_information;

use App\Models\Family_information;

use App\Models\Experience;
use App\Models\Branch;

use App\Models\Role;
use App\Models\UserSubscriber;
use App\Models\SubscriptionPlan;
use App\Models\Client;
use Carbon\Carbon;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Schema;
use Spatie\Multitenancy\Models\Tenant;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Config;
use Session;
use Auth;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;




class CompanyProfileComponent extends Component
{
    public  $searchCompany,$name,$slug,$email,$password,$password_confirmation,$phone,$client_edit_id,$client_delete_id,$lat,$lng,$radius,$photo,$theme_color;


    public function editClient($id)
    {
        //  dd($id);
        $url=request()->getHost();
        $urlrxplode=explode(".",$url);
        $client = DB::connection('general')->table('clients')
        ->where('id', $id)->first();
        $this->client_edit_id      =  $client->id      ;
        $this->name      =  $client->name      ;
        $this->slug     =$client->slug      ;
        $this->email    =$client->email     ;
        $this->password =$client->password  ;
        $this->password_confirmation =$client->password  ;
        $this->phone    =$client->phone     ;
        $this->lat      =$client->lat       ;
        $this->lng       =$client->lng       ;
        $this->radius        =$client->radius  ;
        $this->theme_color = $client->theme_color;
        $this->nfc_id = $client->nfc_id;


        $this->dispatchBrowserEvent('show-edit-client-modal');
    }

    public function editClientData()
    {
// dd($this->client_edit_id);
        //   dd('heee');
        //on form submit validation
        $this->validate([
            'name'                   =>'required|string|min:2|max:255|unique:clients,name,'.$this->client_edit_id,
            // 'slug'                   => 'required|string|min:2|max:255|unique:clients,slug,'.$this->client_edit_id.'|regex:/(^[a-zA-Z]+[a-zA-Z0-9]*$)/u',
            'email'                  => 'required|email|max:255|unique:clients,email,'.$this->client_edit_id,
            'password'               => 'required|string|min:8',
            'password_confirmation'  => 'required|same:password',
            // 'phone'                 => 'required|numeric|unique:clients,phone,'.$this->client_edit_id
            'lat'=>'numeric',
            'lng'=>'numeric',
            'radius'=> 'numeric',
            'nfc_id'=> 'required',
        ]);
        $url=request()->getHost();
        $urlrxplode=explode(".",$url);
        $company = DB::connection('general')->table('clients')
        ->where('id', $this->client_edit_id)
        ->update([
            "name"      =>  ($this->name   == "" ? NULL : $this->name),
            "slug"    => ($this->slug   == "" ? NULL  : $this->slug),
            "email"   => ($this->email   == "" ? NULL  : $this->email),
            "password"=> Hash::make($this->password),
            "phone"   =>($this->phone  == "" ? NULL  : $this->phone),
            "lat"     =>($this->lat == "" ? NULL : $this->lat),
            "lng"     =>($this->lng == "" ? NULL : $this->lng),
            "radius"=>($this->radius == "" ? NULL : $this->radius),
            "theme_color"=>($this->theme_color == "" ? NULL : $this->theme_color),
            "nfc_id"=>($this->nfc_id == "" ? NULL : $this->nfc_id),
       
         ]);

         $branch = Branch::where("id",1)->first();
         if($branch){
            $branch->lat = $this->lat;
            $branch->lng = $this->lng;
            $branch->radius = $this->radius;
            $branch->nfc_id = $this->nfc_id;
            $branch->save();
         }else{
            Branch::create([
                "title" => "Main Branch",
                "title_ar" => "الفرع الرئيسي",
                "lat" =>  $this->lat,
                "lng" => $this->lng,
                "radius" => $this->radius,
                "nfc_id" => $this->nfc_id,
                "title" => "Main Branch"
            ]);
         }

        // if($this->photo!='') {
        //     $this->photo = $this->photo->store('photos', 'public');
        // }
        //
        // if($this->photo!='') {

        //     $filename = time() . '.' . $this->photo->getClientOriginalExtension();
        //     $path = public_path('photos/' . $filename);

        //     $file = fopen($this->photo, 'r');
        //     file_put_contents($path, fread($file, filesize($this->photo)));
        //     fclose($file);
        //     $client->photo = $filename;
        // }







        session()->flash('message', __('updated successfully'));

        //For hide modal after add employee success
        $this->dispatchBrowserEvent('close-modal');
    }
    public function resetInputs()
    {
        $this->name    ='';
       $this-> slug    ='';
       $this-> email   ='';
       $this-> password='';
       $this-> phone   ='';
       $this-> lat     ='';
       $this-> lng     ='';
       $this-> radius  ='';
       $this->theme_color  ='';
       $this->nfc_id  ='';

    }

    public function close()
    {
        $this->resetInputs();
    }






    public function render(){



        $url=request()->getHost();
        $urlrxplode=explode(".",$url);
        $getclient=DB::connection('general')->table('clients')->where('slug',$urlrxplode[0])->first();
        // if (Auth::user()->email != $getclient->email ) {
        //     // The user is not authenticated
        //     abort(404, 'Unauthorized action.');
        // }
        $company = DB::connection('general')->table('user_subscribers')
        ->leftjoin('clients','user_subscribers.client_id','clients.id')
        ->leftjoin('subscription_plans','user_subscribers.plan_id','subscription_plans.id')
        ->where('slug',$urlrxplode[0])
        ->select('clients.*','clients.name as client_name','clients.id as client_id','subscription_plans.*','user_subscribers.*')
        ->first();
        // if ( !$company ) {
        //     // The user is not authenticated
        //     $getclient->active = 0;
        //     $getclient->save();

        //     abort(404, 'Unauthorized action.');
        // }
    // dd($company);

        if ( !$company ) {
            // The user is not authenticated
            abort(404, 'Unauthorized action.');
        }


        $diffInMonths = Carbon::parse($company->starting_date)->diffInMonths( Carbon::parse( $company->end_date));
        $diffInDays = Carbon::parse($company->starting_date)->diffInDays( Carbon::parse($company->end_date));
        $plans = DB::connection('general')->table('subscription_plans')->get();
        $plans->each(function ($subscriptionPlan) {
            $permissionIds = json_decode($subscriptionPlan->permission_id);

            $permissions = Module::whereIn('id', $permissionIds)->get();

            $subscriptionPlan->permissions = $permissions;
        });
        //  dd($plans[1]->permissions);

        // $plan = UserSubscriber::where('slug',$urlrxplode[0])->first();

        return view('livewire.company-profile-component',compact('company','diffInMonths','diffInDays','plans'))->layout('livewire.layouts.base');
    }
}
