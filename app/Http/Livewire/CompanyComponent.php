<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Company;

class CompanyComponent extends Component
{
    public $company_name,$contact_person,$address,$country,$city,$state_province,$postal_code,$email,$phone_number,$mobile_number,
           $fax,$website_url;

    public function mount(){
        $company = Company::where('id', 1)->first();
        $this->company_name   = $company->company_name;
        $this->contact_person = $company->contact_person;
        $this->address        = $company->address;
        $this->country        = $company->country;
        $this->city           = $company->city;
        $this->state_province = $company->state_province;
        $this->postal_code    = $company->postal_code;
        $this->email          = $company->email;
        $this->phone_number   = $company->phone_number;
        $this->mobile_number  = $company->mobile_number;
        $this->fax            = $company->fax;
        $this->website_url    = $company->website_url;
    }
    public function editCompanyData()
    {
        //on form submit validation
        $this->validate([
            'company_name'  => 'required'
        ]);

        $company = Company::where('id', 1)->first();
        $company->company_name    = $this->company_name;
        $company->contact_person  = $this->contact_person;
        $company->address         = $this->address;
        $company->country         = $this->country;
        $company->city            = $this->city;
        $company->state_province  = $this->state_province;
        $company->postal_code     = $this->postal_code;
        $company->email           = $this->email;
        $company->phone_number    = $this->phone_number;
        $company->mobile_number   = $this->mobile_number;
        $company->fax             = $this->fax;
        $company->website_url     = $this->website_url;
        $company->save();
        session()->flash('message', __('updated successfully'));
    }

    public function render()
    {
        return view('livewire.company-component')->layout('livewire.layouts.setting');
    }
}
