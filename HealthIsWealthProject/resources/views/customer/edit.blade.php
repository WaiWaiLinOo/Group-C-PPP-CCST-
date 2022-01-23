@extends('layouts.app')
@section('content')
<div class="adduser">
  <div class="cardHeader">Edit User Role</div>
    <div class="register-form">
        <form method="POST" action="{{ route('customers.update',$datas['user']->id) }}" enctype="multipart/form-data">
            @csrf
            @method ('PUT')
            <div class="form-group">
              <label for="name">Name : </label>
              <input type="text" class="form-control" name="name" id="name" value="{{ $datas['user']->name }}" disabled>
              @if ($errors->has('name'))
              <span class="text-danger">{{ $errors->first('name') }}</span>
              @endif
            </div>
            <div class="form-group">
              <label for="email">Email :</label>
              <input type="email" class="form-control" value="{{ $datas['user']->email }}" name="email" id="email" disabled>
              @if ($errors->has('email'))
              <span class="text-danger">{{ $errors->first('email') }}</span>
              @endif
            </div>
            <div class="form-group">
              <label for="email">Certificate :</label>
              @if($datas['user']->certificate)
              <input type="checkbox" checked disabled>
              @endif
            </div>
            <div class="form-group">
              <label for="date"> Date Of Birth :</label>
              <input type="date" placeholder="Date Of Birth" class="form-control" id="dob" name="dob" value="{{ $datas['user']->dob }}" disabled>
              @if ($errors->has('dob'))
              <span class="text-danger">{{ $errors->first('dob') }}</span>
              @endif
            </div>
            <div class="form-group">
              <label for="address"> Address :</label>
              <input type="address" class="form-control" id="address" name="address" value="{{ $datas['user']->address }}" disabled>
              @if ($errors->has('address'))
              <span class="text-danger">{{ $errors->first('address') }}</span>
              @endif
            </div>
            <div class="form-group">
              <strong>Role:</strong>
              {!! Form::select('roles[]', $roles = $datas['roles'],$userRole = $datas['userRole'], array('class' => 'form-control')) !!}
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
          </form>
    </div>
</div>
@endsection
