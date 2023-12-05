<?php

namespace Database\Seeders;

use App\Models\RoleHasPermission;
use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = Permission::all();

        foreach($permissions as $p){
            RoleHasPermission::create([
                'permission_id'=>$p->id,'role_id'=>'1'
        ]);
      }


    for($i=13; $i<=22; $i++){
        RoleHasPermission::create([
                        'permission_id'=>$i,'role_id'=>1
                ]);
      }





//         RoleHasPermission::create([
//             'permission_id'=>'28','role_id'=>'1'
//         ]);
//         RoleHasPermission::create([
//             'permission_id'=>'29','role_id'=>'1'
//         ]);
//         RoleHasPermission::create([
//             'permission_id'=>'30','role_id'=>'1'
//         ]);
//         RoleHasPermission::create([
//             'permission_id'=>'37','role_id'=>'1'
//         ]);
//         RoleHasPermission::create([
//             'permission_id'=>'39','role_id'=>'1'
//         ]);
//         RoleHasPermission::create([
//             'permission_id'=>'40','role_id'=>'1'
//         ]);
//         RoleHasPermission::create([
//             'permission_id'=>'41','role_id'=>'1'
//         ]);
//         RoleHasPermission::create([
//             'permission_id'=>'42','role_id'=>'1'
//         ]);
//         RoleHasPermission::create([
//             'permission_id'=>'43','role_id'=>'1'
//         ]);
//         RoleHasPermission::create([
//             'permission_id'=>'44','role_id'=>'1'
//         ]);
//         // RoleHasPermission::create([
//         //     'permission_id'=>'45','role_id'=>'1'
//         // ]);
//         // RoleHasPermission::create([
//         //     'permission_id'=>'46','role_id'=>'1'
//         // ]);
//         // RoleHasPermission::create([
//         //     'permission_id'=>'47','role_id'=>'1'
//         // ]);
//         // RoleHasPermission::create([
//         //     'permission_id'=>'48','role_id'=>'1'
//         // ]);
//         // RoleHasPermission::create([
//         //     'permission_id'=>'49','role_id'=>'1'
//         // ]);
//         // RoleHasPermission::create([
//         //     'permission_id'=>'50','role_id'=>'1'
//         // ]);
//         // RoleHasPermission::create([
//         //     'permission_id'=>'51','role_id'=>'1'
//         // ]);
//         // RoleHasPermission::create([
//         //     'permission_id'=>'52','role_id'=>'1'
//         // ]);
//         RoleHasPermission::create([
//             'permission_id'=>'53','role_id'=>'1'
//         ]);
//         RoleHasPermission::create([
//             'permission_id'=>'54','role_id'=>'1'
//         ]);
//         RoleHasPermission::create([
//             'permission_id'=>'55','role_id'=>'1'
//         ]);
//         RoleHasPermission::create([
//             'permission_id'=>'56','role_id'=>'1'
//         ]);
//         RoleHasPermission::create([
//             'permission_id'=>'57','role_id'=>'1'
//         ]);
// //        RoleHasPermission::create([
// //            'permission_id'=>'58','role_id'=>'1'
// //        ]);
//         RoleHasPermission::create([
//             'permission_id'=>'59','role_id'=>'1'
//         ]);
//         RoleHasPermission::create([
//             'permission_id'=>'60','role_id'=>'1'
//         ]);
//         RoleHasPermission::create([
//             'permission_id'=>'61','role_id'=>'1'
//         ]);
//         RoleHasPermission::create([
//             'permission_id'=>'62','role_id'=>'1'
//         ]);
//         RoleHasPermission::create([
//             'permission_id'=>'63','role_id'=>'1'
//         ]);
//         RoleHasPermission::create([
//             'permission_id'=>'64','role_id'=>'1'
//         ]);
//         RoleHasPermission::create([
//             'permission_id'=>'65','role_id'=>'1'
//         ]);
//         RoleHasPermission::create([
//             'permission_id'=>'66','role_id'=>'1'
//         ]);
//         RoleHasPermission::create([
//             'permission_id'=>'67','role_id'=>'1'
//         ]);
//         RoleHasPermission::create([
//             'permission_id'=>'68','role_id'=>'1'
//         ]);
//         RoleHasPermission::create([
//             'permission_id'=>'69','role_id'=>'1'
//         ]);
//         RoleHasPermission::create([
//             'permission_id'=>'70','role_id'=>'1'
//         ]);
//         RoleHasPermission::create([
//             'permission_id'=>'71','role_id'=>'1'
//         ]);
//         RoleHasPermission::create([
//             'permission_id'=>'72','role_id'=>'1'
//         ]);
//         RoleHasPermission::create([
//             'permission_id'=>'73','role_id'=>'1'
//         ]);
//         RoleHasPermission::create([
//             'permission_id'=>'74','role_id'=>'1'
//         ]);
//         RoleHasPermission::create([
//             'permission_id'=>'75','role_id'=>'1'
//         ]);
//         RoleHasPermission::create([
//             'permission_id'=>'76','role_id'=>'1'
//         ]);
//         RoleHasPermission::create([
//             'permission_id'=>'77','role_id'=>'1'
//         ]);
//         RoleHasPermission::create([
//             'permission_id'=>'78','role_id'=>'1'
//         ]);
//         RoleHasPermission::create([
//             'permission_id'=>'79','role_id'=>'1'
//         ]);
//         RoleHasPermission::create([
//             'permission_id'=>'80','role_id'=>'1'
//         ]);
//         RoleHasPermission::create([
//             'permission_id'=>'81','role_id'=>'1'
//         ]);
//         RoleHasPermission::create([
//             'permission_id'=>'82','role_id'=>'1'
//         ]);
//         RoleHasPermission::create([
//             'permission_id'=>'83','role_id'=>'1'
//         ]);
//         RoleHasPermission::create([
//             'permission_id'=>'84','role_id'=>'1'
//         ]);
//         RoleHasPermission::create([
//             'permission_id'=>'85','role_id'=>'1'
//         ]);
//         RoleHasPermission::create([
//             'permission_id'=>'86','role_id'=>'1'
//         ]);
//         RoleHasPermission::create([
//             'permission_id'=>'89','role_id'=>'1'
//         ]);
//         RoleHasPermission::create([
//             'permission_id'=>'90','role_id'=>'1'
//         ]);
//         RoleHasPermission::create([
//             'permission_id'=>'91','role_id'=>'1'
//         ]);
//         RoleHasPermission::create([
//             'permission_id'=>'92','role_id'=>'1'
//         ]);
//         RoleHasPermission::create([
//             'permission_id'=>'93','role_id'=>'1'
//         ]);
//         RoleHasPermission::create([
//             'permission_id'=>'94','role_id'=>'1'
//         ]);
//         RoleHasPermission::create([
//             'permission_id'=>'95','role_id'=>'1'
//         ]);
//         RoleHasPermission::create([
//             'permission_id'=>'96','role_id'=>'1'
//         ]);
//         RoleHasPermission::create([
//             'permission_id'=>'97','role_id'=>'1'
//         ]);
//         RoleHasPermission::create([
//             'permission_id'=>'98','role_id'=>'1'
//         ]);
//         RoleHasPermission::create([
//             'permission_id'=>'99','role_id'=>'1'
//         ]);
//         RoleHasPermission::create([
//             'permission_id'=>'100','role_id'=>'1'
//         ]);
//         RoleHasPermission::create([
//             'permission_id'=>'101','role_id'=>'1'
//         ]);
//         RoleHasPermission::create([
//             'permission_id'=>'102','role_id'=>'1'
//         ]);
//         RoleHasPermission::create([
//             'permission_id'=>'109','role_id'=>'1'
//         ]);
//         RoleHasPermission::create([
//             'permission_id'=>'110','role_id'=>'1'
//         ]);
//         RoleHasPermission::create([
//             'permission_id'=>'111','role_id'=>'1'
//         ]);
//         RoleHasPermission::create([
//             'permission_id'=>'112','role_id'=>'1'
//         ]);
//         RoleHasPermission::create([
//             'permission_id'=>'116','role_id'=>'1'
//         ]);
//         RoleHasPermission::create([
//             'permission_id'=>'117','role_id'=>'1'
//         ]);
//         RoleHasPermission::create([
//             'permission_id'=>'118','role_id'=>'1'
//         ]);
//         RoleHasPermission::create([
//             'permission_id'=>'119','role_id'=>'1'
//         ]);
//         RoleHasPermission::create([
//             'permission_id'=>'121','role_id'=>'1'
//         ]);
//         RoleHasPermission::create([
//             'permission_id'=>'122','role_id'=>'1'
//         ]);
//         RoleHasPermission::create([
//             'permission_id'=>'123','role_id'=>'1'
//         ]);
//         RoleHasPermission::create([
//             'permission_id'=>'124','role_id'=>'1'
//         ]);
//         RoleHasPermission::create([
//             'permission_id'=>'125','role_id'=>'1'
//         ]);
//         RoleHasPermission::create([
//             'permission_id'=>'126
//             ','role_id'=>'1'
//         ]);
//         RoleHasPermission::create([
//             'permission_id'=>'127','role_id'=>'1'
//         ]);
//         RoleHasPermission::create([
//             'permission_id'=>'128','role_id'=>'1'
//         ]);
//         RoleHasPermission::create([
//             'permission_id'=>'129','role_id'=>'1'
//         ]);
//         RoleHasPermission::create([
//             'permission_id'=>'130','role_id'=>'1'
//         ]);
//         RoleHasPermission::create([
//             'permission_id'=>'131','role_id'=>'1'
//         ]);
//         RoleHasPermission::create([
//             'permission_id'=>'132','role_id'=>'1'
//         ]);
// //        RoleHasPermission::create([
// //            'permission_id'=>'133','role_id'=>'1'
// ////        ]);
//         RoleHasPermission::create([
//             'permission_id'=>'134','role_id'=>'1'
//         ]);
//         RoleHasPermission::create([
//             'permission_id'=>'135','role_id'=>'1'
//         ]);
//         RoleHasPermission::create([
//             'permission_id'=>'136','role_id'=>'1'
//         ]);
//         RoleHasPermission::create([
//             'permission_id'=>'137','role_id'=>'1'
//         ]);
//         RoleHasPermission::create([
//             'permission_id'=>'138','role_id'=>'1'
//         ]);

//         RoleHasPermission::create([
//             'permission_id'=>'139','role_id'=>'1'
//         ]);
//         RoleHasPermission::create([
//             'permission_id'=>'140','role_id'=>'1'
//         ]);
//         RoleHasPermission::create([
//             'permission_id'=>'141','role_id'=>'1'
//         ]);
//         RoleHasPermission::create([
//         'permission_id'=>'142','role_id'=>'1'
//             ]);
    }
}
