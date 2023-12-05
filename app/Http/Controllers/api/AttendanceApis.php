<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\GeneralTrait;
use App\Models\Designations;
use DB;
use App\Models\Attendance;
use App\Models\Absence;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Spatie\Multitenancy\Models\Tenant;

class AttendanceApis extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ["checkin","checkout"]]);
    }

    public function checkin(Request $request)
    {
       // date_default_timezone_set('c')

        $request->validate([
            'employee_id' => 'required'
        ]);
        $company = Tenant::where("domain",$_SERVER['HTTP_HOST'])->first();

        $user =  User::where("employee_id",$request->employee_id)->first();

        if (!$user) {
            return response()->json([
                'status' => 400,
                'message' => "User Not found"
            ],400);
        }
        $dateToCheck = date('Y-m-d');
        if($request->date){
            $dateArr = explode(" ", $request->date);
            $dateToCheck = $dateArr[0];
        }
        $row = Attendance::where("date", $dateToCheck)->where("domain",$_SERVER['HTTP_HOST'])->where("user_id",$user->id)->first();

        if($row){
            return response()->json([
                'status' => 400,
                'message' => "Check-in already submitted"
            ],400);
        }
        $data=["domain"=>$_SERVER['HTTP_HOST'],'check_in' => date('Y-m-d h:i:s a'),'check_out'=>'','date'=>$dateToCheck,'user_id'=>$user->id,'lat'=>(float)$request->lat,'lng'=>(float)$request->lng,'raduis'=>(float)$request->raduis];
        if($request->date){
            $data["check_in"] = $request->date;
        }
        Attendance::create($data);
        return response()->json([
            'status' => 200,
            'message' => "Check-in saved successfully"
        ]);
    }

    public function checkout(Request $request)
    {
        //date_default_timezone_set('Africa/Cairo')

        $request->validate([
            'employee_id' => 'required'
        ]);

        $user =  User::where("employee_id",$request->employee_id)->first();
        $company = Tenant::where("domain",$_SERVER['HTTP_HOST'])->first();

        if (!$user) {
            return response()->json([
                'status' => 400,
                'message' => "User Not found"
            ],400);
        }

        $start_shift_time = $user->shift_from;

        $dateToCheck = date('Y-m-d');
        if($request->date){
            $dateArr = explode(" ", $request->date);
            $dateToCheck = $dateArr[0];
        }

        $row = Attendance::where("user_id",$user->id)->where("domain",$_SERVER['HTTP_HOST'])->where("date",$dateToCheck)->first();
        
        if($row){
            if($request->date){
                $row->check_out = $request->date;
            }else{
                $row->check_out = date('Y-m-d h:i:s a');
            }
            $row->save();

            //Record the absence row, calc workedhrs 
            $startObj = new \DateTime($dateToCheck.' '.$start_shift_time);
            $diffObj = $startObj->diff(new \DateTime($row->check_in));
            $diffInMinutes = $diffObj->i; //Diff in minutes

            $startCheckObj = new \DateTime($row->check_in);
            $checkOutDiff = $startCheckObj->diff(new \DateTime($row->check_out));
            $workedHrs = $diffObj->h; //Diff in hrs
            if($diffInMinutes > 15){ // grade period
                //is Late  
                Absence::create(["user_id"=> $user->id,
                    "domain" => $_SERVER['HTTP_HOST'],
                    "date" => $dateToCheck,
                    "status" => 2,
                    "worked_hrs" => $workedHrs
                ]);
            }
            else if($workedHrs < 8){
                //Early leave
                Absence::create([
                    "user_id"=> $user->id,
                    "domain" => $_SERVER['HTTP_HOST'],
                    "date"=>$dateToCheck,
                    "status"=> 4,
                    "worked_hrs"=>$workedHrs
                ]);
            }
            
            return response()->json([
                'status' => 200,
                'message' => "Check-in saved successfully"
            ]);
        }else{
            return response()->json([
                'status' => 400,
                'message' => "You have to check-in first"
            ],400);
        }

    }

    public function attendacePage(){
        $user =  Auth::guard('api')->user();
        //date_default_timezone_set('Africa/Cairo')

        if (auth()->check() == false) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $row = Attendance::where("user_id",$user->id)->where("domain",$_SERVER['HTTP_HOST'])->where("date",date('Y-m-d'))->first();
        $workedHrs =0;
        if(@$row->check_in){
            $startCheckObj = new \DateTime($row->check_in);
            if(@$row->check_out){
                $checkOutDiff = $startCheckObj->diff(new \DateTime($row->check_out));

            }else{
                $checkOutDiff = $startCheckObj->diff(new \DateTime(date('Y-m-d h:i:s a')));

            }
            $workedHrs = $checkOutDiff->h; //Diff in hrs
        }


        
        return response()->json([
            'status' => 200,
            'data' => $user,
            'checkIn' => @$row->check_in,
            'checkOut' => @$row->check_out,
            'todayHrs' => $workedHrs,
            'weekHrs' => 20,
            'monthHrs' => 160,
            'remaining' => 0,
            'overtime' => 0
        ]);
    }

}
