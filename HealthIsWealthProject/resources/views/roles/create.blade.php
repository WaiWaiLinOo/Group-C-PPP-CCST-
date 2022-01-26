@extends('layouts.app')


@section('content')
<div class="adduser">
<div class="cardHeader">
    Create New Role
</div>
{!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}
<div class="register-form">
    <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="form-group">
        <label for="name"> Name : </label>
        <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" autofocus>
        @if ($errors->has('name'))
        <span class="text-danger">{{ $errors->first('name') }}</span>
        @endif
      </div>
    </div>
    <div class="permission">
        <div class="col-xs-12 col-sm-12 col-md-12 ">
          <div class="form-group">
            <strong>Permission:</strong>
            <br />
            @foreach($permission as $value)
            <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
              {{ $value->name }}</label>
            <br />
            @endforeach
          </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
    <button type="submit" class="button-secondary btnpost">Submit</button>
    </div>
    <div class="create-categories">
        <a href="{{route('roles.index')}}">Role list <span>&#8594;</span></a>

      </div>
{!! Form::close() !!}
</div>
@endsection
