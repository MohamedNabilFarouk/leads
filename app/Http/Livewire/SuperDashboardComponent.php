<?php

namespace App\Http\Livewire;

use App\Models\Activites;
use App\Models\Holiday;
use App\Models\User_performance;
use App\Models\Overtime;
use Carbon\Carbon;
use Livewire\Component;

use App\Models\User;

use App\Models\Leaves;

use App\Models\Promotion;

use App\Models\Resignation;
use App\Models\Attendance;
use DB;
use App\Models\Absence;
class SuperDashboardComponent extends Component
{
    public function m(){
        dd(1);
    }
    public function render()
    {
        $user_id              = auth()->user()->id;
        $selected_user        = User::where('id',$user_id)->first();
        $user                 = User::count();
        $todayDate            = Carbon::now()->format('m');
        $now_year            = Carbon::now()->format('y');
        $leavesCount          = Leaves::where('period_from','like','%-'.$todayDate.'-%')->orWhere('period_to','like','%-'.$todayDate.'-%')->count();
        $promotionCount       = Promotion::where('promotion_date','like','%-'.$todayDate.'-%')->count();
        $resignationCount     = Resignation::where('resignation_date','like','%-'.$todayDate.'-%')->count();
        $newUserCount         = User::where('contract_starting_date','like','%-'.$todayDate.'-%')->count();
        $date                 = \Carbon\Carbon::now();
        $lastMonth            =  $date->subMonth()->format('m');
        $leavesPrevCount      = Leaves::where('period_from','like','%-'.$lastMonth.'-%')->orWhere('period_to','like','%-'.$lastMonth.'-%')->count();
        $holidayCount         = Holiday::where('date_from','like','%-'.$todayDate.'-%')->orWhere('date_to','like','%-'.$todayDate.'-%')->count();
        $holidayPervCount     = Holiday::where('date_from','like','%-'.$lastMonth.'-%')->orWhere('date_to','like','%-'.$lastMonth.'-%')->count();
        $overtimeCount        = Overtime::where('overtime_date','like','%-'.$todayDate.'-%')->count();
        $overtimePrevCount    = Overtime::where('overtime_date','like','%-'.$lastMonth.'-%')->count();
        $dateToday            = \Carbon\Carbon::now()->format('Y-m-d');
        $leavesTodayCount     = Leaves::where('period_from',$dateToday)->orWhere('period_to',$dateToday)->count();
        $attendanceTodayCount = Attendance::where('date',$dateToday)->count();
        $overtimeTodayCount   = Overtime::where('overtime_date',$dateToday)->count();
        $activites            =  DB::table('activity_users')
                                ->join('activites','activity_users.activity_id','activites.id')
                                ->join('users','activity_users.send_id','users.id')
                                ->where('activity_users.status',0)
                                ->where('activity_users.receive_id',auth()->user()->id)
                               ->select('activites.*','users.name','users.photo')
                               ->orderby('id','desc')
                               ->limit(5)
                               ->get();
        $today = \Carbon\Carbon::now()->format('Y-m-d');
        $absent = Absence::where('date','=',$today)->where('status',1)->get();
        $performance_chart=[];
        $allperformances =User_performance::get()->groupBy('date_performance')->map(function ($row) {
            return (int)($row->sum('total')/$row->count());
        });
        foreach ($allperformances as $date => $value){
             $key = Carbon::parse($date)->format('Y-m');
            if (!isset($performance_chart[$key])){
                // dd($result[$key]);
                $performance_chart[$key] = $value;
            } else{

                $performance_chart[$key]+= $value;
            }
        }
        //  dd($performance_chart);

        $allAbsence =Absence::where([['status',1],['date','like','%'.$now_year.'-%']])->orderBy('date','ASC')->get();
        $result = $allAbsence->groupBy('date')->map(function ($row) {
            return $row->count();
        });
        $absenceChart = array();
        foreach ($result as $date => $value){
            $key = Carbon::parse($date)->format('M');
            //  dd($key);

            if (!isset($absenceChart[$key])){
                // dd($result[$key]);
                $absenceChart[$key] = $value;
            } else{

                $absenceChart[$key]+= $value;
            }
        }
        // rsort($result);

        //   dd($absenceChart);

        $holidays=Holiday::orderby('id','asc')->limit(5)->get();
        return view('livewire.dashnoard-component',['user'=>$user,
        'selected_user'=>$selected_user,
        'leavesCount'=>$leavesCount,
        'promotionCount'=>$promotionCount,
        'resignationCount'=>$resignationCount,
        'newUserCount'=>$newUserCount,
        'leavesPrevCount'=>$leavesPrevCount,
        'holidayCount'=>$holidayCount,
        'holidayPervCount'=>$holidayPervCount,
        'overtimeCount'=>$overtimeCount,
        'overtimePrevCount'=>$overtimePrevCount,
        'leavesTodayCount'=>$leavesTodayCount,
        'attendanceTodayCount'=>$attendanceTodayCount,
        'overtimeTodayCount'=>$overtimeTodayCount,
        'activites'=>$activites,
        'absent'=>$absent,
        'absenceChart'=>$absenceChart,
        'performance_chart'=>$performance_chart,
         'holidays'=>$holidays

        ])->layout('livewire.layouts.base');
    }
}

