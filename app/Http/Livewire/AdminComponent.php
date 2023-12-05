<?php

namespace App\Http\Livewire;


use App\Http\Livewire\Layouts\Admin;
use App\Models\Department;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class AdminComponent extends Component
{
    use WithFileUploads;
    public  $first_name,$last_name,$name, $email,$password,$password_confirmation,$photo,$phone_number,$admin_edit_id,$admin_delete_id;


    //Input fields on update validation
    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'name'  => 'required|string'
        ]);
    }


    public function storeAdminData()
    {
        $validatedData=$this->validate([
            'first_name'             =>'required|string|min:2|max:255',
            'last_name'              =>'required|string|min:2|max:255',
            'email'                  => 'required|email|max:255|unique:users',
            'password'               => 'required|string|min:8',
            'password_confirmation'  => 'required|same:password',
            'phone_number'           => 'required|numeric'
        ]);

        //Add Employee Data
        $admin = new User();
        $admin->first_name                       = ($this->first_name  == "" ? NULL : $this->first_name);
        $admin->last_name                        = ($this->last_name   == "" ? NULL  : $this->last_name);
        $admin->name                             =  $this->first_name.' '.$this->last_name;
        $admin->email                            = ($this->email       == "" ? NULL  : $this->email);
        $admin->password                         = ($this->password    == "" ? NULL  : Hash::make($this->password));
        $admin->phone_number                     = (int)$this->phone_number;

        if($this->photo!='') {
            $this->photo = $this->photo->store('photos', 'public');
        }
        $admin->photo = $this->photo;
        $admin->save();

        session()->flash('message', __('added successfully'));

        $this->first_name                      ='';
        $this->last_name                       ='';
        $this->email                           ='';
        $this->password                        ='';
        $this->password_confirmation           ='';
        $this->photo                           ='';
        $this->phone_number                    ='';

        //For hide modal after add employee success
        $this->dispatchBrowserEvent('close-modal');
    }

    public function resetInputs()
    {
        $this->first_name                      ='';
        $this->last_name                       ='';
        $this->email                           ='';
        $this->password                        ='';
        $this->password_confirmation           ='';
        $this->photo                           ='';
        $this->phone_number                    ='';
    }

    public function close()
    {
        $this->resetInputs();
    }
    public function editAdmin($id)
    {
        $admin = User::where('id', $id)->first();
        $this->admin_edit_id          = $admin->id;
        $this->first_name             = $admin->first_name;
        $this->last_name              = $admin->last_name;
        $this->name                   = $admin->name;
        $this->email                  = $admin->email;
        $this->phone_number           = $admin->phone_number;
        $this->photo                  = $admin->photo;

        $this->dispatchBrowserEvent('show-edit-admin-modal');
        }

        public function editAdminData()
        {
            //on form submit validation
            $this->validate([
                'first_name'               =>  'required|string|max:255',
                'last_name'                => 'required|string|max:255',
                'email'                   => 'required|email|max:255',
                'phone_number'            =>'required|numeric',
            ]);

            $admin = User::where('id', $this->admin_edit_id)->first();
            $admin->first_name             = $this->first_name;
            $admin->last_name              = $this->last_name;
            $admin->name                   = $this->first_name.' '.$this->last_name;
            $admin->email                  = $this->email;
            $admin->phone_number           = $this->phone_number;

            if ($this->photo==$admin->photo) {
            }else{

                $original = $this->photo->getClientOriginalName();
                $filename = time().$original;

                $this->photo = $this->photo->storeAs('photos',$filename, 'public');
                $admin->photo = $this->photo;
            }
            $admin->save();
        // dd($this->role_id);


            session()->flash('message', __('updated successfully'));

            //For hide modal after add employee success
            $this->dispatchBrowserEvent('close-modal');
    }

    //Delete Confirmation
    public function deleteConfirmation($id)
    {
        $this->admin_delete_id = $id; //admin id

        $this->dispatchBrowserEvent('show-delete-confirmation-modal');
    }

    public function deleteAdminData()
    {
        $admin = User::where('id', $this->admin_delete_id)->first();
        $admin->delete();

        session()->flash('message', __('deleted successfully'));

        $this->dispatchBrowserEvent('close-modal');

        $this->admin_delete_id = '';
    }

    public function cancel()
    {
        $this->admin_delete_id = '';
    }

    public function render()
    {
        $admins = User::paginate(10);
        return view('livewire.admin-component',['admins'=>$admins])->layout('livewire.layouts.base');
    }
}
