<?php

use App\Models\TaskActivity;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

use App\Http\Livewire\BranchesComponent;

use App\Http\Livewire\CompanyProfileComponent;
use App\Http\Livewire\CompanyClientProfileComponent;
use App\Http\Livewire\HolidaysComponent;

use App\Http\Livewire\MissingInfoComponent;

use App\Http\Livewire\PermissionsComponent;
use App\Http\Livewire\UserPermissionComponent;

use App\Http\Livewire\DashnoardComponent;

use App\Http\Livewire\CompanyComponent;


use App\Events\UserRegistration;

use App\Http\Livewire\ActivitiesComponent;
use App\Http\Livewire\ChangePasswordComponent;
use App\Http\Livewire\ClientComponent;
use App\Http\Livewire\PagesComponent;
use App\Http\Livewire\PolicyComponent;
use App\Http\Livewire\SuperadminDashboardComponent;
use App\Http\Livewire\AdminComponent;
use App\Http\Livewire\ClientDashboardComponent;
use App\Http\Livewire\SubscriptionPlanComponent;
use App\Http\Livewire\Front\IndexComponent;
use App\Http\Livewire\Front\AboutComponent;
use App\Http\Livewire\Front\PricingComponent;
use App\Http\Livewire\Front\ContactComponent;
use App\Http\Livewire\SubscriberComponent;
use App\Http\Livewire\Front\ServiceComponent;
use App\Http\Livewire\Front\RegisterComponent;
use App\Http\Livewire\Front\LoginComponent;
use App\Http\Livewire\Front\CallbackComponent;
use App\Http\Livewire\UserSubscriberComponent;
use App\Http\Livewire\CompanyClientComponent;
use App\Http\Livewire\LayoutComponent;
use App\Http\Livewire\LeadsComponent;
use App\Http\Livewire\LeadViewComponent;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Client;
use App\Models\Layout;
use App\Http\Controllers\GetHolidayController;
use App\Http\Livewire\UploadPhoto;
use App\Models\Feature;
use App\Models\Company_client;
use App\Http\Livewire\Front\Logout;
use App\Http\Controllers\UploadPhoto as m;



use App\Http\Livewire\MessagesComponent;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Tenancy;
use App\Http\Livewire\ProjectDetailsComponent;
use Illuminate\Support\Facades\Session;

use App\Http\Livewire\TaskComponent;
use App\Http\Livewire\TicketComponent;
use App\Http\Livewire\TicketViewComponent;

use App\Http\Livewire\TaskBoardComponent;

use App\Http\Controllers\BoardController;
use App\Http\Controllers\paymentController;
use App\Http\Livewire\PriceingModalComponent;

use App\Http\Livewire\EmailConfigComponent;
use App\Http\Controllers\MissingInfoController;
use App\Http\Controllers\EmailVerificationController;


use App\Http\Livewire\JobCategoriesComponent;
use App\Http\Livewire\JobComponent;
use App\Http\Livewire\JobApplicantComponent;
use App\Http\Controllers\JobController;



use App\Http\Livewire\ProjectComponent;
use App\Http\Livewire\RegionComponent;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// dd( LaravelLocalization::getLocalizedURL('en'));
// dd(LaravelLocalization::setLocale(Auth::user()->lang));
// Route::get('welcome',function (){

Route::group(['prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath','tenants' ]], function() {


    Route::get('/upload_photo', UploadPhoto::class);


    Route::get('/run-seeder', function () {
        // Artisan::call('db:seed', ['--class' => 'ModulesSeeder']);
        // Artisan::call('db:seed', ['--class' => 'RoleModuleSeeder']);
        // Artisan::call('db:seed', ['--class' => 'PermissionSeeder']);
        // Artisan::call('db:seed', ['--class' => 'ModelPermissionSeeder']);
        // Artisan::call('db:seed', ['--class' => 'RolePermissionSeeder']);
        return 'Seeder executed successfully';
    });





    Route::post('/client_edit_photo', function (Request $request) {

        $photo = $request->file('photo');
// dd($photo);

    $path = $photo->store('photos','public');

    $id = $request->input('id');
    // dd($id);

    $url=request()->getHost();
    $urlrxplode=explode(".",$url);
     DB::connection('general')->table('clients')
        ->where('id', $id)
            ->update([
                'photo' => $path
            ]);


        // TODO: Perform any additional tasks here, such as resizing the photo or saving it to a database

        return response()->json(['path' => asset($path)]);
        // return redirect()->back();
    });




    Route::get('clearCash',function () {

        Artisan::call('cache:clear');
        Artisan::call('config:clear');
        return 'done';
    });


    Route::post('updateTicketphoto',[App\Http\Livewire\TicketComponent::class,'updatePhoto']);
    Route::post('/updateTicketActivityphoto',[App\Http\Livewire\TicketViewComponent::class,'updatePhoto']);

    Route::get('/taskboard/{list}/{task}',[BoardController::class, 'store']);





    Route::post('/add_photo', function (Request $request) {

        $photo = $request->file('photo');


        $path = $photo->store('photos','public');


        session()->put('photo',$path);

        // TODO: Perform any additional tasks here, such as resizing the photo or saving it to a database

        return response()->json(['path' => asset($path)]);
        // return redirect()->back();
    });


    Route::post('/add_multiple_photo', function (Request $request) {


        if($request->has('photo')){
        $photo = $request->file('photo');


        foreach ($photo as $file) {
            $path[] = $file->store('photos', 'public');
            $photoName[]=$file->getClientOriginalName();
        }
        Session::put([
            'photo' => $path,
            'photoName' => $photoName
        ]);
}
return 1;
    });



Route::post('/add_multiple_photo_ticket', function (Request $request) {


    if($request->has('photo')){

        $photo = $request->file('photo');


        foreach ($photo as $file) {
            $path[] = $file->store('photos', 'public');
            $photoName[]=$file->getClientOriginalName();
        }
        $json_path = json_encode($path);
        $json_photoName = json_encode($photoName);
        Session::put([
            'photo' => $json_path,
            'photoName' => $json_photoName
        ]);
}



Route::post('/save_order', function (Request $request) {

    $order = $_POST['order'];
    return($order);
});

        // TODO: Perform any additional tasks here, such as resizing the photo or saving it to a database

        return count($photo);
        // return redirect()->back();
    });

    Route::post('/add_multiple_task', function (Request $request) {


        $photo = $request->file('photo');
        $project_id = $request->input('project_id');

        foreach ($photo as $file) {
            $path[]      = $file->store('photos', 'public');
            $photoName[] = $file->getClientOriginalName();

        }
        $json_path = json_encode($path);
        $json_photoName = json_encode($photoName);

        $activity = new TaskActivity();
        $activity->project_id   = $project_id;
        $activity->description  = auth()->user()->name .' attached '. count($path) .' files ';
        $activity->file         =$json_path;
        $activity->filename     =$json_photoName;
        $activity->created_by   = auth()->user()->id;
        $activity->save();



        // TODO: Perform any additional tasks here, such as resizing the photo or saving it to a database

        return 1;
        // return redirect()->back();
    });


    Route::post('/add_multiple_file', function (Request $request) {

        if($request->has('file')){

       $file = $request->file('file');


        foreach ($file as $files) {
            $path[] = $files->store('photos', 'public');
            $fileName[]=$files->getClientOriginalName();
        }
        Session::put([
            'file' => $path,
            'fileName' => $fileName
        ]);

    }
        // TODO: Perform any additional tasks here, such as resizing the photo or saving it to a database

        return 1;
        // return redirect()->back();
    });




Route::post('/feature_image', function (Request $request) {

    $photo = $request->file('photo');

    $path = $photo->store('photos','public');

    $id = $request->input('freature_id');

     Feature::where('id', $id)
           ->update([
               'image' => $path
           ]);
//
//            // TODO: Perform any additional tasks here, such as resizing the photo or saving it to a database
//
    return response()->json(['path' => asset($path)]);
});

    Route::post('/front_image', function (Request $request) {

        $photo = $request->file('photo');

        $path = $photo->store('photos','public');
        $section_no = $request->input('section_no');

        Layout::where('id', 1)
            ->update([
                'image' => $path
            ]);

//            // TODO: Perform any additional tasks here, such as resizing the photo or saving it to a database
//
        return response()->json(['path' => asset($path)]);
    });

    Route::get('/callback', CallbackComponent::class);

    Route::get('/index', IndexComponent::class);
    Route::get('/about', AboutComponent::class);
    Route::get('/pricing', PricingComponent::class);
    Route::get('/services', ServiceComponent::class);
    Route::get('/contact', ContactComponent::class);
    Route::get('/sign_up', RegisterComponent::class);
    Route::get('/sign_in', LoginComponent::class);
    Route::get('/log_out', Logout::class);

    Route::get('job-view/{slug}', 'App\Http\Controllers\JobController@index');
    Route::post('apply_job', 'App\Http\Controllers\JobController@applytojob');

    Route::get('/privacypolicy', PolicyComponent::class);
    Route::post('attendanceApi', [AttendanceController::class, 'store']);

    Route::get('/', function () {

        //    dd(User::all());
        return redirect()->route('login');
    });

    Auth::routes(['verify' => true]);



    Route::get('/verify-email/{token}', [EmailVerificationController::class, 'verify'])->name('verify.email');








    Route::group(['middleware' => 'session.token'], function () {



// end verify by mail






Route::get('Tickets', TicketComponent::class);
        Route::get('ticket-view/{id}', TicketViewComponent::class);
        // Route::group(['middleware' => ['can:leads-read']], function () {
        Route::get('lead-view/{id}', LeadViewComponent::class);
        Route::get('Leads', LeadsComponent::class);
        Route::post('/LeadExcelUpload', 'App\Http\Livewire\LeadsComponent@upload_Excel')->name('Leadexcelupload');
    // });
    Route::group(['middleware' => ['auth','verified']], function () {


        Route::group(['middleware' => ['can:projects-read']], function () {
        Route::get('projects', ProjectComponent::class);
        Route::get('project/{id}', ProjectDetailsComponent::class);


    });

    Route::get('regions', RegionComponent::class);

        Route::get('task/{id?}', TaskComponent::class);
        Route::get('task-board/{id?}', TaskBoardComponent::class);


Route::get('/client-dashboard', ClientDashboardComponent::class);
    Route::get('/superadmin-dashboard', SuperadminDashboardComponent::class);
    Route::get('/superadmin-reports', [SuperadminDashboardComponent::class, 'reports']);
    Route::get('/admins', AdminComponent::class);
        Route::post('setLang',function(Request $request){
            $user = User::findOrFail(auth()->user()->id);
            // dd($request->all());
            $user->lang= $request->lang;
            $user->save();
            app()->setLocale($request->lang);

            return Redirect::to(LaravelLocalization::getLocalizedURL($request->lang,  url()->previous()));

        })->name('setLang');



        Route::get('/subscription-plan', SubscriptionPlanComponent::class);

        Route::get('/subscribers', SubscriberComponent::class);

        Route::get('/session', function () {
            $value = Session::get('key1');
        });

        Route::get('/layouts', LayoutComponent::class);
        Route::get('/Messages', MessagesComponent::class);

        Route::group(['middleware' => ['can:admin-dashboard-read']], function () {
            Route::get('/admin-dashboard', DashnoardComponent::class);
        });

        Route::get('/missing-info', MissingInfoComponent::class);






        Route::get('activities/clear', 'App\Http\Livewire\ActivitiesComponent@ClearAll');
        Route::get('activities/clearOne/{noti_id}', 'App\Http\Livewire\ActivitiesComponent@ClearOne');
//    Route::group(['middleware' => ['can:clients-read']], function () {
    Route::get('clients', ClientComponent::class);
    //    });


Route::group(['middleware' => ['can:job-categories-read']], function () {

    Route::get('job-categories', JobCategoriesComponent::class);
});
Route::group(['middleware' => ['can:jobs-read']], function () {

    Route::get('jobs', JobComponent::class);
});
Route::group(['middleware' => ['can:job-applicants-read']], function () {

    Route::get('job-applicants', JobApplicantComponent::class);
});







        Route::group(['middleware' => ['can:activities-read']], function () {

            Route::get('activities/{id?}', ActivitiesComponent::class);
        });


        Route::group(['middleware' => ['can:change-password-read']], function () {
            Route::get('change_password', ChangePasswordComponent::class);
        });

        Route::group(['middleware' => ['can:email-setting-read']], function () {

        Route::get('email-config', EmailConfigComponent::class);
        });
        Route::get('/pages', PagesComponent::class);

    });
        Route::get('/pages', PagesComponent::class);

        Route::get('user-subscriber', UserSubscriberComponent::class);
        // Route::get('projects', ProjectComponent::class);

        Route::get('pricing-plan-subscribe/{id}', [paymentController::class,'ChoosePlan']);

    }); // end localization
    }); // end localization





