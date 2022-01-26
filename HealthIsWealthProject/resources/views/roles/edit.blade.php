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
<div class="cardHeader">Edit Role</div>
{!! Form::model($role = $datas['role'], ['method' => 'PATCH','route' => ['roles.update', $role->id]]) !!}
<div class="register-form">
    <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="form-group">
        <strong>Name:</strong>
        {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
      </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 permission">
      <div class="form-group">
        <strong>Permission:</strong>
        <br />
        @foreach($permission = $datas['permission'] as $value)
        <label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions = $datas['rolePermission']) ? true : false, array('class' => 'name')) }}
          {{ $value->name }}</label>
        <br />
        @endforeach
      </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
      <button type="submit" class="button-secondary btnpost">Update</button>
    </div>
</div>
<div class="create-categories">
    <a href="{{route('roles.index')}}">Role list <span>&#8594;</span></a>

  </div>
{!! Form::close() !!}
</div>

@endsection
