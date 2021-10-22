
     @extends('layouts.app')
      @section('content')
      <div class="container">
        <h3>Мои задачи</h3>
       
    <table class="table">
  <thead>
    <tr>
     
      <td><h3>Запись</h3></td>
      <td><h3>Статус</h3></td>
    </tr>
  </thead>
  <tbody>
  @foreach (
    $tasks as $task)
    <tr>
    <td>{{ $task->name }}</td>
<td>
<div class="btn-group me-2">
      <form action="{{ url('updateTaskStatusActive/'.$task->id) }}" method="POST">
      <input type="hidden" name="_method" value="PUT">
     {{ csrf_field() }}
<div class="form-check">
    <input class="form-check-input" name="active"
    type="checkbox" value="1" 
    @isset($task)
  @if($task->active!==0) checked  @endif
@endisset>
 В работе
 </div></div>
 <button type="submit" class="btn btn-primary">
 подтвердить
        </button>
  </form>   
  
  </div>

  <div class="btn-group me-2">
<form action="{{ url('updateTaskStatusCompleted/'.$task->id) }}" method="POST">
      <input type="hidden" name="_method" value="PUT">
     {{ csrf_field() }}
<div class="form-check">
 <input class="form-check-input" name="completed"
 type="checkbox" value="1"  @isset($task)
  @if($task->completed!==0) checked  @endif
@endisset>
    Выполнено

 </div>
</div>
<button type="submit" class="btn btn-primary">
           подтвердить
        </button>
  </form>
  </div>
</td>

    </tr>
    @endforeach
   
  </tbody>

 

</table>




</div>
@endsection
 
