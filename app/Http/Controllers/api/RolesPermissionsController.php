<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Traits\GeneralTrait;

class RolesPermissionsController extends Controller
{
    use GeneralTrait;
    public function addPermissionToRole(Request $request){

        $role = Role::find($request->role_id);
        $permissions=json_decode($request->permission_id);
        $role->syncPermissions($permissions);



// Sync the role's permissions with all users having that role
    $role->users()->each(function ($user) use ($role) {
    $user->syncPermissions($role->permissions);
    });
        return $this->generalResponse(200,'updated successfully');
    }

}
