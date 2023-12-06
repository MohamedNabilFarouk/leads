<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\APIController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\api\LeavesController;
use App\Http\Controllers\api\AttendanceApis;
use App\Http\Controllers\api\LoanController;
use App\Http\Controllers\api\LeadsController;
use App\Http\Controllers\api\RegionController;
use App\Http\Controllers\api\ChannelController;
use App\Http\Controllers\api\RolesPermissionsController;
use App\Http\Controllers\api\LeadStatusController;
use App\Http\Controllers\api\ProjectController;
use App\Http\Controllers\api\PropertyController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::middleware('api.password')->group(function () { //for auth to use api
Route::controller(AttendanceApis::class)->group(function () {
    Route::post('checkin', 'checkin');
    Route::post('checkout', 'checkout');
    Route::get('attendance', 'attendacePage');
});

Route::get('getEmployees', [APIController::class,'showEmployeeData']);
Route::post('getEmployeeAttendance', [APIController::class,'showEmployeeAttendance']);

Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::get('listAllNotifications', 'myNotifications');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');
    Route::get('profile','profile');
    Route::post('profile','editProfile');
    Route::get('getAllCompanies','companies');
    Route::get('dashboard','dashboard');
    Route::get('salary','salary');
    Route::get('performance','performance');
    Route::post('register', 'register');

    Route::get('get_nfc', 'getNfcID');
    Route::get('employee_performance/{id}', 'employeePerformance');
    Route::get('employee_profile/{id}', 'employeeProfile');
    Route::get('getClient/{slug}', 'getClient'); // get saas client by slugs

});

Route::controller(LeavesController::class)->group(function () {
    Route::get('listLeaveTypes', 'leaveTypes');
    Route::get('myLeaves', 'myLeaves');
    Route::get('listAllEmployees', 'employees');
    Route::get('deleteLeave/{id}', 'deleteLeave');
    Route::post('createLeave', 'createLeave');
    Route::post('updateLeave/{id}', 'updateLeave');
    Route::get('getLeave/{id}', 'getLeave');
    Route::get('approveReplacement/{id}', 'approveReplacement');

});
Route::controller(LoanController::class)->group(function () {
    Route::get('userLoan/{id}', 'getUserLoans');
    Route::get('warrantorLoan/{id}', 'getWarrantorLoans');
    Route::post('changeLoanStatus', 'changeStatus');
    Route::post('addLoan', 'addLoan');
});

Route::group(['middleware' => ['auth:api'], 'namespace' => 'App\Http\Controllers\api'], function () {
Route::get('getAllDesignations','UserController@getAllDesignations');
Route::post('employeeSearch','UserController@employeeSearch');
});


Route::controller(LeadsController::class)->group(function () {
    Route::get('getLeadClients/{slug}', 'getLeadClients');
    Route::post('leadLogin', 'leadLogin');
    Route::get('leadsByStatus', 'getLeadsByStatus');
    Route::get('Leadsfilter','filter');
});
// Route::controller(RegionsController::class)->group(function () {
    Route::resource('regions', RegionController::class);
    Route::resource('channel', ChannelController::class);
    Route::resource('leadStatus', LeadStatusController::class);
    Route::resource('lead', LeadsController::class);
    Route::resource('project', ProjectController::class);
    Route::resource('property', PropertyController::class);

    Route::controller(RolesPermissionsController::class)->group(function () {
        Route::post('assignPermission', 'addPermissionToRole');

        Route::post('leadLogin', 'leadLogin');
        // Route::get('leadsByStatus', 'getLeadsByStatus');
    });


}); //end api auth




