<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\GeneralTrait;
use App\Models\Designations;
use DB;

class UserController extends Controller
{

    use GeneralTrait;
    //
    public function employeeSearch(Request $request){
        // dd($request->all());
        if($request->searchId!=null and $request->searchName==null and $request->searchJob==null){
// dd($request->all());
            $employees = DB::table('users')
                ->join('designations', 'users.job_title', '=', 'designations.id')
                ->where('users.employee_id', 'like', '%'.$request->searchId.'%')
                ->select('users.*', 'designations.name as job_title')
                ->get();
            }elseif($request->searchName!='' and $request->searchId==''  and $request->searchJob=='' ){
              $employees =  DB::table('users')
                  ->join('designations', 'users.job_title', '=', 'designations.id')
                  ->where('users.name', 'like', '%'.$request->searchName.'%')
                  ->select('users.*', 'designations.name as job_title')
                  ->get();
        }elseif($request->searchJob!='' and $request->searchName=='' and $request->searchId==''){
            $employees = DB::table('users')
                ->join('designations', 'users.job_title', '=', 'designations.id')
                ->where('users.Job_title',$request->searchJob)
                ->select('users.*', 'designations.name as job_title')
                ->get();
      }elseif($request->searchId!='' and $request->searchName!='' and $request->searchJob=='' ){
        $employees = DB::table('users')
            ->join('designations', 'users.job_title', '=', 'designations.id')
            ->where('users.employee_id', 'like', '%'.$request->searchId.'%')
            ->where('users.name', 'like', '%'.$request->searchName.'%')
            ->select('users.*', 'designations.name as job_title')
            ->get();
        }elseif($request->searchId!='' and $request->searchJob!='' and $request->searchName==''){
            $employees =  DB::table('users')
                ->join('designations', 'users.job_title', '=', 'designations.id')
                ->where('users.employee_id', 'like', '%'.$request->searchId.'%')
                ->where('users.Job_title',$request->searchJob)
                ->select('users.*', 'designations.name as job_title')
                ->get();
            }elseif($request->searchName!='' and $request->searchJob!='' and $request->searchId==''){
                $employees = DB::table('users')
                    ->join('designations', 'users.job_title', '=', 'designations.id')
                    ->where('users.name', 'like', '%'.$request->searchName.'%')
                    ->where('users.Job_title',$request->searchJob)
                    ->select('users.*', 'designations.name as job_title')
                    ->get();
                }elseif($request->searchId!='' and $request->searchName!=''  and $request->searchJob!='' ){
                    $employees = DB::table('users')
                        ->join('designations', 'users.job_title', '=', 'designations.id')
                        ->where('users.employee_id', 'like', '%'.$request->searchId.'%')
                        ->where('users.name', 'like', '%'.$request->searchName.'%')
                        ->where('users.Job_title',$request->searchJob)
                        ->select('users.*', 'designations.name as job_title')
                        ->get();
                    }else{
         $employees= DB::table('users')
             ->join('designations', 'users.job_title', '=', 'designations.id')
             ->select('users.*', 'designations.name as job_title')
             ->get();
        }
        return $this->generalResponse(200,$employees);

    }
    public function getAllDesignations(){
        $designations = Designations::all();
        return $this->generalResponse(200,$designations);
    }
}
