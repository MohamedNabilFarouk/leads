<?php

namespace App\Http\Livewire;

use App\Models\Activites;
use App\Models\ActivityUser;
use App\Models\Task;
use App\Models\TaskActivity;
use Livewire\Component;
use App\Models\Company_client;
use App\Models\Designations;
use App\Models\ProjectImage;
use Google\Service\Batch\Resource\Projects;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\ProjectTeam;
use App\Models\User;
use App\Http\Controllers\UploadPhoto;
use Livewire\WithFileUploads;
use App\Http\Livewire\TaskComponent;
class ProjectDetailsComponent extends Component
{
    use WithFileUploads;
    public $title,$client_id,$start_date,$end_date,$priority,$description,$team_leader,
           $clients,$users,$photo,$searchName,$searchEmployee,$searchJob,$jobs,$project_edit_id,$project_delete_id,$task_edit_id;
    public  $team_id=[];
    public $editorValue;
    public $projectId;
    public function mount($id){
        $this->clients=Company_client::all();
        $this->users=User::all();
        $this->jobs=Designations::all();
        $this->editorValue;
        $this->projectId = \Crypt::decrypt($id);
}

    public function ChangTaskTitle($value,$id){
        $task= new TaskComponent();
        $task->changeEvent($value,$id);
    }
    public function makeTaskComplete($value,$id){
        $task= new TaskComponent();
        $task->makeComplete($value,$id);
    }

    public function DeleteTasks($id){
        $task= new TaskComponent();
        $task->DeleteTask($id);
    }


    public function assignTasks($id)
    {
        $task = Task::where('id', $id)->first();

        $this->task_edit_id     = $task->id;

        $this->dispatchBrowserEvent('show-assign-task-modal');
    }

    public function assignTeam($value){
        $taskTitle=Task::where('id',$this->task_edit_id)->first();
        $user=User::where('id',$value)->first();
        Task::where('id', $this->task_edit_id)
            ->update([
                'user_id'=> $value
            ]);
        $activity = new TaskActivity();
        $activity->project_id  = $this->projectId;
        $activity->description = auth()->user()->name .' assigned '. $taskTitle->title .' to '.$user->name;
        $activity->save();

        $activity = Activites::create([
            'page_name' => 'task',
            'link' => '/task/'.\Crypt::encrypt($this->projectId."'"),
            'description' => auth()->user()->name .' assigned '. $taskTitle->title .' to '.$user->name,
            'description_ar' => auth()->user()->name .' assigned '. $taskTitle->title .' to '.$user->name

        ]);



        $projectTeams=Project::with('team')->where('id',$this->projectId)->first();

        foreach ($projectTeams->team as $projectTeam) {

            ActivityUser::create([
                'activity_id' => $activity->id,
                'send_id'     => auth()->user()->id,
                'receive_id'  => $projectTeam->id
            ]);

            $details = [
                'title' => 'Task',
                'name' => $projectTeam->name,
                'body' =>  auth()->user()->name .' assigned '. $taskTitle->title .' to '.$user->name

            ];

            \Mail::to($projectTeam->email)->send(new \App\Mail\MyEmail($details));
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
        $this->projectId         = $project->id;
        $this->title             = $project->title;
        $this->client_id         = $project->client_id;
        $this->start_date        = $project->start_date;
        $this->end_date          = $project->end_date;
        $this->priority          = $project->priority;
        // $this->description       = $project->description;
        $this->team_leader       = $project->team_leader;

        $this->dispatchBrowserEvent('show-edit-project-modal');
    }
    public function changeEvent($value,$id)
    {
        Project::where('id', $id)
        ->update([
            'priority' => $value
        ]);
    }

    public function editProjectData()
    {
        //on form submit validation
        $this->validate([
            'title'     => 'required',
            'client_id' => 'required',
            'start_date'=> 'required',
            'end_date'  => 'required',
        ]);

        $project = Project::where('id', $this->projectId)->first();
        $project->title             = $this->title;
        $project->client_id         = $this->client_id ;
        $project->start_date        = $this->start_date;
        $project->end_date          = $this->end_date;
        $project->priority          = $this->priority;
        // $project->description       = $this->description;
        $project->team_leader       = $this->team_leader;
        $project->save();
        if($this->team_id!=[]) {
            $teamProject = Project::find($this->projectId);
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

            $userName = User::where('id', $team_ids)->first();
            ActivityUser::create([
                'activity_id' => $activity->id,
                'send_id' => auth()->user()->id,
                'receive_id' => $team_ids
            ]);

            $details = [
                'title' => 'Task',
                'name' => $userName->name,
                'body' => auth()->user()->name . ' Edit Project ' . $this->title,

            ];

            \Mail::to($userName->email)->send(new \App\Mail\MyEmail($details));
        }

            session()->flash('message', __('updated successfully'));

        //For hide modal after add student success
        $this->dispatchBrowserEvent('close-modal');
    }

    public function render()
    {

        $project=Project::with('ProjectImage')->find($this->projectId);
        $taskCompleteCount     = Task::where('status',1)->where('project_id',$this->projectId)->count();
        $taskNotCompleteCount  = Task::where('status',0)->where('project_id',$this->projectId)->count();
        $allTasks              = Task::where('project_id',$this->projectId)->get();
        $project_teams  = ProjectTeam::where('project_id',$this->projectId)->get();
        return view('livewire.project-details-component',['project'=>$project,'taskCompleteCount'=>$taskCompleteCount,'taskNotCompleteCount'=>$taskNotCompleteCount,'allTasks'=>$allTasks,'project_teams'=>$project_teams])->layout('livewire.layouts.base');
    }
}
