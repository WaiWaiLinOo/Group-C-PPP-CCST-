@extends('frontend.app')
@section('content')
<div class="adduser">
  <div class="cardHeader">
    <div class="create">
      <h2>New Role</h2>
      <a href="{{ route('roles.index') }}" title="Back to role lists">Role List <i class="fas fa-list-alt"></i></a>
    </div>
  </div>
{!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}
  <div class="register-form margin-top">
      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
          <label for="name" class="label"> Name: </label>
          <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" autofocus placeholder="Enter Name">
          @if ($errors->has('name'))
          <span class="text-danger">{{ $errors->first('name') }}</span>
          @endif
        </div>
      </div>
      <div class="permission">
          <div class="col-xs-12 col-sm-12 col-md-12 ">
            <div class="form-group">
              <b class="label">Permission:</b>
              <br />
                <ul class="role-list">
                @foreach($permission as $value)
                <li>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                  {{ $value->name }}</li>
                @endforeach
              </ul>
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
