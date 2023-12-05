<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\EmailConfig;
use DB;
class EmailConfigComponent extends Component
{
    public  $email_from_address,$email_from_name,$smtp_host,$smtp_user,$smtp_password,$smtp_port,$smtp_security,$smtp_authentication_domain;
    public function mount(){
        $currenturl = request()->getHost();
        
        $tenantid=DB::connection('landlord')->table('tenants')->where('domain',$currenturl)->first();
      
        $email=DB::connection('general')->table('email_configs')->where('tenant_id',$tenantid->id)->first();
        $this->email_from_address          = @$email->email_from_address;
        $this->email_from_name             = @$email->email_from_name;
        $this->smtp_host                   = @$email->smtp_host;
        $this->smtp_user                   = @$email->smtp_user;
        $this->smtp_password               = @$email->smtp_password;
        $this->smtp_port                   = @$email->smtp_port;
        $this->smtp_security               = @$email->smtp_security;
        $this->smtp_authentication_domain  = @$email->smtp_authentication_domain;
    }
    public function editMail(){
        $this->validate([
            'email_from_address'         =>  'required',
            'email_from_name'             => 'required',
            'smtp_host'                  => 'required',
            'smtp_user'                  => 'required',
            'smtp_password'              => 'required',
            'smtp_port'                  =>'required|numeric',
            'smtp_security'              =>'required'

        ]);
        $currenturl = request()->getHost();
        
        $tenantid=DB::connection('landlord')->table('tenants')->where('domain',$currenturl)->first();

        $email=DB::connection('general')->table('email_configs')->where('tenant_id',$tenantid->id)->first();
        if(!$email){
            
                DB::connection('general')->table('email_configs')->insert([
                'email_from_address'           => $this->email_from_address,
                'email_from_name'              => $this->email_from_name,
                'smtp_host'                    =>  $this->smtp_host,
                'smtp_user'                    => $this->smtp_user,
                'smtp_password'                => $this->smtp_password,
                'smtp_port'                    => $this->smtp_port,
                'smtp_security'                => $this->smtp_security,
                'smtp_authentication_domain'   => $this->smtp_authentication_domain,
                'tenant_id'                    => $tenantid->id
    
            ]);
        }else{
          
            DB::connection('general')->table('email_configs')->where('tenant_id',$tenantid->id)
            ->update([
                'email_from_address'           => $this->email_from_address,
                'email_from_name'              => $this->email_from_name,
                'smtp_host'                    =>  $this->smtp_host,
                'smtp_user'                    => $this->smtp_user,
                'smtp_password'                => $this->smtp_password,
                'smtp_port'                    => $this->smtp_port,
                'smtp_security'                => $this->smtp_security,
                'smtp_authentication_domain'   => $this->smtp_authentication_domain,
            ]);
        }
        
        session()->flash('message', __('updated successfully'));
    }
    public function render()
    {
        return view('livewire.email-config-component')->layout('livewire.layouts.base');
    }
}
