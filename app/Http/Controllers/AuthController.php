<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Loan;
use App\Http\Resources\UserResource;
use Spatie\Multitenancy\Models\Tenant;
use Validator;
class AuthController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['companies','login', 'register','getClient']]);
    }


    public function companies()
    {
        $companies = Tenant::select(["id","name", "domain","database"])->get();

        return response()->json([
            'status' => 200,
            'data' => $companies
        ]);
    }


    public function getClient($slug){
        $client = Tenant::where('name', $slug)->get();

        // $client = Client::where('slug',$slug)->first();
        if(!$client){
            return response()->json(['status'=>400, 'message'=>'Client Not found']);
        }else{

        return response()->json([
            'status' => 200,
            'data' =>$client

        ]);
    }

    }



    public function myNotifications()
    {
        $user =  Auth::guard('api')->user();

        if (auth()->check() == false) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $notifications = \App\Models\Notification::where('user_id',$user->id)->paginate();

        return response()->json([
            'status' => 200,
            'data' => $notifications
        ]);
    }

    public function login(Request $request)
    {

            $request->validate([
                'email' => 'required|string|email',
                'password' => 'required|string',
            ]);
            $credentials = $request->only('email', 'password');

            if ((!$token = auth()->guard('api')->attempt($credentials)) ) {
                return response()->json(['response' => false, 'status' => 403, 'message' => 'Invalid Login'], 403);
            }
            $user = Auth::guard('api')->user();
            // dd($user->hasDirectPermission('leads-read'));

            // if($user->hasDirectPermission('leads-read')){
            //     dd('yes');
            // }

            return $this->respondWithToken($token);
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);

        if($validator->fails()){
            return response()->json(['error'=>$validator->errors()->toJson()], 400);
        }
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id'=>$request->role_id,
            'reports_to'=>$request->reports_to,
        ]);

        $user->assignRole($request->role_id);

        return response()->json([
            'status' => 200,
            'message' => 'User created successfully',
            'user' => $user

        ]);
    }


    public function employeeProfile($id)
    {
        $user =  User::where("id",$id)->first();

        if (auth()->check() == false) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        $user->reportToName = @User::where("id", $user->reports_to)->first()->name;
        $user->university =  @$user->educationInfo[0]->institution;
        $user->faculty =  @$use->educationInfo[0]->subject;
        $user->year =  @$user->educationInfo[0]->complete_date;
        $user = $user->load('job');

        return response()->json([
            'status' => 200,
            'data' => $user,
            'role' => @$user->getRoleNames(),
            'permission' => @$user->permissions,
            'department' => @$user->dep->name,
            'experience' => @$user->experience
        ], 200, [], JSON_PRETTY_PRINT);
    }

    public function profile()
    {
        $user =  Auth::guard('api')->user();

        if (auth()->check() == false) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        $user->reportToName = @User::where("id", $user->reports_to)->first()->name;
        $user->university =  @$user->educationInfo[0]->institution;
        $user->faculty =  @$use->educationInfo[0]->subject;
        $user->year =  @$user->educationInfo[0]->complete_date;
        $user = $user->load('job');

        return response()->json([
            'status' => 200,
            'data' => $user,
            'role' => @$user->getRoleNames(),
            'permission' => @$user->permissions,
            'department' => @$user->dep->name,
            'experience' => @$user->experience
        ], 200, [], JSON_PRETTY_PRINT);
    }

    public function editProfile(Request $request)
    {
        $user =  Auth::guard('api')->user();

        if (auth()->check() == false) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        if($request->password){
            $request->merge(["password"=>Hash::make($request->password)]);
        }
        $user->update($request->only(["name","first_name","last_name","birthday","email",
        "religion","nationality","residence_number","phone_number","home_number","address",
        "marital_status","family_member","bank_name","bank_account_no","password","university","faculty","year"]));

        $user->reportToName = @User::where("id", $user->reports_to)->first()->name;
        $user->university =  @$user->educationInfo[0]->institution;
        $user->faculty =  @$use->educationInfo[0]->subject;
        $user->year =  @$user->educationInfo[0]->complete_date;
        $user = $user->load('job');

        return response()->json([
            'status' => 200,
            'data' => $user,
            'role' => @$user->getRoleNames(),
            'permission' => @$user->permissions,
            'department' => @$user->dep->name
        ], 200, [], JSON_PRETTY_PRINT);
    }

    public function logout()
    {
        Auth::logout();
        return response()->json([
            'status' => 'success',
            'message' => 'Successfully logged out',
        ]);
    }

    public function refresh()
    {
        return response()->json([
            'status' => 200,
            'user' => Auth::user(),
            'authorization' => [
                'token' => Auth::refresh(),
                'type' => 'bearer',
            ]
        ]);
    }


    protected function respondWithToken($token)
    {
        $user = Auth::guard('api')->user();

        return response()->json([
            'data'=>$user,
            'access_token' => $token,
            // 'expires_in' => auth('api')->factory()->getTTL() * 60
        ]);
    }

    public function dashboard(Request $request)
    {
        $user =  Auth::guard('api')->user();

        if (auth()->check() == false) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $first_day = date('Y-m-01');
        $last_day = date('Y-m-t');

        if($request->start_date && $request->end_date){
            $first_day = $request->start_date;
            $last_day = $request->end_date;
        }
        $replacements = \App\Models\Leaves::with(["user","type"])->where('employee_replacement',$user->id)->latest()->get();
        $row = \App\Models\Attendance::where("user_id",$user->id)->where("domain",$_SERVER['HTTP_HOST'])->where("date",date('Y-m-d'))->first();
        $holidays = \App\Models\Holiday::where("date_from",">=",$first_day)->where("date_from","<=",$last_day)->get();
        $warrantorLoans = Loan::where('warrantor',$user->id)->with('user')->whereIn('status',['Pending','New'])->get();

        $user->reportToName = @User::where("id", $user->reports_to)->first()->name;
        $user->university =  @$user->educationInfo[0]->institution;
        $user->faculty =  @$use->educationInfo[0]->subject;
        $user->year =  @$user->educationInfo[0]->complete_date;
        $user = $user->load('job');

        //$client = Tenant::where("domain",$_SERVER['HTTP_HOST'])->select(["lat","lng", "raduis","nfc_id"])->get();
        $branch = \App\Models\Branch::where("id",$user->branch_id)->select(["lat","lng", "radius","nfc_id"])->get();
        $branch[0]->raduis = $branch[0]->radius;
        return response()->json([
            'status' => 200,
            'data' => $user,
            'client' => $branch,
            'replacements' => @$replacements,
            'checkin' => @$row->check_in,
            'holidays' => @$holidays,
            'warrantorLoans' => @$warrantorLoans,
            'checkout' => @$row->check_out,
            "notifications" =>  \App\Models\Notification::where('user_id',$user->id)->where("created_at",">=",$first_day)->where("created_at","<=",$last_day)->get(),
            "attendance" => \App\Models\Attendance::where('user_id',$user->id)->where("domain",$_SERVER['HTTP_HOST'])->where("date",">=",$first_day)->where("date","<=",$last_day)->whereNotNull("check_in")->count(),
            "absent" => \App\Models\Absence::where('user_id',$user->id)->where("date",">=",$first_day)->where("date","<=",$last_day)->where("status",1)->count(),
            "ealry" => \App\Models\Absence::where('user_id',$user->id)->where("date",">=",$first_day)->where("date","<=",$last_day)->where("status",4)->count(),
            "late" => \App\Models\Absence::where('user_id',$user->id)->where("date",">=",$first_day)->where("date","<=",$last_day)->where("status",2)->count()
            // "locationData"=>['check_in'=>@$row->check_in,
            // 'check_out'=>@$row->check_out,
            // 'lat'=>(double)@$row->lat,
            // 'lng'=>(double)@$row->lng,
            // 'raduis'=>(double)@$row->raduis]

        ], 200, [], JSON_PRETTY_PRINT);
    }

    public function salary()
    {
        $user =  Auth::guard('api')->user();

        if (auth()->check() == false) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }


        $row = \App\Models\Payroll::where("user_id",$user->id)->where("salary_month",">=",date('Y-m-01'))->where("salary_month","<=",date('Y-m-t'))->latest()->first();


        return response()->json([
            'status' => 200,
            'data' => null,
            'salary' => @$row
        ], 200, [], JSON_PRETTY_PRINT);
    }

    public function performance()
    {
        $user =  Auth::guard('api')->user();

        if (auth()->check() == false) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }


        $row = \App\Models\User_performance::where("user_id",$user->id)->latest()->first();


        return response()->json([
            'status' => 200,
            'data' => null,
            'department' => @$user->dep->name,
            'performancd' => @$row
        ], 200, [], JSON_PRETTY_PRINT);
    }

    public function employeePerformance($id)
    {
        $user =  User::where("id",$id)->first();
        if (auth()->check() == false) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }


        $row = \App\Models\User_performance::where("user_id",$user->id)->latest()->first();

        return [
            'status' => 200,
            'data' => $user->load('job'),
            'department' => @$user->dep->name,
            'performancd' => @$row
        ];
    }
}
