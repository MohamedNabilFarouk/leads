<?php

namespace App\Http\Livewire;

use App\Models\Company_client;
use App\Models\Designations;
use App\Models\ProjectImage;
use App\Models\Task;
use Carbon\Carbon;
use Google\Service\Batch\Resource\Projects;
use Illuminate\Http\Request;
use Livewire\Component;
use App\Models\Project;
use App\Models\ProjectTeam;
use App\Models\Region;
use App\Models\User;
use App\Http\Controllers\UploadPhoto;
use Livewire\WithFileUploads;
use Session;
use DB;
use App\Models\Activites;
use App\Models\ActivityUser;
use App\Mail\MyEmail;
class ProjectComponent extends Component
{
    use WithFileUploads;
    public $title,$description,$regions,$region,$map,$video,$team_leader_id,$user_id,
         $status,$users,$photo,$searchName,$searchEmployee,$searchJob,$jobs,$project_edit_id,$project_delete_id;
    public  $team_id=[];
    public $editorValue;
    public function mount(){
        $this->clients=Company_client::all();
        $this->users=User::all();
        $this->jobs=Designations::all();
        $this->regions=Region::all();
        $this->editorValue;
}



    protected $listeners = ['editorValueChanged'];

    public function editorValueChanged($value)
    {
        $this->editorValue = $value;
    }


    public function storeProjectData(Request $request)
    {

        //on form submit validation
        $this->validate([
            'title'  => 'required|unique:projects',
        ]);

//        $uploadController=app(UploadPhoto::class);
//        $image=$uploadController->upload($this->photo);
try{
DB::beginTransaction();

        //Add Student Data
        $project = new Project();
        $project->title          = $this->title;
        $project->description    = $this->editorValue;
        $project->region     = $this->region;
        $project->status       = $this->status;
        $project->map       = $this->map;
        $project->video       = $this->video;
        $project->team_leader_id    = $this->team_leader_id;
        $project->user_id    = auth()->user()->id;


//        $project->photo = $image;
        $project->save();


        $activity = Activites::create([
            'page_name' => 'Project',
            'link' => '/project/'.\Crypt::encrypt($project->id),
            'description'    => auth()->user()->name .' created New Project '.$project->title.' & Assign You ',
            'description_ar' => auth()->user()->name .' created New Project '.$project->title.' & Assign You ',

        ]);

        foreach ($this->team_id as  $key=>$team_ids) {
            $project_team = new ProjectTeam();
            $project_team->project_id = $project->id;
            $project_team->team_id = $team_ids;
            $project_team->save();

            $userName=User::where('id',$team_ids)->first();
            ActivityUser::create([
                'activity_id' => $activity->id,
                'send_id'     => auth()->user()->id,
                'receive_id'  => $team_ids
            ]);

            $details = [
                'title' => 'Task',
                'name' => $userName->name,
                'body' => auth()->user()->name .' created New Project '.$project->title.' & Assign You ',

            ];

            // \Mail::to($userName->email)->send(new \App\Mail\MyEmail($details));

            }

        $sessionFile=(session()->get('photo'));

        $sessionFileName=(session()->get('photoName'));

        if($sessionFile > 0){
            for($i=0;$i<count($sessionFile);$i++){
                $image = new ProjectImage();
                $image->project_id = $project->id;
                $image->file    = $sessionFile[$i];
                $image->name    = $sessionFileName[$i];
                $image->user_id = auth()->user()->id;
                $image->save();
            }
        }
        $sessionFile=(session()->get('file'));

        $sessionFileName=(session()->get('fileName'));

    if($sessionFile > 0){
        for($i=0;$i<count($sessionFile);$i++){
            $image = new ProjectImage();
            $image->project_id = $project->id;
            $image->file    = $sessionFile[$i];
            $image->name    = $sessionFileName[$i];
            $image->user_id = auth()->user()->id;
            $image->save();
        }
    }
        session()->flash('message', __('added successfully'));

        $this->title          ='';
        $this->region      ='';
        $this->map      ='';
        $this->video      ='';
        $this->status        ='';
        $this->description ='';
        $this->team_leader_id    ='';
        $this->team_id        = [];
        Session::forget('photo');
        Session::forget('photoName');
        Session::forget('file');
        Session::forget('fileName');

            DB::commit();
            }catch(Exception $e){
                session()->flash('message', __('Error In Create new Project'));
                DB::rollback();
            }


        $this->dispatchBrowserEvent('close-modal');
    }


    public function resetInputs()
    {
        $this->title          ='';
        $this->client_id      ='';
        $this->start_date     ='';
        $this->end_date       ='';
        $this->priority       ='';
        $this->description    ='';
        $this->description    ='';
        $this->team_leader    ='';
        $this->team_id        = [];
    }

    public function close()
    {
        $this->resetInputs();
    }

    public function editProject($id)
    {
        $project = Project::where('id', $id)->first();
        $this->project_edit_id   = $project->id;
        $this->title          = $project->title;
        $this->description    = strip_tags($project->description);
        $this->region     =     $project->region;
        $this->status       =   $project->status;
        $this->map       =      $project->map;
        $this->video       =    $project->video;
        $this->team_leader_id  =$project->team_leader_id;

        $this->dispatchBrowserEvent('show-edit-project-modal');
    }

    public function changeStatus($value,$id)
    {
        Project::where('id', $id)
        ->update([
            'status' => $value
        ]);
    }
    public function editProjectData()
    {
        //on form submit validation
        $this->validate([
            'title'     => 'required',
        ]);
        try{
            DB::beginTransaction();
      $project = Project::where('id', $this->project_edit_id)->first();
        $project->title          = $this->title;
        $project->description    = $this->description;
        $project->region     = $this->region;
        $project->status       = $this->status;
        $project->map       = $this->map;
        $project->video       = $this->video;
        $project->team_leader_id    = $this->team_leader_id;
        $project->save();

        if($this->team_id!=[]) {
            $teamProject = Project::find($this->project_edit_id);
            $team = $this->team_id;
            $teamProject->team()->sync($team);
        }
        $activity = Activites::create([
            'page_name' => 'Project',
            'link' => '/project/'.\Crypt::encrypt($project->id),
            'description'    => auth()->user()->name .' Edit Project '.$this->title,
            'description_ar' => auth()->user()->name .'  Edit Project '.$this->title,

        ]);

        foreach ($this->team_id as  $key=>$team_ids) {

            $userName=User::where('id',$team_ids)->first();
            ActivityUser::create([
                'activity_id' => $activity->id,
                'send_id'     => auth()->user()->id,
                'receive_id'  => $team_ids
            ]);

            $details = [
                'title' => 'Task',
                'name' => $userName->name,
                'body' => auth()->user()->name .' Edit Project '.$this->title,

            ];

            // \Mail::to($userName->email)->send(new \App\Mail\MyEmail($details));

        }

        session()->flash('message', __('updated successfully'));
        DB::commit();
    }catch(Exception $e){
        session()->flash('message', __('Error In Update Project'));
    }

        //For hide modal after add student success
        $this->dispatchBrowserEvent('close-modal');
    }

    public $view = 'grid';

    public function setGridView()
    {
        $this->view = 'grid';
    }

    public function setListView()
    {
        $this->view = 'list';
    }

    public function deleteConfirmation($id)
    {
        $this->project_delete_id = $id; //Project id

        $this->dispatchBrowserEvent('show-delete-confirmation-modal');
    }

    public function deleteProjectData()
    {

        $project = Project::where('id', $this->project_delete_id)->first();
        $project->delete();

        session()->flash('message', __('deleted successfully'));

        $this->dispatchBrowserEvent('close-modal');

        $this->project_delete_id = '';
    }

    public function cancel()
    {
        $this->project_delete_id = '';
    }


    public function render()
    {


        $usersReport=User::where('id',auth()->user()->id)->first();

        $query = Project::query();

        // if($usersReport->reports_to == auth()->user()->id) {



        //     if($this->searchName){
        //         $query->where('title','like','%'.$this->searchName.'%');
        //     }

        //     if($this->searchEmployee) {

        //         $query->WhereHas('team', function ($employee) {
        //             $employee->where('name', 'like', '%' . $this->searchEmployee . '%');
        //         })->OrWhereHas('teamLeaderName',function ($teamleader) {
        //             $teamleader->where('name', 'like', '%' . $this->searchEmployee . '%');
        //         });
        //     }

        //     if($this->searchJob) {

        //         $query->WhereHas('team', function ($employee) {
        //             $employee->where('Job_title', $this->searchJob);
        //         });
        //     }
        // }else{

            if(auth()->user()->role_id==1){

            }else{
            $query->where('team_leader',auth()->user()->id)->orWhereHas('team', function ($q) {
                $q->where('team_id',auth()->user()->id);
            });
            if($this->searchName){
                $query->where('title','like','%'.$this->searchName.'%');

            }
            if($this->searchEmployee) {

                $query->WhereHas('team', function ($employee) {
                    $employee->where('name', 'like', '%' . $this->searchEmployee . '%');
                })->OrWhereHas('teamLeaderName',function ($teamleader){
                   $teamleader->where('name', 'like', '%' . $this->searchEmployee . '%');
                });
                }
            if($this->searchJob) {

                $query->WhereHas('team', function ($employee) {
                    $employee->where('Job_title', $this->searchJob);
                });
            }
            if(auth()->user()->role_id==1){

                $query->all();
            }
        }

        $projects = $query->get();



        return view('livewire.project-component',['projects'=>$projects])->layout('livewire.layouts.base');
    }
}
