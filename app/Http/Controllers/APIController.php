<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;
use DateTime;

class APIController extends Controller
{
    public function showEmployeeData(Request $request){
       $name=$request->input('name');
       $employees = DB::table('users')
                ->join('departments', 'users.department', '=', 'departments.id')
                ->join('designations', 'users.job_title', '=', 'designations.id')
                ->select('users.id', 'users.name', 'users.first_name', 'users.last_name', 'users.email', 'users.photo', 'users.birthday', 'users.religion', 'users.nationality', 'users.employee_id', 'users.phone_number', 'users.home_number', 'users.address', 'users.marital_status', 'departments.name as departments', 'designations.name as job_title')
                ->where('users.name', 'like', '%' . $name. '%')
                ->get();
            if (count($employees) == 0) {
                return response()->json(['employees' => $employees, 'message' => 'error', 'status' => 400]);

            } else {
                return response()->json(['employees' => $employees, 'message' => 'successfully', 'status' => 200]);
            }
        }

    public function showEmployeeAttendance(Request $request){
        $id     = $request->input('id');
        $month  = $request->input('month');
        $year   = $request->input('year');

        $attendance = DB::connection('mongodb')->table('attendances')->get();

        if (count($attendance) == 0) {
            return response()->json(['attendance' => $attendance, 'message' => 'error', 'status' => 400]);

        } else {
            return response()->json(['attendance' => $attendance, 'message' => 'successfully', 'status' => 200]);
        }
    }

}


