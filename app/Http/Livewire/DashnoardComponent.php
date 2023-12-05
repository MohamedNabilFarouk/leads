<?php

namespace App\Http\Livewire;

use App\Models\Activites;
use App\Models\Holiday;
use App\Models\Task;
use App\Models\TaskList;
use App\Models\User_performance;
use App\Models\Overtime;
use Carbon\Carbon;
use Livewire\Component;

use App\Models\User;

use App\Models\Leaves;
use App\Models\Company_client;
use App\Models\Project;

use App\Models\Promotion;

use App\Models\Resignation;
use App\Models\Attendance;
use DB;
use App\Models\Absence;
use App\Models\DeductionLimit;

class DashnoardComponent extends Component
{
    public function m(){
        dd(1);
    }

    public $items;
    public $count = 3;
    public function loadMore()
    {
        $this->count += 3;
    }
    public function render()
    {

        $url=request()->getHost();
         $urlrxplode=explode(".",$url);
        $getclient=DB::connection('general')->table('clients')->where('slug',$urlrxplode[0])->first();

        $user_id              = auth()->user()->id;
        $selected_user        = User::where('id',$user_id)->first();
        $user_count         = User::where('deleted_at',null)->count();
        $todayDate            = Carbon::now()->format('m');
        $now_year            = Carbon::now()->format('y');
        $leavesCount          = Leaves::where('period_from','like','%-'.$todayDate.'-%')->orWhere('period_to','like','%-'.$todayDate.'-%')->count();
        $promotionCount       = Promotion::where('promotion_date','like','%-'.$todayDate.'-%')->count();
        $clients       =        Company_client::count();
        $projects       =        Project::count();
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
        $dateYasterday            = \Carbon\Carbon::now()->subDay()->format('Y-m-d');
        // $leavesTodayCount     = Leaves::where('period_from',$dateToday)->orWhere('period_to',$dateToday)->count();
        $leavesTodayCount     = Leaves::where('period_from',$dateToday)->orWhere('period_to',$dateToday)->orWhere(function ($query)use($dateToday)  {
            $query->where('period_from', '<', $dateToday)
                ->where('period_to', '>', $dateToday);
        })->count();
        $attendanceTodayCount = Attendance::where([['domain','=',$url],['date',$dateToday]])->count();
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
        $absent = Absence::where([['domain','=',$url],['date','=',$dateYasterday]])->where('status',1)->get(); //calculate absent yasterday because absentcronjob run after 12 am
        $performance_chart=[];
        $allperformances =User_performance::get()->groupBy('date_performance')->map(function ($row) {
            return (int)($row->sum('total')/$row->count());
        });
        // dd($allperformances);
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


        $allAbsence =Absence::where([['domain','=',$url],['status',1],['date','like','%'.$now_year.'-%']])->orderBy('date','ASC')->get();
        $allAttendance =Attendance::where([['domain','=',$url],['date','like','%'.$now_year.'-%']])->orderBy('date','ASC')->get();
        $result = $allAbsence->groupBy('date')->map(function ($row) {
            return $row->count();
        });
        $resultAttendance = $allAttendance->groupBy('date')->map(function ($row) {
            return $row->count();
        });
        //  dd($result);
        $absenceChart = array();
        $attendanceChart = array();
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
        foreach ($resultAttendance as $date => $value){
            $key = Carbon::parse($date)->format('M');
            //  dd($key);

            if (!isset($attendanceChart[$key])){
                // dd($result[$key]);
                $attendanceChart[$key] = $value;
            } else{

                $attendanceChart[$key]+= $value;
            }
        }
        // rsort($result);

        //   dd($absenceChart);
        $this->items =$absent->toArray();
        $holidays = Holiday::where('date_from', '>=', $dateToday)
        ->orWhere('date_to', '>=', $dateToday)->orderby('date_from','asc')->limit(5)->get();
    $deduction_limits = DeductionLimit::where('status',1)->limit(5)->get();
        $task_count=Task::where('status',1)->count();
        $late_task_count=Task::where('status',0)->count();
        $all_task_count=Task::count();
        $tasks=Task::all();


        // foreach($tasks as $task){
        //    $tasks_dashboard= Task::where('board_status',$task->board_status)->get();

        // }
        $boardCounts = TaskList::withCount('tasks')->get();
// dd($boardCounts);
        return view('livewire.dashnoard-component',['user_count'=>$user_count,
        'selected_user'=>$selected_user,
        'leavesCount'=>$leavesCount,
        'promotionCount'=>$promotionCount,
        'clients'=>$clients,
        'projects'=>$projects,
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
        'itemsToShow' => array_slice($this->items, 0, $this->count),
        'absenceChart'=>$absenceChart,
        'attendanceChart'=>$attendanceChart,
        'performance_chart'=>$performance_chart,
         'holidays'=>$holidays,
          'task_count'=>$task_count,
          'all_task_count'=>$all_task_count,
          'late_task_count'=>$late_task_count,
          'boardCounts'=>$boardCounts,
          'deduction_limits'=>$deduction_limits


        ])->layout('livewire.layouts.base');
    }
}
