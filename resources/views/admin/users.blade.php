@extends('layouts.app')
      @section('content')
      <div class="container">
        <h3>Пользователи</h3>
        <div class="btn-group me-2">
        <a href="{{route('admin.admin')}}" class="btn btn-success">Все задачи</a>
        </div>
        <div class="btn-group me-2">
        <a href="{{route('admin.taskCompleted')}}" class="btn btn-success">Выполненные задачи</a>
        </div>
        <div class="btn-group me-2">
        <a href="{{route('admin.taskActive')}}" class="btn btn-success">Задачи в работе</a>
        </div>
    <table class="table">
  <thead>
    <tr>
      <td>ID</td>
      <td>Имя</td>
      <td>Запись</td>
    </tr>
  </thead>
  <tbody>
  @foreach (
    $users as $user)
    <tr>
    
    
      <td>{{  $user->id}}</td>
      <td>{{ $user->name}}</td>
      <td>{{ $user->email}}</td>
      <td>
     <div class="btn-group me-2">
 
<a href="{{url('editUser/'.$user->id)}}">
<button  class="btn btn-success">Статус</button>
</a>
</div>
<div class="btn-group me-2">
      <form action="{{ url('users/'.$user->id) }}" method="POST">
            {!! csrf_field() !!}
            {!! method_field('DELETE') !!}

            <button  class="btn btn-danger">Удалить</button>
</div>
            
        </form>
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
 
