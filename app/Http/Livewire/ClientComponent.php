<?php

namespace App\Http\Livewire;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Schema;
use Spatie\Multitenancy\Models\Tenant;
use Illuminate\Support\Facades\Artisan;
use App\Models\Client;
use Illuminate\Support\Facades\Config;
use Session;
use Auth;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;
use Carbon\Carbon;

class ClientComponent extends Component
{

   use WithFileUploads;

    public  $searchCompany,$name,$slug,$email,$password,$password_confirmation,$phone,$client_edit_id,$client_delete_id,$lat,$lng,$radius,$photo;
    public function storeClientData(Request $request)
    {

        $validatedData=$this->validate([
            'name'                   =>'required|string|min:2|max:255|unique:clients',
            'slug'                   => 'required|string|min:2|max:255|unique:clients|regex:/(^[a-zA-Z]+[a-zA-Z0-9]*$)/u',
            'email'                  => 'required|email|max:255|unique:clients',
            'password'               => 'required|string|min:8',
            'password_confirmation'  => 'required|same:password',
            'phone'                 => 'required|numeric|unique:clients',
            // 'nfc_id'  => 'required',
        //    'photo'                  =>'image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        // dd($request->all());
        $client=new Client;
        $client->name                     = ($this->name   == "" ? NULL : $this->name);
        $client->slug                     = ($this->slug   == "" ? NULL  : $this->slug);
        $client->email                    = ($this->email  == "" ? NULL  : $this->email);
        $client->password                 = Hash::make($this->password);
        $client->phone                    = ($this->phone  == "" ? NULL  : $this->phone);
        $client->lat                      = ($this->lat == "" ? NULL : $this->lat);
        $client->lng                      = ($this->lng == "" ? NULL : $this->lng);
        $client->radius                   = ($this->radius == "" ? NULL : $this->radius);
        // $client->nfc_id                   = ($this->nfc_id == "" ? NULL : $this->nfc_id);

        //  dd(session()->get('photo'));
        // if($this->photo!='') {
        //     $this->photo = $this->photo->store('photos', 'public');
        // }
        $client->photo                        =        session()->get('photo');
        $client->save();

        $tenant = new Tenant;
        $tenant->name = $this->name;
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
        $user->first_name                       = ($this->name  == "" ? NULL : $this->name);
        $user->last_name                        = ($this->name   == "" ? NULL  : $this->name);
        $user->name                             =  $this->name;
        $user->email                            = ($this->email       == "" ? NULL  : $this->email);
        $user->password                         = ($this->password    == "" ? NULL  : Hash::make($this->password));
        $user->phone_number                     = (int)$this->phone;
        $user->role_id                          = 1;
        $user->employee_id                      = 1;
        $user->save();

    //    $role_id=Role::where('id',1)->first();
    //    $user->assignRole(1);


    //    $role_id=Role::where('id',1)->first();

    //    $role_permission= DB::table('role_has_permissions')->where('role_id',$role_id->id)->get();
    //    foreach ($role_permission as $role_permissions) {
    //        DB::table('model_has_permissions')->insert([
    //            'permission_id' => $role_permissions->permission_id,
    //            'model_id'      =>  $user->id
    //        ]);
    //    }
    //    $usersPermission = User::permission('all-employees-read')->where('id','!=', $user->id)->get();


        $t=Tenant::where('domain',request()->getHost())->first();

        $t->makeCurrent();


        session()->flash('message', __('added successfully'));

        $this->first_name                      ='';
        $this->last_name                       ='';
        $this->email                           ='';
        $this->password                        ='';
        $this->password_confirmation           ='';
        $this->customer_code                   ='';
        $this->company_name                    ='';
        $this->phone_number                    ='';
        $this->role_id                         ='';
        $this->nfc_id                         ='';
        session()->forget('photo');
        //For hide modal after add employee success
        $this->dispatchBrowserEvent('close-modal');
        // return redirect(request()->header('Referer'));
    }
    public function changeEvent($value,$id)
    {
        $clientStatus=Client::where('id',$id)->first();
        if ($clientStatus->active==1) {
            Client::where('id',$id)->update(['active'=>0]);
        } else {
            Client::where('id',$id)->update(['active'=>1]);

        }
    }


    public function verifyEvent($value,$id)
    {
        $clientStatus=Client::where('id',$id)->first();
        if ($clientStatus->email_verified_at != null) {
            Client::where('id',$id)->update(['email_verified_at'=>null]);
        } else {
            Client::where('id',$id)->update(['email_verified_at'=>Carbon::now()]);

        }
    }


    public function clickEvent($id){
//        // Set multiple variables in the session
        $client=Client::where('id',$id)->first();
////        Session::put([
////            'key1' => 'superAdmin',
////            'key3'=> auth()->user()->email,
////            'key2' => $client->email
////        ]);
//
//        Auth::logout();

        $t=Tenant::where('domain',$client->slug.'.'.request()->getHttpHost())->first();

        $t->makeCurrent();
    //   auth()->attempt([
    //        'email' => 'info@gmail.com',
    //        'password' => '123456789'
    //    ]);
    //    Auth::loginUsingId(1, TRUE);
    //    dd(auth()->user());
    //    $user = User::where('id',1)->first();

    //    Auth::login($user);
    // $s=

    //    return redirect('http://'.$t->domain.'');
        return redirect('https://'.$t->domain.'/client-dashboard');
    }
    public function editClient($id)
    {
        $client = Client::where('id', $id)->first();
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
        $this->nfc_id        =$client->nfc_id  ;


        $this->dispatchBrowserEvent('show-edit-client-modal');
    }

    public function editClientData()
    {
        // dd('heee');
        //on form submit validation
        $this->validate([
            'name'                   =>'required|string|min:2|max:255|unique:clients,name,'.$this->client_edit_id,
            'slug'                   => 'required|string|min:2|max:255|unique:clients,slug,'.$this->client_edit_id.'|regex:/(^[a-zA-Z]+[a-zA-Z0-9]*$)/u',
            'email'                  => 'required|email|max:255|unique:clients,email,'.$this->client_edit_id,
            'password'               => 'required|string|min:8',
            'password_confirmation'  => 'required|same:password',
            'phone'                 => 'required|numeric|unique:clients,phone,'.$this->client_edit_id,
            'nfc_id'                 => 'required'


        ]);

        $client = Client::where('id', $this->client_edit_id)->first();
// dd($client);
        $client->name                     = ($this->name   == "" ? NULL : $this->name);
        $client->slug                     = ($this->slug   == "" ? NULL  : $this->slug);
        $client->email                    = ($this->email  == "" ? NULL  : $this->email);
        $client->password                 = Hash::make($this->password);
        $client->phone                    = ($this->phone  == "" ? NULL  : $this->phone);
        $client->lat                      = ($this->lat == "" ? NULL : $this->lat);
        $client->lng                      = ($this->lng == "" ? NULL : $this->lng);
        $client->radius                   = ($this->radius == "" ? NULL : $this->radius);
        $client->nfc_id                   = ($this->nfc_id == "" ? NULL : $this->nfc_id);

        // if($this->photo!='') {
        //     $this->photo = $this->photo->store('photos', 'public');
        // }
        //
        if($this->photo!='') {

            $filename = time() . '.' . $this->photo->getClientOriginalExtension();
            $path = public_path('photos/' . $filename);

            $file = fopen($this->photo, 'r');
            file_put_contents($path, fread($file, filesize($this->photo)));
            fclose($file);
            $client->photo = $filename;
        }

        $client->save();

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
       $this-> nfc_id  ='';
       session()->forget('photo');

    }

    public function close()
    {
        $this->resetInputs();
    }
    public function deleteConfirmation($id)
    {
        $this->client_delete_id = $id; //employee id

        $this->dispatchBrowserEvent('show-delete-confirmation-modal');
    }
    public function deleteClientData()
    {
        $client = Client::where('id', $this->client_delete_id)->first();

        \DB::reconnect('landlord');
        $tenant = Tenant::where('id', $client->tenants_id)->first();

        // Deleting the DB of the client
        \DB::statement('DROP DATABASE ' . $tenant->database);

        $tenant->delete();

        \DB::reconnect('tenant');
        $client->delete();

        session()->flash('message', __('deleted successfully'));

        $this->dispatchBrowserEvent('close-modal');

        $this->client_delete_id = '';

    }

    public function cancel()
    {
        $this->client_delete_id = '';
    }

    public function render(Request $request)
    {

// dd($request->all());
        // $today = Carbon::now()->startOfDay();
        // $future_date = Carbon::now()->addDays(30)->endOfDay();
        $query = Client::query();
        if($this->searchCompany!=''){
            $query->where('name','like','%'.$this->searchCompany.'%')->get();

        }
        if($request->active){
            $query->where('active','1')->get();
        }
        if($request->nonactive){
            $query->where('active','0')->get();
        }

        if($request->notVerified){
            $query->where('email_verified_at',null)->get();
        }
        // if($request->expired){
        //     $query->whereHas('plan',function ($q) use($today) { //expired client plan
        //     $q->where('end_date','<', $today)->where('is_paid','1');
        // })->get();
    // }
            $clients =   $query ->get();


        return view('livewire.client-component',['clients'=>$clients])->layout('livewire.layouts.base');
    }
}
