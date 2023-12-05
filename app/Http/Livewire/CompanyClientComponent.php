<?php

namespace App\Http\Livewire;

use App\Models\Company_client;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;

class CompanyClientComponent extends Component
{
    use WithFileUploads;
    public  $first_name,$last_name,$email,$password,$password_confirmation,$client_id,$phone_number,$company_name,$job_title,$searchId,$searchName,$searchCompany,$client_edit_id,$client_delete_id,$photo;
    public function storeClientData(){
// dd(session()->get('photo'));
        $validatedData=$this->validate([
             'first_name'             =>'required|string|min:2|max:255',
             'last_name'              =>'required|string|min:2|max:255',
             'email'                  => 'required|email|max:255|unique:company_clients',
             'client_id'              => 'required|numeric|unique:company_clients',
             'phone_number'           =>['required', 'regex:/^(?:\+|0)?\d{10,15}$/'],
             'company_name'           =>'required',

        ]);

        $client = new Company_client();
        $client->first_name                       = ($this->first_name  == "" ? NULL : $this->first_name);
        $client->last_name                        = ($this->last_name   == "" ? NULL  : $this->last_name);
        $client->name                             =  trim($this->first_name).' '.trim($this->last_name);
        $client->email                            = ($this->email       == "" ? NULL  : $this->email);
        // $client->password                         = ($this->password    == "" ? NULL  : Hash::make($this->password));
        $client->client_id                        = (int)$this->client_id;
        $client->phone_number                     = (int)$this->phone_number;
        $client->company_name                     = ($this->company_name    == "" ? NULL  : $this->company_name);
        $client->job_title                        = ($this->job_title      == "" ? NULL  : $this->job_title);
        $client->photo                        =        session()->get('photo');
        $client->save();



         // Store the uploaded image
    // if ($this->photo) {
    //     $path = $this->photo->store('photo', 'public');
    //     $client->photo = $path;
    //     $client->save();
    // }
        session()->flash('message', __('added successfully'));

        $this->first_name    = '';
        $this->last_name     = '';
        $this->name          = '';
        $this->email         = '';
        // $this->password      = '';
        $this->client_id     = '';
        $this->phone_number  = '';
        $this->company_name  = '';
        $this->job_title     = '';
        $this->photo     = '';
        session()->forget('photo');

        //For hide modal after add student success
        $this->dispatchBrowserEvent('close-modal');
    }



    public function editClient($id)
    {
// dd($id);
        $client = Company_client::where('id', $id)->first();
        $this->client_edit_id      =  $client->id      ;
        $this->first_name    =       $client->first_name;
        $this->last_name    =        $client->last_name;
        $this->name       =             $client->name;
        $this->email       =             $client->email;
         $this->client_id  =            $client->client_id;
         $this->phone_number  =         $client->phone_number;
         $this->company_name  =         $client->company_name;
         $this->job_title  =            $client->job_title;


        $this->dispatchBrowserEvent('show-edit-client-modal');
    }

    public function editClientData()
    {
        //on form submit validation
        $validatedData=$this->validate([
            'first_name'             =>'required|string|min:2|max:255',
            'last_name'              =>'required|string|min:2|max:255',
            'email'                  => 'required|email|max:255|unique:company_clients,email,'.$this->client_edit_id,
            'client_id'              => 'required|numeric|unique:company_clients,client_id,'.$this->client_edit_id,
            'phone_number'           =>['required', 'regex:/^(?:\+|0)?\d{10,15}$/'],
            'company_name'           =>'required',

       ]);

        $client = Company_client::where('id', $this->client_edit_id)->first();
        $client->first_name                       = ($this->first_name  == "" ? NULL : $this->first_name);
        $client->last_name                        = ($this->last_name   == "" ? NULL  : $this->last_name);
        $client->name                             = trim($this->first_name).' '.trim($this->last_name);
        $client->email                            = ($this->email       == "" ? NULL  : $this->email);
        // $client->password                         = ($this->password    == "" ? NULL  : Hash::make($this->password));
        $client->client_id                        = (int)$this->client_id;
        $client->phone_number                     = (int)$this->phone_number;
        $client->company_name                     = ($this->company_name    == "" ? NULL  : $this->company_name);
        $client->job_title                        = ($this->job_title      == "" ? NULL  : $this->job_title);




        $client->save();

        session()->flash('message', __('updated successfully'));

        //For hide modal after add student success
        $this->dispatchBrowserEvent('close-modal');
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
        $client = Company_client::where('id', $this->client_delete_id)->first();
        $client->delete();


        session()->flash('message', __('deleted successfully'));

        $this->dispatchBrowserEvent('close-modal');

        $this->client_delete_id = '';


    }

    public function cancel()
    {
        $this->client_delete_id = '';
    }

    public function resetInputs()
    {
        $this->client_edit_id ="";
        $this->first_name    ="";
        $this->last_name    ="";
        $this->name       =  "";
        $this->email       = "";
         $this->client_id  = "";
         $this->phone_number= "";
         $this->company_name ="";
         $this->job_title  = "";
        $this->photo     = '';
        session()->forget('photo');


    }




    public $view = 'grid';

    public function setGridView()
    {
        $this->view = 'grid';
    }

    public function setListView()
    {
        $this->view = 'list';
    }



    public function render()
    {
//        dd($this->searchId,$this->searchName,$this->searchCompany);
//         if($this->searchId!='' and $this->searchName!='' and $this->searchCompany!=''){
// dd('1');
//             $clients = Company_client::where('client_id',$this->searchId)->where('name','like','%'.$this->searchName.'%')->where('company_name',$this->searchCompany)->get();
//         }elseif($this->searchId!='' and $this->searchName!='' and $this->searchCompany==''){
//             dd('2');
//             $clients = Company_client::where('client_id',$this->searchId)->where('name','like','%'.$this->searchName.'%')->get();
//         }else {
//             dd('3');
//             $clients = Company_client::all();
//         }


        $query = Company_client::query();

if($this->searchId){
    $query->where('client_id','like','%'.$this->searchId.'%');
}

if($this->searchName){
    $query->where('name','like','%'.$this->searchName.'%');
}
if($this->searchCompany){
    $query->where('company_name',$this->searchCompany);
}

$clients = $query->get();






        $companies = Company_client::distinct()->get('company_name');
        return view('livewire.company-client-component',['clients'=>$clients,'companies'=>$companies])->layout('livewire.layouts.base');
    }
}
