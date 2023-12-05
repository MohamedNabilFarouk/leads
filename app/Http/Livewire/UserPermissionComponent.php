<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\User_permission;

use DB;

class UserPermissionComponent extends Component
{
    public  $user_id,$role_id,$user_permission_edit_id,$user_permission_delete_id;

    public function storeUserPermissionData(Request $request)
    {
        //on form submit validation
        $this->validate([
            '$user_id'    => 'required',
            '$role_id'    => 'required'
        ]);

        //Add Termination Data
        $user_permission                      = new User_permission();
        $user_permission->user_id             = $this->user_id;
        $user_permission->role_id             = $this->role_id;

        $user_permission->save();

        session()->flash('message', __('added successfully'));

        $this->user_id  = '';
        $this->role_id  = '';


        //For hide modal after add user permission success
        $this->dispatchBrowserEvent('close-modal');
    }

    public function resetInputs()
    {

        $this->user_id  = '';
        $this->role_id  = '';

    }


    public function close()
    {
        $this->resetInputs();
    }

    public function editTermination($id)
    {
        $user_permission = User_permission::where('id', $id)->first();
        $this->user_permission_edit_id  = $user_permission->id;
        $this->user_id                  = $termination->user_id;
        $this->role_id                  = $termination->role_id;

        $this->dispatchBrowserEvent('show-edit-user-permission-modal');
    }

    public function editUserPermissionData()
    {
        //on form submit validation
        $this->validate([
            'user_id' => 'required',
            'role_id' => 'required'
        ]);

        $userpermission = User_permission::where('id', $this->user_permission_edit_id)->first();
        $userpermission->user_id    = $this->user_id;
        $userpermission->role_id    = $this->role_id;
        $userpermission->save();

        session()->flash('message', __('updated successfully'));

        //For hide modal after add employee success
        $this->dispatchBrowserEvent('close-modal');
    }


    //Delete Confirmation
    public function deleteConfirmation($id)
    {
        $this->user_permission_delete_id = $id; //termination id

        $this->dispatchBrowserEvent('show-delete-confirmation-modal');
    }

    public function deleteUserPermissionData()
    {
        $user_permission = User_permission::where('id', $this->user_permission_delete_id)->first();
        $user_permission->delete();

        session()->flash('message', __('deleted successfully'));

        $this->dispatchBrowserEvent('close-modal');

        $this->user_permission_delete_id = '';
    }

    public function cancel()
    {
        $this->user_permission_delete_id = '';
    }

    public function render()
    {
        $permissions = DB::table('users')
            ->leftjoin('departments', 'users.department', '=', 'departments.id')
            ->leftjoin('designations', 'users.job_title', '=', 'designations.id')
            ->leftjoin('roles', 'users.role_id', '=', 'roles.id')
            ->select('users.id as user_id','users.name as user_name','users.photo as user_photo','users.created_at as user_created_at', 'departments.name as department_name', 'designations.name as designation_name','roles.role_name')
            ->get();
        return view('livewire.user-permission-component',['permissions'=>$permissions])->layout('livewire.layouts.base');
    }
}
