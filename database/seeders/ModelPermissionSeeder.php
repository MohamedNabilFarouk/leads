<?php

namespace Database\Seeders;

use App\Models\ModelHasPermission;
use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class ModelPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // $modelsHasPermissions=  DB::connection('general')->table('model_has_permissions')->get();
        $permissions = Permission::all();

        foreach($permissions as $p){
            ModelHasPermission::create([
            'permission_id'=>$p->id,
            'model_type'=>'App\Models\User',
            'model_id'=>1
        ]);
      }

      for($i=13; $i<=22; $i++){
        ModelHasPermission::create([
            'permission_id'=>$i,
            'model_type'=>'App\Models\User',
            'model_id'=>1
        ]);
      }
        // ModuleHasPermission::create([
        //     'permission_id'=>'28','model_type'=>'App\Models\User','model_id'=>'1'
        // ]);
        // ModuleHasPermission::create([
        //     'permission_id'=>'29','model_type'=>'App\Models\User','model_id'=>'1'
        // ]);
        // ModuleHasPermission::create([
        //     'permission_id'=>'30','model_type'=>'App\Models\User','model_id'=>'1'
        // ]);
        // ModuleHasPermission::create([
        //     'permission_id'=>'37','model_type'=>'App\Models\User','model_id'=>'1'
        // ]);
        // ModuleHasPermission::create([
        //     'permission_id'=>'39','model_type'=>'App\Models\User','model_id'=>'1'
        // ]);
        // ModuleHasPermission::create([
        //     'permission_id'=>'40','model_type'=>'App\Models\User','model_id'=>'1'
        // ]);
        // ModuleHasPermission::create([
        //     'permission_id'=>'41','model_type'=>'App\Models\User','model_id'=>'1'
        // ]);
        // ModuleHasPermission::create([
        //     'permission_id'=>'42','model_type'=>'App\Models\User','model_id'=>'1'
        // ]);
        // ModuleHasPermission::create([
        //     'permission_id'=>'43','model_type'=>'App\Models\User','model_id'=>'1'
        // ]);
        // ModuleHasPermission::create([
        //     'permission_id'=>'44','model_type'=>'App\Models\User','model_id'=>'1'
        // ]);
        // // ModuleHasPermission::create([
        // //     'permission_id'=>'45','model_type'=>'App\Models\User','model_id'=>'1'
        // // ]);
        // // ModuleHasPermission::create([
        // //     'permission_id'=>'46','model_type'=>'App\Models\User','model_id'=>'1'
        // // ]);
        // // ModuleHasPermission::create([
        // //     'permission_id'=>'47','model_type'=>'App\Models\User','model_id'=>'1'
        // // ]);
        // // ModuleHasPermission::create([
        // //     'permission_id'=>'48','model_type'=>'App\Models\User','model_id'=>'1'
        // // ]);
        // // ModuleHasPermission::create([
        // //     'permission_id'=>'49','model_type'=>'App\Models\User','model_id'=>'1'
        // // ]);
        // // ModuleHasPermission::create([
        // //     'permission_id'=>'50','model_type'=>'App\Models\User','model_id'=>'1'
        // // ]);
        // // ModuleHasPermission::create([
        // //     'permission_id'=>'51','model_type'=>'App\Models\User','model_id'=>'1'
        // // ]);
        // // ModuleHasPermission::create([
        // //     'permission_id'=>'52','model_type'=>'App\Models\User','model_id'=>'1'
        // // ]);
        // ModuleHasPermission::create([
        //     'permission_id'=>'53','model_type'=>'App\Models\User','model_id'=>'1'
        // ]);
        // ModuleHasPermission::create([
        //     'permission_id'=>'54','model_type'=>'App\Models\User','model_id'=>'1'
        // ]);
        // ModuleHasPermission::create([
        //     'permission_id'=>'55','model_type'=>'App\Models\User','model_id'=>'1'
        // ]);
        // ModuleHasPermission::create([
        //     'permission_id'=>'56','model_type'=>'App\Models\User','model_id'=>'1'
        // ]);
        // ModuleHasPermission::create([
        //     'permission_id'=>'57','model_type'=>'App\Models\User','model_id'=>'1'
        // ]);
        // ModuleHasPermission::create([
        //     'permission_id'=>'59','model_type'=>'App\Models\User','model_id'=>'1'
        // ]);
        // ModuleHasPermission::create([
        //     'permission_id'=>'60','model_type'=>'App\Models\User','model_id'=>'1'
        // ]);
        // ModuleHasPermission::create([
        //     'permission_id'=>'61','model_type'=>'App\Models\User','model_id'=>'1'
        // ]);
        // ModuleHasPermission::create([
        //     'permission_id'=>'62','model_type'=>'App\Models\User','model_id'=>'1'
        // ]);
        // ModuleHasPermission::create([
        //     'permission_id'=>'63','model_type'=>'App\Models\User','model_id'=>'1'
        // ]);
        // ModuleHasPermission::create([
        //     'permission_id'=>'64','model_type'=>'App\Models\User','model_id'=>'1'
        // ]);
        // ModuleHasPermission::create([
        //     'permission_id'=>'65','model_type'=>'App\Models\User','model_id'=>'1'
        // ]);
        // ModuleHasPermission::create([
        //     'permission_id'=>'66','model_type'=>'App\Models\User','model_id'=>'1'
        // ]);
        // ModuleHasPermission::create([
        //     'permission_id'=>'67','model_type'=>'App\Models\User','model_id'=>'1'
        // ]);
        // ModuleHasPermission::create([
        //     'permission_id'=>'68','model_type'=>'App\Models\User','model_id'=>'1'
        // ]);
        // ModuleHasPermission::create([
        //     'permission_id'=>'69','model_type'=>'App\Models\User','model_id'=>'1'
        // ]);
        // ModuleHasPermission::create([
        //     'permission_id'=>'70','model_type'=>'App\Models\User','model_id'=>'1'
        // ]);
        // ModuleHasPermission::create([
        //     'permission_id'=>'71','model_type'=>'App\Models\User','model_id'=>'1'
        // ]);
        // ModuleHasPermission::create([
        //     'permission_id'=>'72','model_type'=>'App\Models\User','model_id'=>'1'
        // ]);
        // ModuleHasPermission::create([
        //     'permission_id'=>'73','model_type'=>'App\Models\User','model_id'=>'1'
        // ]);
        // ModuleHasPermission::create([
        //     'permission_id'=>'74','model_type'=>'App\Models\User','model_id'=>'1'
        // ]);
        // ModuleHasPermission::create([
        //     'permission_id'=>'75','model_type'=>'App\Models\User','model_id'=>'1'
        // ]);
        // ModuleHasPermission::create([
        //     'permission_id'=>'76','model_type'=>'App\Models\User','model_id'=>'1'
        // ]);
        // ModuleHasPermission::create([
        //     'permission_id'=>'77','model_type'=>'App\Models\User','model_id'=>'1'
        // ]);
        // ModuleHasPermission::create([
        //     'permission_id'=>'78','model_type'=>'App\Models\User','model_id'=>'1'
        // ]);
        // ModuleHasPermission::create([
        //     'permission_id'=>'79','model_type'=>'App\Models\User','model_id'=>'1'
        // ]);
        // ModuleHasPermission::create([
        //     'permission_id'=>'80','model_type'=>'App\Models\User','model_id'=>'1'
        // ]);
        // ModuleHasPermission::create([
        //     'permission_id'=>'81','model_type'=>'App\Models\User','model_id'=>'1'
        // ]);
        // ModuleHasPermission::create([
        //     'permission_id'=>'82','model_type'=>'App\Models\User','model_id'=>'1'
        // ]);
        // ModuleHasPermission::create([
        //     'permission_id'=>'83','model_type'=>'App\Models\User','model_id'=>'1'
        // ]);
        // ModuleHasPermission::create([
        //     'permission_id'=>'84','model_type'=>'App\Models\User','model_id'=>'1'
        // ]);
        // ModuleHasPermission::create([
        //     'permission_id'=>'85','model_type'=>'App\Models\User','model_id'=>'1'
        // ]);
        // ModuleHasPermission::create([
        //     'permission_id'=>'88','model_type'=>'App\Models\User','model_id'=>'1'
        // ]);
        // ModuleHasPermission::create([
        //     'permission_id'=>'89','model_type'=>'App\Models\User','model_id'=>'1'
        // ]);
        // ModuleHasPermission::create([
        //     'permission_id'=>'90','model_type'=>'App\Models\User','model_id'=>'1'
        // ]);
        // ModuleHasPermission::create([
        //     'permission_id'=>'91','model_type'=>'App\Models\User','model_id'=>'1'
        // ]);
        // ModuleHasPermission::create([
        //     'permission_id'=>'92','model_type'=>'App\Models\User','model_id'=>'1'
        // ]);
        // ModuleHasPermission::create([
        //     'permission_id'=>'93','model_type'=>'App\Models\User','model_id'=>'1'
        // ]);
        // ModuleHasPermission::create([
        //     'permission_id'=>'94','model_type'=>'App\Models\User','model_id'=>'1'
        // ]);
        // ModuleHasPermission::create([
        //     'permission_id'=>'95','model_type'=>'App\Models\User','model_id'=>'1'
        // ]);
        // ModuleHasPermission::create([
        //     'permission_id'=>'96','model_type'=>'App\Models\User','model_id'=>'1'
        // ]);
        // ModuleHasPermission::create([
        //     'permission_id'=>'97','model_type'=>'App\Models\User','model_id'=>'1'
        // ]);
        // ModuleHasPermission::create([
        //     'permission_id'=>'98','model_type'=>'App\Models\User','model_id'=>'1'
        // ]);
        // ModuleHasPermission::create([
        //     'permission_id'=>'99','model_type'=>'App\Models\User','model_id'=>'1'
        // ]);
        // ModuleHasPermission::create([
        //     'permission_id'=>'100','model_type'=>'App\Models\User','model_id'=>'1'
        // ]);
        // ModuleHasPermission::create([
        //     'permission_id'=>'101','model_type'=>'App\Models\User','model_id'=>'1'
        // ]);
        // ModuleHasPermission::create([
        //     'permission_id'=>'102','model_type'=>'App\Models\User','model_id'=>'1'
        // ]);
        // ModuleHasPermission::create([
        //     'permission_id'=>'109','model_type'=>'App\Models\User','model_id'=>'1'
        // ]);
        // ModuleHasPermission::create([
        //     'permission_id'=>'110','model_type'=>'App\Models\User','model_id'=>'1'
        // ]);
        // ModuleHasPermission::create([
        //     'permission_id'=>'111','model_type'=>'App\Models\User','model_id'=>'1'
        // ]);
        // ModuleHasPermission::create([
        //     'permission_id'=>'112','model_type'=>'App\Models\User','model_id'=>'1'
        // ]);
        // ModuleHasPermission::create([
        //     'permission_id'=>'116','model_type'=>'App\Models\User','model_id'=>'1'
        // ]);
        // ModuleHasPermission::create([
        //     'permission_id'=>'117','model_type'=>'App\Models\User','model_id'=>'1'
        // ]);
        // ModuleHasPermission::create([
        //     'permission_id'=>'118','model_type'=>'App\Models\User','model_id'=>'1'
        // ]);
        // ModuleHasPermission::create([
        //     'permission_id'=>'119','model_type'=>'App\Models\User','model_id'=>'1'
        // ]);
        // ModuleHasPermission::create([
        //     'permission_id'=>'121','model_type'=>'App\Models\User','model_id'=>'1'
        // ]);
        // ModuleHasPermission::create([
        //     'permission_id'=>'122','model_type'=>'App\Models\User','model_id'=>'1'
        // ]);
        // ModuleHasPermission::create([
        //     'permission_id'=>'123','model_type'=>'App\Models\User','model_id'=>'1'
        // ]);
        // ModuleHasPermission::create([
        //     'permission_id'=>'124','model_type'=>'App\Models\User','model_id'=>'1'
        // ]);
        // ModuleHasPermission::create([
        //     'permission_id'=>'125','model_type'=>'App\Models\User','model_id'=>'1'
        // ]);
        // ModuleHasPermission::create([
        //     'permission_id'=>'126','model_type'=>'App\Models\User','model_id'=>'1'
        // ]);
        // ModuleHasPermission::create([
        //     'permission_id'=>'127','model_type'=>'App\Models\User','model_id'=>'1'
        // ]);
        // ModuleHasPermission::create([
        //     'permission_id'=>'128','model_type'=>'App\Models\User','model_id'=>'1'
        // ]);
        // ModuleHasPermission::create([
        //     'permission_id'=>'129','model_type'=>'App\Models\User','model_id'=>'1'
        // ]);
        // ModuleHasPermission::create([
        //     'permission_id'=>'130','model_type'=>'App\Models\User','model_id'=>'1'
        // ]);
        // ModuleHasPermission::create([
        //     'permission_id'=>'131','model_type'=>'App\Models\User','model_id'=>'1'
        // ]);
        // ModuleHasPermission::create([
        //     'permission_id'=>'132','model_type'=>'App\Models\User','model_id'=>'1'
        // ]);
        // ModuleHasPermission::create([
        //     'permission_id'=>'133','model_type'=>'App\Models\User','model_id'=>'1'
        // ]);
        // ModuleHasPermission::create([
        //     'permission_id'=>'134','model_type'=>'App\Models\User','model_id'=>'1'
        // ]);
        // ModuleHasPermission::create([
        //     'permission_id'=>'135','model_type'=>'App\Models\User','model_id'=>'1'
        // ]);
        // ModuleHasPermission::create([
        //     'permission_id'=>'136','model_type'=>'App\Models\User','model_id'=>'1'
        // ]);
        // ModuleHasPermission::create([
        //     'permission_id'=>'137','model_type'=>'App\Models\User','model_id'=>'1'
        // ]);
        // ModuleHasPermission::create([
        //     'permission_id'=>'138','model_type'=>'App\Models\User','model_id'=>'1'
        // ]);
        // ModuleHasPermission::create([
        //     'permission_id'=>'139','model_type'=>'App\Models\User','model_id'=>'1'
        // ]);
        // ModuleHasPermission::create([
        //     'permission_id'=>'140','model_type'=>'App\Models\User','model_id'=>'1'
        // ]);
        // ModuleHasPermission::create([
        //     'permission_id'=>'141','model_type'=>'App\Models\User','model_id'=>'1'
        // ]);
    }
}



