<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\User;
use Illuminate\Foundation\Validation\ValidatesRequests;
use  App\Http\Requests\createTaskRequest;
use App\Providers;
use App\Repositories\TaskRepository;
use Illuminate\Database\Eloquent\Collection;
use  Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;

class TaskController extends Controller

{
  use ValidatesRequests, HasRoles;


  protected $tasks;

  public function __construct(TaskRepository $tasks)
  {
    $this->middleware('auth');

    $this->tasks = $tasks;
  }

  public function getTasks(Request $request)
  {
    return view('tasks.index', [
      'tasks' => $this->tasks->forUser($request->user()),
    ]);
  }


  public function getTasksAdmin()
  {


    $tasks = Task::orderBy('created_at', 'asc')->get();
    return view('admin.admin', [
      'tasks' => $tasks
    ]);
  }

  public function store(Request $request)
  {
    $this->validate($request, [
      'name' => 'required|max:255',
    ]);

    $request->user()->tasks()->create([
      'name' => $request->name,

    ]);
    return redirect('/');
  }

  public function create()
  {
    return view('tasks.create');
  }

  public function update($id)
  {
    $tasks = Task::orderBy('created_at', 'asc')->get();
    $task = Task::findOrFail($id);

    return view('tasks.update', ['tasks' => $tasks]);
  }
  //изменяю запись
  public function storeUpdate(Request $request, $id)
  {
    $task = Task::findOrFail($id);
    $task->name = $request->name;

    $task->update(['id' => $task->id]);

    return redirect('/admin');
  }

  public function edit($id)
  {
    $task = Task::find($id);

    return view('tasks.index', ['tasks' => $task]);
  }



  public function delete(Task $task)
  {
    $task->delete();

    return redirect('/');
  }

  public function updateTaskStatusActive(Request $request, $id)
  {
    $task = Task::findOrFail($id);


    $task->active = $request->active;

    $task->update(['active' => $task->active]);

    return redirect('/');
  }

  public function updateTaskStatusCompleted(Request $request, $id)
  {
    $task = Task::findOrFail($id);


    $task->completed = $request->completed;

    $task->update(['completed' => $task->completed]);

    return redirect('/');
  }
}
