<?php
namespace App\Http\Livewire;

use App\Models\Activites;
use App\Models\Holiday;
use App\Models\User_performance;
use App\Models\Overtime;
use Carbon\Carbon;
use Livewire\Component;

use App\Models\User;
use App\Models\Client;
use App\Models\UserSubscriber;

use App\Models\Leaves;

use App\Models\Promotion;

use App\Models\Resignation;
use App\Models\Attendance;
use DB;
use App\Models\Absence;
class SuperadminDashboardComponent extends Component
{
    public function m(){
        dd(1);
    }

    public function reports(){
        $anneual_revenue = UserSubscriber::whereYear('created_at', '=', Carbon::now()->year)->where('is_paid','1')->get();
        return view('livewire.superadmin-dashboard-report-component',compact('anneual_revenue'))->layout('livewire.layouts.base');
    }


    public function render()
    {

        // $clients                 = Client::count();
        // $anneual_revenue          = UserSubscriber::whereYear('created_at', '=', Carbon::now()->year)->where('is_paid','1')->sum('total');
        // // $near_expire         = UserSubscriber::where('end_date', '>=', Carbon::now()->addDays(30)->format('d-m-Y'))->where('is_paid','1')->get();
        // $today = Carbon::now()->startOfDay();
        // $future_date = Carbon::now()->addDays(30)->endOfDay();
        // $near_expire         = UserSubscriber::whereBetween('end_date', [$today, $future_date])->where('is_paid','1')->get();


        // $active_clients                 = Client::where('active','1')->count();
        // // $nonactive_clients                 =  Client::where('active','0')->count();

        // // $nonactive_clients = Client::whereHas('plan',function ($query) use($today) { //expired client plan
        // //     $query->where('end_date','<', $today);
        // // })->count();
        //  $expired = UserSubscriber::where('end_date','<', $today)->where('is_paid','1')->count();

        // // dd($s);



        // $notVerified_clients                 =  Client::where('email_verified_at',null)->count();

        $user_id              = auth()->user()->id;
        $selected_user        = User::where('id',$user_id)->first();

        // $user                 = user::count();
        // $todayDate            = Carbon::now()->format('m');
        // $now_year            = Carbon::now()->format('y');
        // $leavesCount          = Leaves::where('period_from','like','%-'.$todayDate.'-%')->orWhere('period_to','like','%-'.$todayDate.'-%')->count();
        // $promotionCount       = Promotion::where('promotion_date','like','%-'.$todayDate.'-%')->count();
        // $resignationCount     = Resignation::where('resignation_date','like','%-'.$todayDate.'-%')->count();
        // $newUserCount         = User::where('contract_starting_date','like','%-'.$todayDate.'-%')->count();
        // $date                 = \Carbon\Carbon::now();
        // $lastMonth            =  $date->subMonth()->format('m');
        // $leavesPrevCount      = Leaves::where('period_from','like','%-'.$lastMonth.'-%')->orWhere('period_to','like','%-'.$lastMonth.'-%')->count();
        // $holidayCount         = Holiday::where('date_from','like','%-'.$todayDate.'-%')->orWhere('date_to','like','%-'.$todayDate.'-%')->count();
        // $holidayPervCount     = Holiday::where('date_from','like','%-'.$lastMonth.'-%')->orWhere('date_to','like','%-'.$lastMonth.'-%')->count();
        // $overtimeCount        = Overtime::where('overtime_date','like','%-'.$todayDate.'-%')->count();
        // $overtimePrevCount    = Overtime::where('overtime_date','like','%-'.$lastMonth.'-%')->count();
        // $dateToday            = \Carbon\Carbon::now()->format('Y-m-d');
        // $leavesTodayCount     = Leaves::where('period_from',$dateToday)->orWhere('period_to',$dateToday)->count();
        // $attendanceTodayCount = Attendance::where('date',$dateToday)->count();
        // $overtimeTodayCount   = Overtime::where('overtime_date',$dateToday)->count();
        // $activites            =  DB::table('activity_users')
        //                         ->join('activites','activity_users.activity_id','activites.id')
        //                         ->join('users','activity_users.send_id','users.id')
        //                         ->where('activity_users.status',0)
        //                         ->where('activity_users.receive_id',auth()->user()->id)
        //                        ->select('activites.*','users.name','users.photo')
        //                        ->orderby('id','desc')
        //                        ->limit(5)
        //                        ->get();
        // $today = \Carbon\Carbon::now()->format('Y-m-d');
        // $absent = Absence::where('date','=',$today)->where('status',1)->get();
        // $performance_chart=[];
        // $allperformances =User_performance::get()->groupBy('date_performance')->map(function ($row) {
        //     return (int)($row->sum('total')/$row->count());
        // });
        // foreach ($allperformances as $date => $value){
        //      $key = Carbon::parse($date)->format('Y-m');
        //     if (!isset($performance_chart[$key])){
        //         // dd($result[$key]);
        //         $performance_chart[$key] = $value;
        //     } else{

        //         $performance_chart[$key]+= $value;
        //     }
        // }
        // //  dd($performance_chart);

        // $allSales =UserSubscriber::where([['is_paid',1],['created_at','like','%'.$now_year.'-%']])->orderBy('created_at','ASC')->get();
        // $result = $allSales->groupBy('created_at')->map(function ($row) {
        //     return $row->sum('total');
        // });
        // // dd($result);
        // $SalesChart = array();
        // foreach ($result as $date => $value){
        //     $key = Carbon::parse($date)->format('M');
        //     //  dd($key);

        //     if (!isset($SalesChart[$key])){
        //         // dd($result[$key]);
        //         $SalesChart[$key] = $value;
        //     } else{

        //         $SalesChart[$key]+= $value;
        //     }
        // }
        // rsort($result);

        //    dd($absenceChart);

        // $holidays=Holiday::orderby('id','asc')->limit(5)->get();
        return view('livewire.superadmin-dashboard-component',[
        //     'clients'=>$clients,
        //     'active_clients'=>$active_clients,
        //     'near_expire'=>$near_expire,
        //     'expired'=>$expired,
        //     'anneual_revenue'=>$anneual_revenue,
        //     'notVerified_clients'=>$notVerified_clients,
        // 'user'=>$user,
        'selected_user'=>$selected_user,
        // 'leavesCount'=>$leavesCount,
        // 'promotionCount'=>$promotionCount,
        // 'resignationCount'=>$resignationCount,
        // 'newUserCount'=>$newUserCount,
        // 'leavesPrevCount'=>$leavesPrevCount,
        // 'holidayCount'=>$holidayCount,
        // 'holidayPervCount'=>$holidayPervCount,
        // 'overtimeCount'=>$overtimeCount,
        // 'overtimePrevCount'=>$overtimePrevCount,
        // 'leavesTodayCount'=>$leavesTodayCount,
        // 'attendanceTodayCount'=>$attendanceTodayCount,
        // 'overtimeTodayCount'=>$overtimeTodayCount,
        // 'activites'=>$activites,
        // 'absent'=>$absent,
        // 'SalesChart'=>$SalesChart,
        // 'performance_chart'=>$performance_chart,
        //  'holidays'=>$holidays

        ])->layout('livewire.layouts.base');
    }
}










