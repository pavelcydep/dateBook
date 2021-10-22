
     @extends('layouts.app')
      @section('content')
      <div class="container">
        <h3>Все задачи</h3>
        <div class="btn-group me-2">
        <a href="{{route('admin.taskCompleted')}}" class="btn btn-success">Выполненные задачи</a>
        </div>
        <div class="btn-group me-2">
        <a href="{{route('admin.taskActive')}}" class="btn btn-success">Задачи в работе</a>
        </div>
        <div class="btn-group ">
        <a href="{{route('admin.users')}}" class="btn btn-success">Пользователи</a>
</div>
    <table class="table">
  <thead>
    <tr>
      
    <td><h2>ID</h2></td>
      <td><h2>Задача</h2></td>
      <td><h2>Действия</h2></td>
      <td><h2>Статус задачи</h2></td>
    </tr>
  </thead>
  <tbody>
  @foreach (
    $tasks as $task)
    <tr>
    
    <td>{{ $task->user_id }}</td>
      <td>{{ $task->name }}</td>
      <td>
        <div class="btn-group me-2">

      <a href="{{url('update/'.$task->id)}}">
      <i class="bi bi-pen-fill"></i>
      </a>
      </div>
      <div class="btn-group me-2">
      <form action="{{ url('admin/task/'.$task->id) }}" method="POST">
            {!! csrf_field() !!}
            {!! method_field('DELETE') !!}

            <button  class="btn btn-danger"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
  <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
</svg></button>
</div>
            
        </form>
      </td>

      <td><div class="form-check">
 <input class="form-check-input" name="completed"
 type="checkbox" value="1"  @isset($task)
  @if($task->completed!==0) checked  @endif
@endisset>
    Выполнено

 </div>
</div>

<div class="form-check">
    <input class="form-check-input" name="active"
    type="checkbox" value="1" 
    @isset($task)
  @if($task->active!==0) checked  @endif
@endisset>
 В работе
 </div></div>

</td>
<td> <div class="btn-group me-2">
        <a href="{{route('admin.createAdmin')}}" class="btn btn-success">Создать новую задачу</a>
        </div></td>

    </tr>
    @endforeach
   
  </tbody>

 

</table>




</div>
@endsection
 

 
