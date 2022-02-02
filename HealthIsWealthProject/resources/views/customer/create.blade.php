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
  <form method="POST" action="{{ route('customers.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="editform">
      <div class="form-group">
        <label for="name">Name : </label>
        <input type="text" placeholder="Enter Name" class="form-control" name="user_name" id="user_name" value="{{ old('user_name') }}" autofocus>
      </div>
      <div class="form-group">
        <label for="email">Email :</label>
        <input type="email" placeholder="Enter Email" class="form-control" value="{{ old('email') }}" name="email" id="email">
      </div>
      <div class="form-group">
        <label for="password">Password : </label>
        <input type="password" placeholder="Enter password" class="form-control" name="password" value="{{ old('password') }}" id="password">
      </div>
      <div class="form-group">
        <strong>Confirm Password:</strong>
         {!! Form::password('confirm-password', array('placeholder' => 'Enter Confirm Password','class' => 'form-control','name'=>'password','value'=>'old(password)')) !!}
         @if ($errors->has('password'))
         <span class="text-danger">{{ $errors->first('password') }}</span>
         @endif
      </div>
      <div class="form-group">
        <label for="date"> Date Of Birth :</label>
        <input type="date" placeholder="Date Of Birth" class="form-control" id="dob" name="dob" value="{{ old('dob') }}">
      </div>
      <div class="form-group">
        <label for="address"> Address :</label>
        <input type="address" placeholder="Enter Address" class="form-control" id="address" name="address" value="{{ old('address') }}">
      </div>
      <div class="form-group">
        <strong>Role:</strong>
        <select name="roles">
          <option>Choose Role</option>
          @foreach ($roles as $key => $value)
          <option value="{{ $key }}">
            {{ $value }}
          </option>
          @endforeach
        </select>
        <!--{!! Form::select('roles[]', $roles,[], array('class' => 'form-control','name'=>'roles')) !!}-->
      </div>
      <button type="submit" class="btns">Create</button>
      <div class="create-categories">
        <a href="{{route('customers.index')}}"><i class="fas fa-arrow-circle-left"></i></a>
      </div>
    </div>
  </form>
</div>
@endsection
