<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Task;
use App\Http\Controllers\TaskController;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;

class TaskController extends Controller
{
    public function index ()
    {
        $task = Task:: all();
        return response() -> json($task,200);

    }
    public function store(StoreTaskRequest $request)
    {
       $task =  Task:: create ($request ->validated());
        return response() -> json($task, 201);
        
    }
    public function update (UpdateTaskRequest $request, $id)
    {
       $task = Task::find($id);
        $task -> update ($request -> validated());
         return response() -> json($task, 201);
    }
    public function show(Request $request, $id)
    {
        $task = Task::find($id);
        return response() -> json($task, 200);

    }

     public function destroy (Request $request, $id)
    {
       $task = Task::find($id);
        $task -> delete ();
         return response() -> json(null, 204);
    }
}
 