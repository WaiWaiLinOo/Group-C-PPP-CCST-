@extends('layouts.app')


@section('content')


@if (count($errors) > 0)
<div class="alert alert-danger">
  <strong>Whoops!</strong> There were some problems with your input.<br><br>
  <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif
<div class="adduser">
<div class="cardHeader">
    Create New Role
</div>
{!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}
<div class="register-form">
    <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="form-group">
        <strong>Name:</strong>
        {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
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
</div>
{!! Form::close() !!}
</div>
@endsection
