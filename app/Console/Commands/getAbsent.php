<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use App\Models\WorkSheet;
use DB;
use App\Models\Leaves;
use App\Models\User;
use App\Models\Absence;
use App\Models\Activites;
use App\Models\ActivityUser;
use App\Models\DeductionLimit;

class getAbsent extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'getAbsent';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'get absent with status 1 from fingerprint device to set in mongo absent table';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $day = Carbon::yesterday()->format('D');
        $today = Carbon::now()->format('D');

        $url=request()->getHost();
         $urlrxplode=explode(".",$url);
        $getclient=DB::connection('general')->table('clients')->where('slug',$urlrxplode[0])->first();

        if($day=='Sat'){
            $i=0;
        }
        if($day=='Sun'){
            $i=1;
        }
        if($day=='Mon'){
            $i=2;
        }
        if($day=='Tue'){
            $i=3;
        }
        if($day=='Wed'){
            $i=4;
        }
        if($day=='Thu'){
            $i=5;
        }
        if($day=='Fri'){
            $i=6;
        }
        // today

        if($today=='Sat'){
            $j=0;
        }
        if($today=='Sun'){
            $j=1;
        }
        if($today=='Mon'){
            $j=2;
        }
        if($today=='Tue'){
            $j=3;
        }
        if($today=='Wed'){
            $j=4;
        }
        if($today=='Thu'){
            $j=5;
        }
        if($today=='Fri'){
            $j=6;
        }
        $date = Carbon::yesterday()->format('Y-m-d');
        $today_date = Carbon::now()->format('Y-m-d');
    
        $works = WorkSheet::WhereHas('user',function($query)
        {
            $query->where('deleted_at','=',NULL);
        })->get();

        foreach ($works as $work) {
            $shift_from = json_decode($work->shift_from);
            $shift_to = json_decode($work->shift_to);
            $attendance_type = json_decode($work->attendance_type);
            $attendance = DB::connection('mongodb')->table('attendances')
                ->where('date', 'like', $date . '%')
                ->where('user_id', $work->employee_id)
                ->first();
            $leaves = Leaves::where('user_id', $work->employee_id)
                ->where('period_from', '<=', $date)
                ->where('period_to', '>=', $date)
                ->where("approve_leave_status", '=','Approved')
                ->count();
                $attendance_type=json_decode($work->attendance_type);

            if(($attendance==null) && ($attendance_type[$i] != 5) && ($leaves == 0)){
                    // absent users
               $counter= Absence::where([
                    ['user_id' ,'=', $work->employee_id],
                    ['date' ,'=', $date],
                    ['status' ,'=',1],
                    ['worked_hrs', '=', 0],
                    ['domain','=',$url]
                        ])->count();
                if($counter == 0){
                Absence::create([
                    'user_id' => $work->employee_id,
                    'date' => $date,
                    'status' => 1,
                    'worked_hrs' => 0,
                    'domain'=>$url
                        ]);
                    }



            }elseif(($attendance_type[$j] == 5)){
                    // off users
                $counter= Absence::where([
                    ['user_id' ,'=', $work->employee_id],
                    ['date' ,'=', $today_date],
                    ['status' ,'=',5],
                    ['worked_hrs', '=', 0],
                    ['domain','=',$url]
                        ])->count();
                if($counter == 0){
                Absence::create([
                    'user_id' => $work->employee_id,
                    'date' => $today_date,
                    'status' => 5,
                    'worked_hrs' => 0,
                    'domain'=>$url
                        ]);
                    }


            }
        }

        return Command::SUCCESS;
    }
}
