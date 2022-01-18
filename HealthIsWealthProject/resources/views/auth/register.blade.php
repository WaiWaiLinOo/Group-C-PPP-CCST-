@extends('layouts.app')
@section('content')
<div class="adduser">
    <div class="cardHeader">Add User</div>
    <form method="POST" action="{{ route('registeruser') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <input type="text" placeholder="Name" class="form-control" name="name" id="name" value="{{ old('name') }}" autofocus>
            @if ($errors->has('name'))
            <span class="text-danger">{{ $errors->first('name') }}</span>
            @endif
        </div>
        <div class="form-group">

            <input type="email" placeholder="Email" class="form-control" value="{{ old('email') }}" name="email" id="email">
            @if ($errors->has('email'))
            <span class="text-danger">{{ $errors->first('email') }}</span>
            @endif
        </div>
        <div class="form-group">
            <input type="password" placeholder="Password" class="form-control" name="password" value="{{ old('password') }}" id="password">
            @if ($errors->has('password'))
            <span class="text-danger">{{ $errors->first('password') }}</span>
            @endif
        </div>
        <div class="form-group">
            (<small class="text-danger">* jpeg|png|gif|jpg</small>)
            <input type="file" placeholder="User Profile" class="form-control" value="{{ old('profile') }}" name="profile" id="profile" accept="image/png, image/gif, image/jpeg">
            @if ($errors->has('profile'))
            <span class="text-danger">{{ $errors->first('profile') }}</span>
            @endif
        </div>
        <label for="text" class="form-label">*option(if you have certificate)</label>

        <div class="form-group">
            <input type="file" placeholder="Certificate" class="form-control" id="certificate" name="certificate">
        </div>
        <div class="form-group">
            <input type="date" placeholder="Date Of Birth" class="form-control" id="dob" name="dob" value="{{ old('dob') }}">
            @if ($errors->has('dob'))
            <span class="text-danger">{{ $errors->first('dob') }}</span>
            @endif
        </div>
        <div class="form-group">
            <input type="address" placeholder="Address" class="form-control" id="address" name="address" value="{{ old('address') }}">
            @if ($errors->has('address'))
            <span class="text-danger">{{ $errors->first('address') }}</span>
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Register</button>
    </form>
</div>
@endsection