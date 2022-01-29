@extends('frontend.app')
@section('content')
<div class="adduser">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
  @endif
  <div class="cardHeader">Add User</div>
  <form class="register-form" method="POST" action="{{ route('customers.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="registerform">
      <div class="form-group">
        <label for="name">Name : </label>
        <input type="text" class="form-control" name="user_name" id="user_name" value="{{ old('user_name') }}" autofocus>
      </div>
      <div class="form-group">
        <label for="email">Email :</label>
        <input type="email" class="form-control" value="{{ old('email') }}" name="email" id="email">
      </div>
      <div class="form-group">
        <label for="password">Password : </label>
        <input type="password" class="form-control" name="password" value="{{ old('password') }}" id="password">
      </div>
      <div class="form-group">
        <strong>Confirm Password:</strong>
         {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control','name'=>'password','value'=>'old(password)')) !!}
        </div>
      <div class="form-group mb-3 profile">
        <label for="profile">User Profile</label>
        (<small class="text-danger">*We only accept jpeg png gif jpg format</small>)
        <input type="file" placeholder="User Profile" value="{{ old('profile') }}" name="profile" id="profile" accept="image/png, image/gif, image/jpeg">
      </div>
      <div class="certificate">
        <label for="text" class="form-label">*option(if you have certificate)</label>
        <input type="file" placeholder="Certificate" id="certificate" name="certificate">
      </div>
      <div class="form-group">
        <label for="date"> Date Of Birth :</label>
        <input type="date" placeholder="Date Of Birth" class="form-control" id="dob" name="dob" value="{{ old('dob') }}">
      </div>
      <div class="form-group">
        <label for="address"> Address :</label>
        <input type="address" class="form-control" id="address" name="address" value="{{ old('address') }}">
      </div>
      <div class="form-group">
        <div class="form-group">
          <strong>Role:</strong>
          {!! Form::select('roles[]', $roles,[], array('class' => 'form-control','name'=>'roles','multiple')) !!}
        </div>
      </div>
      <button type="submit" class="button-secondary">Register</button>
      <div class="create-categories">
        <a href="{{route('customers.index')}}">User list <span>&#8594;</span></a>

      </div>
    </div>
  </form>
</div>
@endsection
