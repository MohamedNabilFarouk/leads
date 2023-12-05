<?php

namespace App\Http\Livewire;

use App\Models\ModelHasPermission;
use App\Models\Permission;
use Carbon\Carbon;
use App\Models\Role_module;
use App\Models\RoleHasPermission;
use Livewire\Component;

use Illuminate\Http\Request;

use App\Models\Role;

use App\Models\Module;

use Illuminate\Support\Str;

use DB;
use App\Models\User;
class PermissionsComponent extends Component
{
    public $name,$name_ar,$role_edit_id,$role_delete_id,$idd,$iddd,$idddd,$module_view;

    public function storeRoleData(Request $request)
    {
        //on form submit validation
        $this->validate([
            'name'  => 'required|unique:roles',
            'name_ar'  => 'required|unique:roles',
        ]);

        //Add Promotion Data
        $role               = new Role();
        $role->name         = $this->name;
        $role->name_ar         = $this->name_ar;
        $role->save();

        session()->flash('message', __('added successfully'));

        $this->name  = '';
        $this->name_ar  = '';
        $this->resetInputs();

        //For hide modal after add employee success
        $this->dispatchBrowserEvent('close-modal');
    }
    public function editRole($id)
    {
        $role = Role::where('id', $id)->first();
        $this->role_edit_id           = $role->id;
        $this->name              = $role->name;
        $this->name_ar              = $role->name_ar;


        $this->dispatchBrowserEvent('show-edit-role-modal');
    }

    public function editRoleData()
    {
        //on form submit validation
        $this->validate([
            'name'  => 'required|string',
            'name_ar'  => 'required|string'
        ]);

        $role = Role::where('id', $this->role_edit_id)->first();
        $role->name   = $this->name;
        $role->name_ar   = $this->name_ar;
        $role->save();

        session()->flash('message', __('updated successfully'));

        //For hide modal after add student success
        $this->dispatchBrowserEvent('close-modal');
    }


    //Delete Confirmation
    public function deleteConfirmation($id)
    {
        $this->role_delete_id = $id; //role id

        $this->dispatchBrowserEvent('show-delete-confirmation-modal');
    }
    public function close()
    {
        $this->resetInputs();
    }
    public function resetInputs()
    {

        $this->name	          ='';
        $this->name_ar         ='';
    }
    public function deleteRoleData()
    {
        $role = Role::where('id', $this->role_delete_id)->first();
        $role->delete();

        session()->flash('message', __('deleted successfully'));

        $this->dispatchBrowserEvent('close-modal');

        $this->role_delete_id = '';
    }

    public function cancel()
    {
        $this->role_delete_id = '';
    }

    public function changeEvent($value,$id)
    {

         $this->idd= $id;
    }

    public function changeEventt($value,$id)
    {
        $this->iddd = $id;
        $roleMoudle = DB::table('role_modules')->where('role_id', $this->idd)->where('module_id', $this->iddd)->count();
        if ($roleMoudle==0) {
            Role_module::create([
                'role_id' => $this->idd,
                'module_id' => $this->iddd
            ]);
        } else {

           $m=Module::where('id',$this->iddd)->first();

           $u=User::where('role_id',$this->idd)->get();

            $module_name = str_replace(' ', '-', $m->module_name);
            $module_name=Str::lower($module_name);

            foreach ($u as $us) {
               $s=ModelHasPermission::WhereHas('permission', function ($q) use ($module_name) {
                   $q->where('name', 'like', '%'.$module_name.'%');
               })->WhereHas('user', function ($user) use($us) {
                   $user->where('id', $us->id);
                })->delete();

           }
           $s=RoleHasPermission::WhereHas('permission', function ($qq) use ($module_name) {
                $qq->where('name', 'like', '%'.$module_name.'%');
            })->where('role_id',$this->idd)->delete();




//            foreach ($users as $user) {
//                DB::table('model_has_permissions')->where([
//                    'permission_id' => $this->iddd,
//                    'model_id' => $user->id
//                ])->delete();
//            }
            Role_module::where('role_id', $this->idd)->where('module_id', $this->iddd)->delete();
        }
        \Artisan::call('cache:clear');
    }
        public function changeEventtt($value,$id)
    {
        $rolePermission = DB::table('role_has_permissions')->where('role_id', $this->idd)->where('permission_id',$id)->count();

        if ($rolePermission==0) {
            DB::table('role_has_permissions')->insert([
                'role_id' => $this->idd,
                'permission_id' => $id
            ]);
            $users = DB::table('users')->where('role_id',$this->idd)->get();
            foreach ($users as $user) {
                $permissionModel=DB::table('model_has_permissions')->where([
                    'permission_id' => $id,
                    'model_id' => $user->id,
                    'model_type' => 'App\Models\User'
                ])->count();
//                dd($this->idd,$user->id,$permissionModel);
                if($permissionModel==0) {
                    DB::table('model_has_permissions')->insert([
                        'permission_id' => $id,
                        'model_id' => $user->id,
                        'model_type' => 'App\Models\User'
                    ]);
                }else{
                    DB::table('model_has_permissions')->where([
                        'permission_id' => $id,
                        'model_id' => $user->id,
                        'model_type' => 'App\Models\User'
                    ])->delete();
                }
            }
        }else {
            DB::table('role_has_permissions')->where('role_id', $this->idd)->where('permission_id',$id)->delete();
            $users = DB::table('users')->where('role_id',$this->idd)->get();
            foreach ($users as $user) {
                $permissionModel=DB::table('model_has_permissions')->where([
                    'permission_id' => $id,
                    'model_id' => $user->id,
                    'model_type' => 'App\Models\User'
                ])->count();
//                dd($this->idd,$user->id,$permissionModel);
                if($permissionModel==0) {
                    DB::table('model_has_permissions')->insert([
                        'permission_id' => $id,
                        'model_id' => $user->id,
                        'model_type' => 'App\Models\User'
                    ]);
                }else{
                    DB::table('model_has_permissions')->where([
                        'permission_id' => $id,
                        'model_id' => $user->id,
                        'model_type' => 'App\Models\User'
                    ])->delete();
                }
            }
        }
        \Artisan::call('cache:clear');
    }

    public function mount()
    {
        if($this->idd!=''){
            $this->changeEvent($value, $id);

        }else{
            $sactive_role=Role::first();
            $this->idd=$sactive_role->id;
        }
        if($this->iddd!=''){
            $this->changeEventt($value, $id);
        }
//else{
//            $sactive_role=role_modules::first();
//            $this->idd=$sactive_role->id;
//        }
//        dd($this->iddd,$this->idd);
//
//        $this->module_view=DB::table('role_modules')
//                            ->join('modules','role_modules.module_id','=','modules.id')
//                            ->join('roles','role_modules.role_id','=','roles.id')
//                            ->where('modules.id',$this->iddd)
//                            ->where('roles.id', $this->idd)
//                            ->select('modules.module_name as module_name')
//                            ->get();
//        dd($this->module_view);
    }

    public function render()
    {
        // get auth client
        $url=request()->getHost();

        $urlrxplode=explode(".",$url);
    $client=  DB::connection('general')->table('clients')->where('slug',$urlrxplode[0])->first();
// get plan for this client and it's modules
    $usersWithPlans = DB::connection('general')->table('clients')
    ->join('user_subscribers', function ($join) use ($client) {
          $join->on('clients.id', '=', 'user_subscribers.client_id')
             ->where([['clients.id', $client->id],['user_subscribers.end_date','>',Carbon::now()],['is_paid','1']]);
    })
    ->join('subscription_plans', 'subscription_plans.id', '=', 'user_subscribers.plan_id')
    ->select('clients.name', 'clients.id'  , 'subscription_plans.name AS plan_name', 'subscription_plans.id AS plan_id','subscription_plans.permission_id AS modules')
    ->latest('user_subscribers.created_at')
    ->first();



        //    dd(json_decode($usersWithPlans->modules));
         $modulesArr=json_decode($usersWithPlans->modules);

            $modules = Module::whereIn('id', $modulesArr)->get();
            // dd($modules);
        $roles=Role::all();
        // foreach ($modules as $module) {
        //     $permission = Permission::where('name', 'not like', '%'.$module->module_name . '-%')->first();

        //     if ($permission) {
        //         // Permission found that doesn't match the module name
        //         echo "Permission Name: " . $permission->name . "<br>";
        //     } else {
        //         // No permission found for the module
        //         echo "No permission found for module: " . $module->module_name . "<br>";
        //     }
        // }
        //     die();
        // $modules=Module::all();
         $permissions=Permission::all();

        // $modules=   DB::connection('general')->table('modules')->get();
        // $permissions=   DB::connection('general')->table('permissions')->all();
        return view('livewire.permissions-component',['roles'=>$roles,'modules'=>$modules,'permissions'=>$permissions,'modulesArr'=>$modulesArr])->layout('livewire.layouts.base');
    }
}
