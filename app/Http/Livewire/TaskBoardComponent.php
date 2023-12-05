<?php

namespace App\Http\Livewire;

use App\Models\Project;
use App\Models\ProjectTeam;
use App\Models\TaskList;
use Livewire\Component;
use App\Models\Task;
class TaskBoardComponent extends Component
{

    public  $task_id,$project,$project_teams,$name_en,$name_ar,$color,$list_edit_id,$list_delete_id,$add_task_id,$title,$priority,$due_date,
            $edit_task_id,$task_delete_id,$tasks,$userid;

    public function mount($id=null)
    {
        if($id==null) {
            if (auth()->user()->role_id == 1){
                $p = Project::first();
            }else {
                $p = Project::WhereHas('team', function ($employee) {
                    $employee->where('team_id',auth()->user()->id)->orWhere('team_leader',auth()->user()->id);
                })->first();
            }
            $id=\Crypt::encrypt($p->id);
        }

        $this->task_id        = \Crypt::decrypt($id);
        $this->project        = Project::where('id',$this->task_id)->first();
        $this->project_teams  = ProjectTeam::where('project_id',$this->task_id)->get();

    }

    public function filterTask($userid,$projectid){
        $this->userid=$userid;
        $this->projectid=$projectid;
        $this->tasks = Task::WhereHas('project', function ($query) {
            $query->where('id', $this->projectid);
        })->where('user_id',$this->userid)->get();
//        $this->render();

    }

    public function changeTaskStatus($listId,$taskId){

        Task::where('id', $taskId)
            ->update([
                'board_status' => $listId
            ]);
    }
    public function storeBoardData()

    {
        //on form submit validation
        $this->validate([
            'name_en'  => 'required',
            'name_ar'  => 'required',
            'color'  => 'required'
        ]);

        //Add Student Data
        $taskList = new TaskList();
        $taskList->name_en  = $this->name_en;
        $taskList->name_ar  = $this->name_ar;
        $taskList->color  = $this->color;
        $taskList->save();

        session()->flash('message', __('added successfully'));

        $this->name_en  = '';
        $this->name_ar  = '';
        $this->color    = '';


        //For hide modal after add student success
        $this->dispatchBrowserEvent('close-modal');
    }

    public function editBoard($id)
    {
        $taskList = TaskList::where('id', $id)->first();
        $this->list_edit_id       = $taskList->id;
        $this->name_en            = $taskList->name_en;
        $this->name_ar            = $taskList->name_ar;
        $this->color              = $taskList->color;


        $this->dispatchBrowserEvent('show-edit-board-modal');
    }


    public function editBoardData()
    {
        //on form submit validation
        $this->validate([
            'name_en'  => 'required|string',
            'name_ar'  => 'required|string',
            'color' =>'required'
        ]);

        $taskList = TaskList::where('id', $this->list_edit_id)->first();
        $taskList->name_en            = $this->name_en;
        $taskList->name_ar            = $this->name_ar;
        $taskList->color              = $this->color;
        $taskList->save();

        session()->flash('message', __('updated successfully'));

        //For hide modal after add student success
        $this->dispatchBrowserEvent('close-modal');
    }

    public function editTask($id)
    {
        $task = Task::where('id', $id)->first();
        $this->edit_task_id      = $task->id;
        $this->title             = $task->title;
        $this->priority          = $task->priority;
        $this->due_date          = $task->due_date;

        $this->dispatchBrowserEvent('show-edit-task-modal');
    }

    public function editTaskData()
    {
        //on form submit validation
        $this->validate([
            'title'  => 'required|string'
        ]);

        $task = Task::where('id', $this->edit_task_id)->first();
        $task->title            = $this->title;
        $task->priority         = $this->priority;
        $task->due_date         = $this->due_date;
        $task->save();

        session()->flash('message', __('updated successfully'));

        //For hide modal after add student success
        $this->dispatchBrowserEvent('close-modal');
    }

    public function deleteConfirmation($id)
    {
        $this->list_delete_id = $id; //student id

        $this->dispatchBrowserEvent('show-delete-confirmation-modal');
    }

    public function deleteBoardData()
    {
        $taskList = TaskList::where('id', $this->list_delete_id)->first();
        $taskList->delete();

        session()->flash('message', __('deleted successfully'));

        $this->dispatchBrowserEvent('close-modal');

        $this->list_delete_id = '';
    }

    public function cancel()
    {
        $this->list_delete_id = '';
    }

    public function deleteTask($id)
    {
        $this->task_delete_id = $id; //student id

        $this->dispatchBrowserEvent('show-delete-task-modal');
    }

    public function deleteTaskData()
    {
        $task = Task::where('id', $this->task_delete_id)->first();
        $task->delete();

        session()->flash('message', __('deleted successfully'));

        $this->dispatchBrowserEvent('close-modal');

        $this->task_delete_id = '';
    }

    public function cancelTask()
    {
        $this->task_delete_id = '';
    }

    public function addTask($id)
    {
        $this->add_task_id=$id;

        $this->dispatchBrowserEvent('show-add-task-modal');
    }

    public function addTaskData()
    {
        //on form submit validation
        $this->validate([
            'title'  => 'required|string',
        ]);

        $task = new Task();
        $task->title         = $this->title;
        $task->priority      = $this->priority;
        $task->due_date      = $this->due_date;
        $task->project_id    = $this->task_id;
        $task->board_status  = $this->add_task_id;
        $task->save();

        session()->flash('message', __('Add successfully'));

        $this->title='';
        $this->add_task_id='';
        //For hide modal after add student success
        $this->dispatchBrowserEvent('close-modal');
    }
    public function render()
    {
        if($this->userid!=null and $this->projectid!=null){
            $this->filterTask($this->userid,$this->projectid);
        }else {
            $this->tasks = Task::
            WhereHas('project', function ($query) {
                $query->where('id', $this->task_id);
            })->get();
        }
        $lists    = TaskList::all();
        $taskCompleteCount     = Task::where('status',1)->where('project_id',$this->task_id)->count();
        $taskNotCompleteCount  = Task::where('status',0)->where('project_id',$this->task_id)->count();
        return view('livewire.task-board-component',['lists'=>$lists,'tasks'=>$this->tasks,'taskCompleteCount'=>$taskCompleteCount,'taskNotCompleteCount'=>$taskNotCompleteCount])->layout('livewire.layouts.base');
    }
}
