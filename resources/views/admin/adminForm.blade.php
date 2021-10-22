@csrf

<div class="form-group row">
    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

    <div class="col-md-6">
        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }} @isset($user) {{ $user->name }} @endisset" required autocomplete="name" autofocus>

        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

    <div class="col-md-6">
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }} @isset($user) {{ $user->email }} @endisset" required autocomplete="email">

        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>



<div class="mb-3">
@foreach($roles as $role)
<div class="form-check">
    <input class="form-check-input" name="roles[]"
    type="checkbox" value="{{$role->id}}" id="{{$role->name}}"
    @isset($user) @if(in_array($role->id,$user->roles->pluck('id')->toArray())) checked  @endif @endisset>
    <label class="form-check-label" for="{{$role->name}}">
    {{$role->name}}  
 </label>
 </div>
@endforeach
</div>
<button type="submit" class="btn btn-primary">
            изменить
        </button>
   
</div>