@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Форма изменений прав пользователей</h1>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>
          
                <div class="card-body">
                    <form method="POST" action="{{ url('storeUpdateAdmin', $user->id) }}">
                    <input type="hidden" name="_method" value="PUT">
                    @include('admin.adminForm')
                   
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection