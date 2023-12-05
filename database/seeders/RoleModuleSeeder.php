<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\SubscriptionPlan;
use App\Models\Role_module;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class RoleModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {




      $role_modules=  DB::connection('general')->table('role_modules')->get();

      foreach($role_modules as $p){
        Role_module::create([
                        'role_id'=>$p->role_id,
                        'module_id'=>$p->module_id
                    ]);
      }











    }
}
