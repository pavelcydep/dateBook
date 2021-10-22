<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Task;
use Illuminate\Http\Request;
use  Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;
class AdminController extends Controller
{

    use HasRoles;

    public function getUsersAdmin()
{
  return view('admin.users', [
    'users'=>User::all()
   ]);
  }

  public function createAdmin()
  {
    
      return view('admin.createAdmin');
  }



  public function storeAdmin(Request $request)
  {
  ($request->all());
  Task::create($request->all());
  return redirect('/admin');
  }
  //изменяю права пользователя
  public function editUsersAdmin($id)
  {
     
      return view('admin.editUser', [
       'roles'=>Role::all(),
       'user'=>User::find($id)
      ]);
    }

   

    public function storeUpdateAdmin(Request $request,$id)
    {
      $user=User::findOrfail($id);
      $user->update($request->except(['_token','roles']));
      $user->roles()->sync($request->roles);
    return redirect('/users');
    }




public function getTasksCompleted()
{
$tasks = Task::where('completed',1)
  ->orderBy('created_at', 'asc')
  ->get();
 
    return view('admin.taskCompleted', [
      'tasks' => $tasks
    ]);
  }

  public function getTasksActive()
  {
$tasks = Task::where('active',1)
    ->orderBy('created_at', 'asc')
    ->get();
      return view('admin.taskActive', [
        'tasks' => $tasks
      ]);
    }

    public function deleteAdmin(Task $task) {
        $task->delete();
      return redirect('/admin');
      }


}