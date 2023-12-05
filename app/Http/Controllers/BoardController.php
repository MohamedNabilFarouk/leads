<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class BoardController extends Controller
{
    public function store($list,$task){

        Task::where('id', $task)
            ->update([
                'board_status' => $list
            ]);

        return 1;
    }
}
