<?php

namespace App\Http\Livewire;

use Illuminate\Http\Request;

use Livewire\Component;

use App\Models\User;

use App\Models\Department;

use App\Models\Designations;


use App\Models\Education_information;

use App\Models\Family_information;

use App\Models\Experience;

use App\Models\Role;
use App\Models\UserSubscriber;
use App\Models\SubscriptionPlan;
use App\Models\Company_client;
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




class CompanyClientProfileComponent extends Component
{
    public  $client_id,$searchCompany,$name,$slug,$email,$password,$password_confirmation,$phone,$client_edit_id,$client_delete_id,$lat,$lng,$radius,$photo;



    public function mount($id)
    {
        $this->client_id = $id;
    }



    public function render(){

// dd($this->client_id);
        $client =Company_client::where('id',$this->client_id)->with('project')->first();
        // dd($client);

        return view('livewire.company-client-profile-component',compact('client'))->layout('livewire.layouts.base');
    }
}
