<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use DB;
use Auth;
use Illuminate\Support\Facades\View;
use Config;

use App\Models\Country;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $currenturl = request()->getHost();

        $tenantid=DB::connection('landlord')->table('tenants')->where('domain',$currenturl)->first();
// if($tenantid != null){

//         $mailConfig = DB::connection('general')->table('email_configs')->where('tenant_id',$tenantid->id)->first();
//         if ($mailConfig!=null) {
//             Config::set('mail.mailer', 'smtp');
//             Config::set('mail.host', $mailConfig->smtp_host);
//             Config::set('mail.port', $mailConfig->smtp_port);
//             Config::set('mail.username', $mailConfig->smtp_user);
//             Config::set('mail.password', $mailConfig->smtp_password);
//             Config::set('mail.encryption', $mailConfig->smtp_security);
//             Config::set('mail.from.address', $mailConfig->email_from_address);
//             Config::set('mail.from.name', $mailConfig->email_from_name);
//         }
//     }
}

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {


         $approves = [
            'New' => ["en"=>'New',"ar"=>'جديد'],
          'Pending' => ["en"=>'Pending',"ar"=>'معلق'],
          'Approved' => ["en"=>'Approved',"ar"=>'موافق'],
          'Declined' => ["en"=>'Declined',"ar"=>'مرفوض']
        ];
         //leaves
        $leave_approves = [
            'New' => ["en"=>'New',"ar"=>'جديد'],
            'Pending' => ["en"=>'Pending',"ar"=>'معلق'],
            'replacement_Approved' => ["en"=>'replacement Approved',"ar"=>'موافقه الموظف البديل'],
            'replacement_Declined' => ["en"=>'replacement Declined',"ar"=>'رفض الموظف البديل'],
            'hr_Approved' => ["en"=>'HR Approved',"ar"=>'موافقه موظف شئون العاملين'],
            'hr_Declined' => ["en"=>'HR Declined',"ar"=>'رفض موظف شئون العاملين'],
            'finance_Approved' => ["en"=>'finance Approved',"ar"=>' موافقه موظف الماليه'],
            'finance_Declined' => ["en"=>'finance Declined',"ar"=>'رفض موظف الماليه'],
            'Approved' => ["en"=>'Approved',"ar"=>'موافق'],
            'Declined' => ["en"=>'Declined',"ar"=>'ملغي']
        ];
        $hr_leave_approves = [
            'hr_Approved' => ["en"=>'HR Approved',"ar"=>'موافقة الموارد البشرية'],
            'hr_Declined' => ["en"=>'HR Declined',"ar"=>'رفض الموارد البشرية'],
        ];
        $finance_leave_approves = [
            'finance_Approved' => ["en"=>'finance Approved',"ar"=>'موافقة الحسابات'],
            'finance_Declined' => ["en"=>'finance Declined',"ar"=>'رفض الحسابات'],
        ];
        $replacement_leave_approves = [
            'replacement_Approved' => ["en"=>'replacement Approved',"ar"=>'موافقة البديل'],
            'replacement_Declined' => ["en"=>'replacement Declined',"ar"=>'رفض البديل'],
        ];
         //loan
         $loan_approves = [
            'New' => ["en"=>'New',"ar"=>'جديد'],
          'Pending' => ["en"=>'Pending',"ar"=>'معلق'],
          'warrantor_Approved' => ["en"=>'Warrantor Approved',"ar"=>'موافقة الضامن'],
          'warrantor_Declined' => ["en"=>'Warrantor Declined',"ar"=>'رفض الضامن'],
          'hr_Approved' => ["en"=>'HR Approved',"ar"=>'موافقة الموارد البشرية'],
          'hr_Declined' => ["en"=>'HR Declined',"ar"=>'رفض الموارد البشرية'],
          'finance_Approved' => ["en"=>'finance Approved',"ar"=>'موافقة الحسابات'],
          'finance_Declined' => ["en"=>'finance Declined',"ar"=>'رفض الحسابات'],
          'Approved' => ["en"=>'Approved',"ar"=>'موافق'],
          'Declined' => ["en"=>'Declined',"ar"=>'مرفوض']
        ];
        $hr_loan_approves = [
            'hr_Approved' => ["en"=>'HR Approved',"ar"=>'موافقة الموارد البشرية'],
            'hr_Declined' => ["en"=>'HR Declined',"ar"=>'رفض الموارد البشرية'],
        ];
        $finance_loan_approves = [
            'finance_Approved' => ["en"=>'finance Approved',"ar"=>'موافقة الحسابات'],
            'finance_Declined' => ["en"=>'finance Declined',"ar"=>'رفض الحسابات'],
        ];

         $materialStatus=[
            'Single'=> ["en"=>'Single',"ar"=>'اعزب'],
            'Married' =>["en"=>'Married',"ar"=>'متزوج'],
            'Divorced' => ["en"=>'Divorced',"ar"=>'منفصل'],
            'Widower' => ["en"=>'Widower',"ar"=>'ارمل'],
       ];
       $religions=[
            'Muslim'=>  ["en"=>'Muslim',"ar"=>'مسلم'],
            'Christian'=>  ["en"=>'Christian',"ar"=>'مسيحي'],
            'Others'=>  ["en"=>'Others',"ar"=>'اخري'],
       ];
       $genders=[
            'Male'=>  ["en"=>'Male',"ar"=>'ذكر'],
            'Female'=>  ["en"=>'Female',"ar"=>'انثي'],
       ];


       $tickets_status=[
        'Pending'=>  ["en"=>'Male',"ar"=>'معلق'],
        'Open'=>  ["en"=>'Open',"ar"=>'جاري'],
        'Solved'=>  ["en"=>'Solved',"ar"=>'تم الحل'],
        'Returned'=>  ["en"=>'Female',"ar"=>'اعادة'],
         ];
       $leads_status=[
        'New'=>  ["en"=>'New',"ar"=>'جديد'],
        'No Answer'=>  ["en"=>'No Answer',"ar"=>'لم يتم الرد'],
        'Meeting'=>  ["en"=>'Meeting',"ar"=>'تحديد اجتماع'],
        'Following after meeting'=>  ["en"=>'Following after meeting',"ar"=>'متابعة بعد اجتماع'],
        'Reschedule meeting'=>  ["en"=>'Reschedule meeting',"ar"=>'تحديد موعد اخر'],
        'Following'=>  ["en"=>'Following',"ar"=>'متابعة'],
        'Cancellation'=>  ["en"=>'Cancellation',"ar"=>'الغاء'],
        'Done deal'=>  ["en"=>'Done deal',"ar"=>'تم بنجاح'],
        'Archive'=>  ["en"=>'Archive',"ar"=>'تاجيل'],
        'Reservation'=>  ["en"=>'Reservation',"ar"=>'حجز'],
         ];
        $tickets_priority=[
            'High'=>  ["en"=>'High',"ar"=>'مرتفع'],
            'Medium'=>  ["en"=>'Medium',"ar"=>'متوسط'],
            'Low'=>  ["en"=>'Low',"ar"=>'قليل'],
        ];
    //   $nationalities = Country::all();
      $resignation_types=[
        'Termination of the contract by mutual agreement'=> ["en"=>'Termination of the contract by mutual agreement',"ar"=>'إنهاء العقد بالتراضي'],
        'Resignation' =>["en"=>'Resignation',"ar"=>'استقالة'],
        'Non-renewal' => ["en"=>'Non-renewal',"ar"=>'عدم تجديد العقد'],
       ];
       $plans = DB::connection('general')->table('subscription_plans')->get();
       $leave_deduction_type=[
        '1' =>  ["en"=>'Late arrival',"ar"=>'الوصول متأخر'],
        '2' =>  ["en"=>'Leave Early',"ar"=>'انصراف مبكرا'],
        '3' =>  ["en"=>'Absence',"ar"=>'غياب'],
        '4' =>  ["en"=>'Other',"ar"=>'أخري']
    ];

    //   dd($nationalities);
        View::share([
            'approves' =>  $approves,
            'leads_status' =>  $leads_status,

            'leave_approves' =>  $leave_approves,
            'hr_leave_approves' =>  $hr_leave_approves,
            'finance_leave_approves' =>  $finance_leave_approves,
            'replacement_leave_approves' => $replacement_leave_approves,
            'loan_approves' =>  $loan_approves,
            'hr_loan_approves' =>  $hr_loan_approves,
            'finance_loan_approves' =>  $finance_loan_approves,
            'religions' =>  $religions,
            'materialStatus' =>  $materialStatus,
            'genders' =>  $genders,
            'tickets_status' =>  $tickets_status,
            'tickets_priority' =>  $tickets_priority,
            'resignation_types' =>  $resignation_types,
        //    'nationalities' =>  $nationalities,
           "plans"=>$plans,
           "leave_deduction_type"=>$leave_deduction_type

        ]);
    }
}
