@extends('frontend.app')
@section('content')
<div class="register">
  <div class="cardHeader">Add User</div>
  <form method="POST" action="{{ route('customers.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="editform">
      <div class="form-group">
        <label for="name">Name : </label>
        <input type="text" placeholder="Enter Name" class="form-control" name="user_name" id="user_name" value="{{ old('user_name') }}" autofocus>
        @if ($errors->has('user_name'))
        <span class="text-danger">{{ $errors->first('user_name') }}</span>
        @endif
      </div>
      <div class="form-group">
        <label for="email">Email :</label>
        <input type="email" placeholder="Enter Email" class="form-control" value="{{ old('email') }}" name="email" id="email">
        @if ($errors->has('email'))
        <span class="text-danger">{{ $errors->first('email') }}</span>
        @endif
      </div>
      <div class="form-group">
        <label for="password">Password : </label>
        <input type="password" placeholder="Enter Password" class="form-control" name="password" value="{{ old('password') }}" id="password">
        @if ($errors->has('password'))
        <span class="text-danger">{{ $errors->first('password') }}</span>
        @endif
      </div>
      <div class="form-group">
        <strong>Confirm Password:</strong>
         {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control','name'=>'password','value'=>'old(password)')) !!}
         @if ($errors->has('password'))
         <span class="text-danger">{{ $errors->first('password') }}</span>
         @endif
      </div>
      <div class="form-group">
        <label for="date"> Date Of Birth :</label>
        <input type="date" placeholder="Date Of Birth" class="form-control" id="dob" name="dob" value="{{ old('dob') }}">
        @if ($errors->has('dob'))
        <span class="text-danger">{{ $errors->first('dob') }}</span>
        @endif
      </div>
      <div class="form-group">
        <label for="address"> Address :</label>
        <input type="address" placeholder="Enter Address" class="form-control" id="address" name="address" value="{{ old('address') }}">
        @if ($errors->has('address'))
        <span class="text-danger">{{ $errors->first('address') }}</span>
        @endif
      </div>
      <div class="form-group">
        <div class="form-group">
          <strong>Role:</strong>
          {!! Form::select('roles[]', $roles,[], array('class' => 'form-control','name'=>'roles','multiple')) !!}
        </div>
      </div>
      <button type="submit" class="btns">Create</button>
      <div class="create-categories">
        <a href="{{route('customers.index')}}"><i class="fas fa-arrow-circle-left"></i></a>
      </div>
    </div>
  </form>
</div>
@endsection
