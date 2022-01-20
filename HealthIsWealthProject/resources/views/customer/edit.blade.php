@extends('layouts.app')
@section('content')
<div class="adduser">
  <div class="cardHeader">Edit User Role</div>
  <form method="POST" action="{{ route('user_role_update',$user->id) }}" enctype="multipart/form-data">
    @csrf
  <div class="registerform">
    <div class="form-group">
        <label for="name">Name : </label>
        <input type="text" class="form-control" name="name" id="name" value="{{ $user->name }}" disabled>
        @if ($errors->has('name'))
        <span class="text-danger">{{ $errors->first('name') }}</span>
        @endif
      </div>
      <div class="form-group">
        <label for="email">Email :</label>
        <input type="email" class="form-control" value="{{ $user->email }}" name="email" id="email" disabled>
        @if ($errors->has('email'))
        <span class="text-danger">{{ $errors->first('email') }}</span>
        @endif
      </div>
      <div class="form-group">
        <label for="email">Certificate :</label>
        @if($user->certificate)
        <input type="checkbox" checked disabled>
        @endif
      </div>
      <div class="form-group">
        <label for="date"> Date Of Birth :</label>
        <input type="date" placeholder="Date Of Birth" class="form-control" id="dob" name="dob" value="{{ $user->dob }}" disabled>
        @if ($errors->has('dob'))
        <span class="text-danger">{{ $errors->first('dob') }}</span>
        @endif
      </div>
      <div class="form-group">
        <label for="address"> Address :</label>
        <input type="address" class="form-control" id="address" name="address" value="{{ $user->address }}" disabled>
        @if ($errors->has('address'))
        <span class="text-danger">{{ $errors->first('address') }}</span>
        @endif
      </div>
      <div class="form-group">
        <select name="type" id="type" class="form-control">
          <option value="">Admin</option>
          <option value="">Sub_admin</option>
          <option value="">user</option>
        </select>
      </div>
      <button type="submit" class="button-secondary">Update</button>
  </div>
  </form>
</div>
@endsection
