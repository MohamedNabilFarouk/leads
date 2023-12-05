<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\SubscriptionPlan;
use App\Models\Module;
use App\Models\SubModule;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class ModulesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {




      $modules=  DB::connection('general')->table('modules')->get();
      $sub_modules=  DB::connection('general')->table('sub_modules')->get();

      foreach($modules as $p){
        Module::create([
                            'id'=>$p->id,
                        'module_name'=>$p->module_name
                    ]);
      }
      foreach($sub_modules as $p){
        SubModule::create([
                            'id'=>$p->id,
                            'name'=>$p->name,
                        'module_id'=>$p->module_id
                    ]);
      }











    }
}
