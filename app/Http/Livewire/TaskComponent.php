<?php

namespace App\Http\Livewire;

use App\Models\Project;
use App\Models\ProjectTeam;
use App\Models\Task;
use App\Models\TaskActivity;
use Livewire\Component;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Activites;
use App\Models\ActivityUser;
use App\Mail\MyEmail;
use Illuminate\Http\Request;

class TaskComponent extends Component
{
    public $task_id,$project_teams,$title,$task_edit_id,$tasks,$description,$created_by,$project_id,$project,$assginid;

      public  $val = 'All Tasks';
    public function mount($id=null)
    {

        if($id==null) {
            if (auth()->user()->role_id == 1){
                $this->project = Project::first();
        }else {
            $this->project = Project::WhereHas('team', function ($employee) {
                $employee->where('team_id',auth()->user()->id)->orWhere('team_leader',auth()->user()->id);
            })->first();
        }

            $id=\Crypt::encrypt($this->project->id);
        }

        $this->task_id        = \Crypt::decrypt($id);
        $this->project        = Project::where('id',$this->task_id)->first();

        $this->project_teams  = ProjectTeam::where('project_id',$this->task_id)->get();
    }

    public function deleteConfirmation($idassgin)
    {
        $this->assginid = $idassgin; //Assginid id

        $this->dispatchBrowserEvent('show-delete-confirmation-modal');
    }

    public function deleteAssign(){


        Task::where('project_id',$this->task_id)
             ->where('user_id',$this->assginid)
             ->update(['user_id' => NULL]);

            ProjectTeam::where('team_id',$this->assginid)
                         ->where('project_id',$this->task_id)
                         ->delete();

        $this->task_id        = \Crypt::encrypt($this->task_id);

          session()->flash('message', __('deleted successfully'));

           $this->dispatchBrowserEvent('close-modal');

           $this->mount($this->task_id);


    }
    public function changeEvent($value,$task){

        Task::where('id', $task)
            ->update([
                'title' => $value
            ]);
        }

    public function changeEvent1($value){

        $this->val=$value;

        if($value=='Pending Tasks') {
            $this->tasks = Task::where('status', 0)->WhereHas('project', function ($query) {
                $query->where('id', $this->task_id);
            })->get();
        }
            if($value=='Completed Tasks') {
                $this->tasks = Task::where('status', 1)->WhereHas('project', function ($query) {
                    $query->where('id', $this->task_id);
                })->get();
            }
        if($value=='All Tasks') {
            $this->tasks = Task::WhereHas('project', function ($query) {
                $query->where('id', $this->task_id);
            })->get();
        }

    }
    public function makeComplete($value,$task){

        Task::where('id', $task)
            ->update([
                'status'     => $value,
                'complete_by'=> auth()->user()->id
            ]);
        $taskTitle=Task::where('id',$task)->first();

        if($value==1) {
            $message = auth()->user()->name . ' completed  ' . $taskTitle->title . ' at ' . Carbon::now()->format('M d, Y h:i A');
        }elseif ($value==0) {
            $message = auth()->user()->name . ' marked  ' . $taskTitle->title . ' as incomplete at '.Carbon::now()->format('M d, Y h:i A');
        }
            $activity = new TaskActivity();
            $activity->project_id  = $this->task_id;
            $activity->description = $message;
            $activity->save();

        $activity = Activites::create([
            'page_name' => 'task',
            'link' => '/task/'.\Crypt::encrypt($this->task_id),
            'description' => $message,
            'description_ar' => $message

        ]);



        $projectTeams=Project::with('team')->where('id',$this->task_id)->first();

        foreach ($projectTeams->team as $projectTeam) {

            ActivityUser::create([
                'activity_id' => $activity->id,
                'send_id'     => auth()->user()->id,
                'receive_id'  => $projectTeam->id
            ]);

            $details = [
                'title' => 'Task',
                'name' => $projectTeam->name,
                'body' => $message

            ];

            \Mail::to($projectTeam->email)->send(new \App\Mail\MyEmail($details));
        }
    }
    public function assignTask($id)
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
        $activity->project_id  = $this->task_id;
        $activity->description = auth()->user()->name .' assigned '. $taskTitle->title .' to '.$user->name;
        $activity->save();

        $activity = Activites::create([
            'page_name' => 'task',
            'link' => '/task/'.\Crypt::encrypt($this->task_id."'"),
            'description' => auth()->user()->name .' assigned '. $taskTitle->title .' to '.$user->name,
            'description_ar' => auth()->user()->name .' assigned '. $taskTitle->title .' to '.$user->name

        ]);



        $projectTeams=Project::with('team')->where('id',$this->task_id)->first();

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
    public function DeleteTask($task){
        Task::where('id', $task)
            ->delete();
    }

    public function storeTaskData()
    {

        //on form submit validation
        $this->validate([
            'title'  => 'required'
        ]);

        //Add Student Data
        $task = new Task();
        $task->title      = $this->title;
        $task->project_id = $this->task_id;
        $task->status     = 0;
        $task->board_status=1;
        $task->save();

        $activity = new TaskActivity();
        $activity->project_id  = $this->task_id;
        $activity->description = auth()->user()->name .' created task '.Carbon::now()->format('M d, Y');
        $activity->save();

        $activity = Activites::create([
            'page_name' => 'task',
            'link' => '/task/'.\Crypt::encrypt($this->task_id),
            'description' => auth()->user()->name .' created task '.Carbon::now()->format('M d, Y'),
            'description_ar' => auth()->user()->name .' created task '.Carbon::now()->format('M d, Y')

        ]);



        $projectTeams=Project::with('team')->where('id',$this->task_id)->first();

        foreach ($projectTeams->team as $projectTeam) {

            ActivityUser::create([
                'activity_id' => $activity->id,
                'send_id'     => auth()->user()->id,
                'receive_id'  => $projectTeam->id
            ]);

            $details = [
                'title' => 'Task',
                'name' => $projectTeam->name,
                'body' => auth()->user()->name .' created task '.Carbon::now()->format('M d, Y')

            ];

            \Mail::to($projectTeam->email)->send(new \App\Mail\MyEmail($details));
        }

        $this->title  = '';


    }

    public function storeTaskChat(){
        $task = new TaskActivity();
        $task->description       = $this->description;
        $task->project_id        = $this->task_id;
        $task->created_by        = auth()->user()->id;

        $task->save();

        $activity = Activites::create([
            'page_name' => 'task',
            'link' => '/task/'.\Crypt::encrypt($this->task_id),
            'description' => $this->description,
            'description_ar' => $this->description

        ]);



        $projectTeams=Project::with('team')->where('id',$this->task_id)->first();

        foreach ($projectTeams->team as $projectTeam) {

            ActivityUser::create([
                'activity_id' => $activity->id,
                'send_id'     => auth()->user()->id,
                'receive_id'  => $projectTeam->id
            ]);
            $details = [
                'title' => 'Task',
                'name' => $projectTeam->name,
                'body' => $this->description

            ];

            \Mail::to($projectTeam->email)->send(new \App\Mail\MyEmail($details));
        }

        $this->description     ='';
        $this->project_id      ='';
        $this->created_by      ='';
    }

    public function render()
    {
        $this->changeEvent1($this->val);
        $activities = TaskActivity::where('project_id',$this->task_id)->orderby('created_at','asc')->get();

        return view('livewire.task-component',['activities'=>$activities])->layout('livewire.layouts.base');
    }
}
