@extends('layouts.app')
@section('content')
<div class="adduser">
  <div class="cardHeader">Add User</div>
  <form class="register-form" method="POST" action="{{ route('registeruser') }}" enctype="multipart/form-data">
    @csrf
    <div class="registerform">
      <div class="form-group">
        <label for="name">Name : </label>
        <input type="text" class="form-control" name="user_name" id="user_name" value="{{ old('user_name') }}" autofocus>
        @if ($errors->has('user_name'))
        <span class="text-danger">{{ $errors->first('user_name') }}</span>
        @endif
      </div>
      <div class="form-group">
        <label for="email">Email :</label>
        <input type="email" class="form-control" value="{{ old('email') }}" name="email" id="email">
        @if ($errors->has('email'))
        <span class="text-danger">{{ $errors->first('email') }}</span>
        @endif
      </div>
      <div class="form-group">
        <label for="password">Password : </label>
        <input type="password" class="form-control" name="password" value="{{ old('password') }}" id="password">
        @if ($errors->has('password'))
        <span class="text-danger">{{ $errors->first('password') }}</span>
        @endif
      </div>
      <div class="form-group mb-3 profile">
        <label for="profile">User Profile</label>
        (<small class="text-danger">*We only accept jpeg png gif jpg format</small>)
        <input type="file" placeholder="User Profile" value="{{ old('profile') }}" name="profile" id="profile" accept="image/png, image/gif, image/jpeg">
        @if ($errors->has('profile'))
        <span class="text-danger">{{ $errors->first('profile') }}</span>
        @endif
      </div>
      <div class="certificate">
        <label for="text" class="form-label">*option(if you have certificate)</label>
        <input type="file" placeholder="Certificate" id="certificate" name="certificate">
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
        <input type="address" class="form-control" id="address" name="address" value="{{ old('address') }}">
        @if ($errors->has('address'))
        <span class="text-danger">{{ $errors->first('address') }}</span>
        @endif
      </div>
      <input type="hidden" name="role" value="User">
     <button type="submit" class="button-secondary pure-button">Register</button>
    </div>
  </form>
</div>
@endsection
