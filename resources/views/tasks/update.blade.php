@extends('layouts.app')
      @section('content')
      @include('tasks.errors')
      <div class="container">
        <h3>Добавить запись  </h3>
 
        @foreach ($tasks as $task)
        <form action="{{ url('storeUpdate/'.$task->id) }}" method="POST">
        @endforeach
      <input type="hidden" name="_method" value="PUT">
     {{ csrf_field() }}
      <div class="form-group">
     
        <input type="text" value="{{$task->name}}" class="form-control" id="taskTitle"  name="name" >
      </div>
     
      @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
      @endif
      <button type="submit" class="btn btn-success">Изменить</button>
    </form>

    
          
            </form>
            
   
@endsection