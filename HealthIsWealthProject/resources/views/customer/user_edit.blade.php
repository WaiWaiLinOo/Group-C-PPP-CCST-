@extends('layouts.app')
@section('content')
<div class="adduser">
    <div class="cardHeader">Edit User Role</div>
    <form method="POST" enctype="multipart/form-data" action="{{ route('user_role_update',$user->id) }}">
        @csrf
        <div class="form-group">
            <input type="text" placeholder="Name" class="form-control" name="name" id="name" value="{{ $user->name }}" disabled>
            @if ($errors->has('name'))
            <span class="text-danger">{{ $errors->first('name') }}</span>
            @endif
        </div>
        <div class="form-group">

            <input type="email" placeholder="Email" class="form-control" value="{{ $user->email }}" name="email" id="email" disabled>
            @if ($errors->has('email'))
            <span class="text-danger">{{ $errors->first('email') }}</span>
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
            <input type="date" placeholder="Date Of Birth" class="form-control" id="dob" name="dob" value="{{ $user->dob }}" disabled>
            @if ($errors->has('dob'))
            <span class="text-danger">{{ $errors->first('dob') }}</span>
            @endif
        </div>
        <div class="form-group">
            <input type="address" placeholder="Address" class="form-control" id="address" name="address" value="{{ $user->address }}" disabled>
            @if ($errors->has('address'))
            <span class="text-danger">{{ $errors->first('address') }}</span>
            @endif
        </div>
        <div class="form-group">
            <select name="type" id="type"  class="form-control">
                <option value="user">USER</option>
                <option value="admin">ADMIN</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection