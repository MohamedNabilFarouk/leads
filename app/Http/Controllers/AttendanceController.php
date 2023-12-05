<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\Lib\ZktecoLib;
use \App\Lib\ZKLibrary;
use App\Models\Attendance;
use App\Models\Absence;
use DB;
use Spatie\Multitenancy\Models\Tenant;


class AttendanceController extends Controller
{
    public function store(Request $request)
  {
      $data = $request->only('employee_code','time','date');
      $test['attenance'] = json_encode($data);



      Attendance::create(['id' => 1, 'check_in' => '2022-12-21 10:15:29','check_out'=>'2022-12-21 20:15:29','date'=>'2022-12-21 20:15:29','user_id'=>1.,'domain'=>'alefsoftware.hr-saas.alefsoftware.com']);

      return response()
      ->json(['messsage' => 'ok']);
      }



      public function test(){
        exec("sh /app/fingerprints.sh 2>&1", $output, $return_var);
        $domain="alefsoftware.hr-saas.alefsoftware.com";
        $tenant=DB::connection('landlord')->table('tenants')->where('domain',$domain)->first();

       $t=Tenant::where('domain',$tenant->domain)->first();

       $t->makeCurrent();

        $users = \App\Models\User::where("use_fingerPrint",1)->whereNotNull("employee_id")->get();
        foreach($users as $user){
          $m_array = preg_grep('/^(.*),'.$user->employee_id.',(.*)/', $output);
          foreach($m_array as $currentElement){
            if($currentElement){
              $rowArr = explode(",",$currentElement);

              $uid     = $rowArr[0];
              $user_id = $rowArr[1];
              $time    = $rowArr[2];
              $puch    = $rowArr[4];
// dd($puch);
              $date1= \DateTime::createFromFormat('Y-m-d H:i:s',  $time);
              $today= \DateTime::createFromFormat('Y-m-d H:i:s', date('Y-m-d H:i:s'));
              try {
                //             dd($rowArr);

                if($date1->format('Y-m-d') == $today->format('Y-m-d')){
                  // if(1==1){
                  if(($puch == "0") || ($puch == "4") ){
                    $row = Attendance::where("date", $date1->format('Y-m-d'))->where("user_id",$user->id)->first();
                    if(!$row){
                      echo "here4";

                      $data=['check_in' => $time,'check_out'=>'','date'=>$date1->format('Y-m-d'),'user_id'=>$user->id,'domain'=>$t->domain];
                      Attendance::create($data);
                    }
                  }else{
                    $row = Attendance::where("user_id",$user->id)->latest("created_at")->first();
                    if($row){

                      if(!$row->check_out){
                        $row->check_out = $time;
                        $row->save();

                        $start_shift_time = $user->shift_from;
                        $startObj = new \DateTime($date1->format('Y-m-d').' '.$start_shift_time);
                        $diffObj = $startObj->diff(new \DateTime($row->check_in));
                        $diffInMinutes = $diffObj->i; //Diff in minutes

                        $startCheckObj = new \DateTime($row->check_in);
                        $checkOutDiff = $startCheckObj->diff(new \DateTime($row->check_out));
                        $workedHrs = $diffObj->h; //Diff in hrs
                        if($diffInMinutes > 15){ // grade period
                            //is Late
                            Absence::create(["user_id"=> $user->id,
                                "date" => $date1->format('Y-m-d'),
                                "status" => 2,
                                "worked_hrs" => $workedHrs
                            ]);
                        }
                        else if($workedHrs < 8){
                            //Early leave
                            Absence::create([
                                "user_id"=> $user->id,
                                "date"=>$date1->format('Y-m-d'),
                                "status"=> 4,
                                "worked_hrs"=>$workedHrs,
                                "domain"=>$t->domain
                            ]);
                        }
                      }

                    }
                  }
                }
              }catch(Exception $e) {

              }
            }
          }
        }
      }
}
