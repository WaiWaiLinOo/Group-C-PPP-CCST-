@extends('frontend.app')
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
    <div class="create">
      <h2>Role Update</h2>
      <a href="{{ route('roles.index') }}" title="Back to role lists">Role List <i class="fas fa-list-alt"></i></a>
    </div>
  </div>
{!! Form::model($role = $datas['role'], ['method' => 'PATCH','route' => ['roles.update', $role->id]]) !!}
  <div class="register-form margin-top">
      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
        <label for="name" class="label"> Name: </label>
          {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
        </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12 permission">
        <div class="form-group">
          <b class="label">Permission:</b>
          <br />

          <ul class="role-list">
          @foreach($permission = $datas['permission'] as $value)
          <li>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions = $datas['rolePermission']) ? true : false, array('class' => 'name')) }}
            {{ $value->name }}</li>
          @endforeach
        </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="button-secondary btnpost">Update</button>
      </div>
  </div>
{!! Form::close() !!}
</div>

@endsection
