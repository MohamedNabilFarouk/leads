<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\SubscriptionPlan;
use App\Models\SubModule;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
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

         $subModules = SubModule::whereIn('module_id',$modulesArr)->get();
            // $modules = Module::whereIn('id', $modulesArr)->where('sub_module')->get();
// dd($subModules);
    //   $permissions=  DB::connection('general')->table('permissions')->get();

      foreach($subModules as $p){

        $resStr =  strtolower($p->name);

        $replacestr= str_replace(" ","-",$resStr);
            Permission::create([
                        'name'=>$replacestr.'-read',
                        'guard_name'=>'web'
                    ]);
            Permission::create([
                        'name'=>$replacestr.'-create',
                        'guard_name'=>'web'
                    ]);
            Permission::create([
                        'name'=>$replacestr.'-write',
                        'guard_name'=>'web'
                    ]);
            Permission::create([
                        'name'=>$replacestr.'-delete',
                        'guard_name'=>'web'
                    ]);
      }
        Permission::create([
           'name'=>'roles-&-permissions-read','guard_name'=>'web'

        ]);
        Permission::create([
          'name'=>'roles-&-permissions-write','guard_name'=>'web'
        ]);
        Permission::create([
           'name'=>'roles-&-permissions-create','guard_name'=>'web'
        ]);
        Permission::create([
          'name'=>'roles-&-permissions-delete','guard_name'=>'web'
        ]);

        Permission::create([
          'name'=>'change-password-read','guard_name'=>'web'
        ]);

         Permission::create([
           'name'=>'activities-read','guard_name'=>'web'
        ]);
         Permission::create([
        'name'=>'employee-profile-read','guard_name'=>'web'
        ]);
        Permission::create([
          'name'=>'employee-profile-write','guard_name'=>'web'
        ]);
        Permission::create([
          'name'=>'employee-profile-create','guard_name'=>'web'
        ]);
        Permission::create([
           'name'=>'employee-profile-delete','guard_name'=>'web'
        ]);

        // Permission::create([
        //     'id'=>'28',
        //     'name'=>'admin-dashboard-read',
        //     'guard_name'=>'web'
        // ]);
        // Permission::create([
        //     'id'=>'29',
        //     'name'=>'employee-dashboard-read',
        //     'guard_name'=>'web'
        // ]);
        // Permission::create([
        //     'id'=>'30',
        //     'name'=>'all-employees-read',
        //     'guard_name'=>'web'
        // ]);
        // Permission::create([
        //     'id'=>'36',
        //     'name'=>'holidays-read',
        //     'guard_name'=>'web'
        // ]);
        // Permission::create([
        //     'id'=>'37',
        //     'name'=>'holidays-write',
        //     'guard_name'=>'web'
        // ]);
        // Permission::create([
        //     'id'=>'39','name'=>'holidays-create','guard_name'=>'web'
        // ]);
        // Permission::create([
        //     'id'=>'40','name'=>'holidays-delete','guard_name'=>'web'
        // ]);
        // Permission::create([
        //     'id'=>'41','name'=>'leaves-(supervisior)-read','guard_name'=>'web'
        // ]);
        // Permission::create([
        //     'id'=>'42','name'=>'leaves-(supervisior)-write','guard_name'=>'web'
        // ]);
        // Permission::create([
        //     'id'=>'43','name'=>'leaves-(supervisior)-create','guard_name'=>'web'
        // ]);
        // Permission::create([
        //     'id'=>'44','name'=>'leaves-(supervisior)-delete','guard_name'=>'web'
        // ]);
        // Permission::create([
        //     'id'=>'45','name'=>'leaves-(hr)-read','guard_name'=>'web'
        // ]);
        // Permission::create([
        //     'id'=>'46','name'=>'leaves-(hr)-write','guard_name'=>'web'
        // ]);
        // Permission::create([
        //     'id'=>'47','name'=>'leaves-(hr)-create','guard_name'=>'web'
        // ]);
        // Permission::create([
        //     'id'=>'48','name'=>'leaves-(hr)-delete','guard_name'=>'web'
        // ]);
        // Permission::create([
        //     'id'=>'49','name'=>'leaves-(financial)-read','guard_name'=>'web'
        // ]);
        // Permission::create([
        //     'id'=>'50','name'=>'leaves-(financial)-write','guard_name'=>'web'

        // ]);
        // Permission::create([
        //     'id'=>'51','name'=>'leaves-(financial)-create','guard_name'=>'web'

        // ]);
        // Permission::create([
        //     'id'=>'52','name'=>'leaves-(financial)-delete','guard_name'=>'web'

        // ]);
        // Permission::create([
        //     'id'=>'53','name'=>'leaves-(employee)-read','guard_name'=>'web'

        // ]);
        // Permission::create([
        //     'id'=>'54','name'=>'leaves-(employee)-write','guard_name'=>'web'
        // ]);
        // Permission::create([
        //     'id'=>'55','name'=>'leaves-(employee)-create','guard_name'=>'web'
        // ]);
        // Permission::create([
        //     'id'=>'56','name'=>'leaves-(employee)-delete','guard_name'=>'web'
        // ]);
        // Permission::create([
        //     'id'=>'57','name'=>'leave-settings-read','guard_name'=>'web'
        // ]);
        // Permission::create([
        //     'id'=>'59','name'=>'attendance-(admin)-read','guard_name'=>'web'
        // ]);
        // Permission::create([
        //     'id'=>'60','name'=>'attendance-(employee)-read','guard_name'=>'web'
        // ]);
        // Permission::create([
        //     'id'=>'61','name'=>'departments-read','guard_name'=>'web'
        // ]);
        // Permission::create([
        //     'id'=>'62','name'=>'departments-write','guard_name'=>'web'
        // ]);
        // Permission::create([
        //     'id'=>'63','name'=>'departments-create','guard_name'=>'web'
        // ]);
        // Permission::create([
        //     'id'=>'64','name'=>'departments-delete','guard_name'=>'web'
        // ]);
        // Permission::create([
        //     'id'=>'65','name'=>'designations-read','guard_name'=>'web'
        // ]);
        // Permission::create([
        //     'id'=>'66','name'=>'designations-write','guard_name'=>'web'
        // ]);
        // Permission::create([
        //     'id'=>'67','name'=>'designations-create','guard_name'=>'web'
        // ]);
        // Permission::create([
        //     'id'=>'68','name'=>'designations-delete','guard_name'=>'web'
        // ]);
        // Permission::create([
        //     'id'=>'69','name'=>'overtime-write','guard_name'=>'web'
        // ]);
        // Permission::create([
        //     'id'=>'70','name'=>'overtime-read','guard_name'=>'web'
        // ]);
        // Permission::create([
        //     'id'=>'71','name'=>'overtime-create','guard_name'=>'web'
        // ]);
        // Permission::create([
        //     'id'=>'72','name'=>'overtime-delete','guard_name'=>'web'
        // ]);
        // Permission::create([
        //     'id'=>'73','name'=>'add-performance-create','guard_name'=>'web'
        // ]);
        // Permission::create([
        //     'id'=>'74','name'=>'performance-appraisal-read','guard_name'=>'web'
        // ]);
        // Permission::create([
        //     'id'=>'75','name'=>'performance-(employee)-read','guard_name'=>'web'
        // ]);
        // Permission::create([
        //     'id'=>'76','name'=>'employee-salary-read','guard_name'=>'web'
        // ]);
        // Permission::create([
        //     'id'=>'77','name'=>'employee-salary-write','guard_name'=>'web'
        // ]);
        // Permission::create([
        //     'id'=>'78','name'=>'employee-salary-create','guard_name'=>'web'

        // ]);
        // Permission::create([
        //     'id'=>'79','name'=>'employee-salary-delete','guard_name'=>'web'

        // ]);
        // Permission::create([
        //     'id'=>'80','name'=>'payslip-read','guard_name'=>'web'
        // ]);
        // Permission::create([
        //     'id'=>'81','name'=>'payroll-items-read','guard_name'=>'web'
        // ]);
        // Permission::create([
        //     'id'=>'82','name'=>'payroll-items-write','guard_name'=>'web'
        // ]);
        // Permission::create([
        //     'id'=>'83','name'=>'payroll-items-create','guard_name'=>'web'
        // ]);
        // Permission::create([
        //     'id'=>'84','name'=>'payroll-items-delete','guard_name'=>'web'
        // ]);
        // Permission::create([
        //     'id'=>'85','name'=>'promotion-read','guard_name'=>'web'
        // ]);
        // Permission::create([
        //     'id'=>'86','name'=>'promotion-write','guard_name'=>'web'
        // ]);
        // Permission::create([
        //     'id'=>'88','name'=>'promotion-create','guard_name'=>'web'
        // ]);
        // Permission::create([
        //     'id'=>'89','name'=>'promotion-delete','guard_name'=>'web'

        // ]);
        // Permission::create([
        //     'id'=>'90','name'=>'resignation-read','guard_name'=>'web'
        // ]);
        // Permission::create([
        //     'id'=>'91','name'=>'resignation-write','guard_name'=>'web'
        // ]);
        // Permission::create([
        //     'id'=>'92','name'=>'resignation-create','guard_name'=>'web'
        // ]);
        // Permission::create([
        //     'id'=>'93','name'=>'resignation-delete','guard_name'=>'web'
        // ]);
        // Permission::create([
        //     'id'=>'94','name'=>'termination-read','guard_name'=>'web'
        // ]);
        // Permission::create([
        //     'id'=>'95','name'=>'termination-write','guard_name'=>'web'
        // ]);
        // Permission::create([
        //     'id'=>'96','name'=>'termination-create','guard_name'=>'web'
        // ]);
        // Permission::create([
        //     'id'=>'97','name'=>'termination-delete','guard_name'=>'web'
        // ]);
        // Permission::create([
        //     'id'=>'98','name'=>'activities-read','guard_name'=>'web'
        // ]);
        // Permission::create([
        //     'id'=>'99','name'=>'users-read','guard_name'=>'web'
        // ]);
        // Permission::create([
        //     'id'=>'100','name'=>'users-write','guard_name'=>'web'
        // ]);
        // Permission::create([
        //     'id'=>'101','name'=>'users-create','guard_name'=>'web'
        // ]);
        // Permission::create([
        //     'id'=>'102','name'=>'users-delete','guard_name'=>'web'
        // ]);
        // Permission::create([
        //     'id'=>'103','name'=>'company-settings-read','guard_name'=>'web'
        // ]);
        // Permission::create([
        //     'id'=>'104','name'=>'company-settings-write','guard_name'=>'web'
        // ]);
        // Permission::create([
        //     'id'=>'105','name'=>'localization-read','guard_name'=>'web'
        // ]);
        // Permission::create([
        //     'id'=>'106','name'=>'localization-write','guard_name'=>'web'
        // ]);
        // Permission::create([
        //     'id'=>'107','name'=>'theme-settings-read','guard_name'=>'web'
        // ]);
        // Permission::create([
        //     'id'=>'108','name'=>'theme-settings-write','guard_name'=>'web'
        // ]);
        // Permission::create([
        //     'id'=>'109','name'=>'roles-&-permissions-read','guard_name'=>'web'

        // ]);
        // Permission::create([
        //     'id'=>'110','name'=>'roles-&-permissions-write','guard_name'=>'web'
        // ]);
        // Permission::create([
        //     'id'=>'111','name'=>'roles-&-permissions-create','guard_name'=>'web'
        // ]);
        // Permission::create([
        //     'id'=>'112','name'=>'roles-&-permissions-delete','guard_name'=>'web'
        // ]);
        // Permission::create([
        //     'id'=>'113','name'=>'salary-settings-read','guard_name'=>'web'
        // ]);
        // Permission::create([
        //     'id'=>'114','name'=>'salary-settings-write','guard_name'=>'web'
        // ]);
        // Permission::create([
        //     'id'=>'115','name'=>'notifications-read','guard_name'=>'web'
        // ]);
        // Permission::create([
        //     'id'=>'116','name'=>'change-password-read','guard_name'=>'web'
        // ]);
        // Permission::create([
        //     'id'=>'117','name'=>'change-password-write','guard_name'=>'web'
        // ]);
        // Permission::create([
        //     'id'=>'118','name'=>'leave-type-read','guard_name'=>'web'
        // ]);
        // Permission::create([
        //     'id'=>'119','name'=>'leave-type-write','guard_name'=>'web'
        // ]);
        // Permission::create([
        //     'id'=>'122','name'=>'leave-type-delete','guard_name'=>'web'
        // ]);
        // Permission::create([
        //     'id'=>'121','name'=>'leave-type-create','guard_name'=>'web'
        // ]);
        // Permission::create([
        //     'id'=>'123','name'=>'employee-profile-read','guard_name'=>'web'
        // ]);
        // Permission::create([
        //     'id'=>'124','name'=>'employee-profile-write','guard_name'=>'web'
        // ]);
        // Permission::create([
        //     'id'=>'125','name'=>'employee-profile-create','guard_name'=>'web'
        // ]);
        // Permission::create([
        //     'id'=>'126','name'=>'employee-profile-delete','guard_name'=>'web'
        // ]);
        // Permission::create([
        //     'id'=>'127','name'=>'all-employees-write','guard_name'=>'web'
        // ]);
        // Permission::create([
        //     'id'=>'128','name'=>'all-employees-create','guard_name'=>'web'
        // ]);
        // Permission::create([
        //     'id'=>'129','name'=>'all-employees-delete','guard_name'=>'web'
        // ]);
        // Permission::create([
        //     'id'=>'130','name'=>'overtime-(supervisor)-write','guard_name'=>'web'
        // ]);
        // Permission::create([
        //     'id'=>'131','name'=>'overtime-(supervisor)-read','guard_name'=>'web'
        // ]);
        // Permission::create([
        //     'id'=>'132','name'=>'overtime-(supervisor)-create','guard_name'=>'web'
        // ]);
        // Permission::create([
        //     'id'=>'134','name'=>'leave-settings-delete','guard_name'=>'web'
        // ]);
        // Permission::create([
        //     'id'=>'135','name'=>'leave-settings-write','guard_name'=>'web'
        // ]);
        // Permission::create([
        //     'id'=>'136','name'=>'leaves-(supervisior)-approve','guard_name'=>'web'
        // ]);
        // Permission::create([
        //     'id'=>'137','name'=>'leaves-(hr)-approve','guard_name'=>'web'
        // ]);
        // Permission::create([
        //     'id'=>'138','name'=>'leaves-(financial)-approve','guard_name'=>'web'
        // ]);
        // Permission::create([
        //     'id'=>'139','name'=>'overtime-(supervisor)-approve','guard_name'=>'web'
        // ]);
        // Permission::create([
        //     'id'=>'140','name'=>'resignation-approve','guard_name'=>'web'
        // ]);
        // Permission::create([
        //     'id'=>'141','name'=>'termination-approve','guard_name'=>'web'
        // ]);
        // Permission::create([
        //     'id'=>'142','name'=>'work-sheet-read','guard_name'=>'web'
        // ]);
        // Permission::create([
        //     'id'=>'183','name'=>'work-sheet-write','guard_name'=>'web'
        // ]);
        // Permission::create([
        //     'id'=>'143','name'=>'loan-read','guard_name'=>'web'
        // ]);
        // Permission::create([
        //     'id'=>'144','name'=>'loan-write','guard_name'=>'web'
        // ]);

        // Permission::create([
        //     'id'=>'145','name'=>'projects-read','guard_name'=>'web'
        // ]);
        // Permission::create([
        //     'id'=>'146','name'=>'projects-write','guard_name'=>'web'
        // ]);
        // Permission::create([
        //     'id'=>'147','name'=>'projects-delete','guard_name'=>'web'
        // ]);
        // Permission::create([
        //     'id'=>'148','name'=>'projects-approve','guard_name'=>'web'
        // ]);

        // Permission::create([
        //     'id'=>'149','name'=>'assets-read','guard_name'=>'web'
        // ]);
        // Permission::create([
        //     'id'=>'150','name'=>'assets-write','guard_name'=>'web'
        // ]);
        // Permission::create([
        //     'id'=>'151','name'=>'assets-delete','guard_name'=>'web'
        // ]);
        // Permission::create([
        //     'id'=>'152','name'=>'assets-approve','guard_name'=>'web'
        // ]);









    }
}
