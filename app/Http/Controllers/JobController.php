<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Str;
use App\Models\JobApplicant;

class JobController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($id)
    {
        $slug = explode(".",$_SERVER['HTTP_HOST'])[0];
        $client = \DB::connection('general')->table('clients')->where('slug',$slug)->first();
        
        $job = \App\Models\Job::where('slug',$id)->first();

        return view('livewire.view-job-component',['job'=>$job,'client'=>$client]);
    }

    public function applytojob(Request $request){
        $this->validate($request, [
            "job_id" => "required",
            "name" => "required",
            "mobile" => "required",
            "email" => "required",
            "cv" => "required",
        ]);

        $fileName = Str::random(10) . time() . '.' . $request->file("cv")->getClientOriginalExtension();
        $request->file("cv")->move(public_path('/photos'), $fileName);

        $row  = JobApplicant::create([
            "name" => $request->name,
            "email" => $request->email,
            "message" => $request->message,
            "cv" => $fileName,
            "job_id" => $request->job_id,
            "mobile" => $request->mobile
        ]);

        return back();
    }
}
