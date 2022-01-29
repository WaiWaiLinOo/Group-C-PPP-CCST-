@extends('frontend.app')
@section('content')
<div class="register">
  <div class="cardHeader">Edit Profile</div>
  <form method="POST" action="{{ route('profileUpdate',$datas['user']->id) }}" enctype="multipart/form-data" class="d-flex">
    @csrf
    @method ('PUT')
    <div class="user-profile">
      <div>
        @if($datas['user']->profile)
        <img src="{{asset($datas['user']->profile)}}" alt="">
        <i class="fas fa-edit b-color icon-size"></i>
        @endif
        @if($datas['user']->profile == '')
        <img src="{{ asset('sample/profile.png') }}" alt="">
        <i class="fas fa-edit b-color icon-size"></i>
        @endif
        <input type="file" placeholder="User Profile" name="profile" id="profile" accept="image/png, image/gif, image/jpeg">
      </div>
      (<small class="text-danger">*We only accept jpeg png gif jpg format</small>)
    </div>
    <div class="editform">
      <div class="form-group">
        <label for="name">Name : </label>
        <input type="text" class="form-control" name="user_name" id="user_name" value="{{ $datas['user']->user_name }}">
        @if ($errors->has('user_name'))
        <span class="text-danger">{{ $errors->first('user_name') }}</span>
        @endif
      </div>
      <div class="form-group">
        <label for="email">Email :</label>
        <input type="email" class="form-control" value="{{ $datas['user']->email }}" name="email" id="email">
        @if ($errors->has('email'))
        <span class="text-danger">{{ $errors->first('email') }}</span>
        @endif
      </div>
      <div class="form-group">
        <label for="date"> Date Of Birth :</label>
        <input type="date" placeholder="Date Of Birth" class="form-control" id="dob" name="dob" value="{{ $datas['user']->dob }}">
        @if ($errors->has('dob'))
        <span class="text-danger">{{ $errors->first('dob') }}</span>
        @endif
      </div>
      <div class="form-group">
        <label for="address"> Address :</label>
        <input type="address" class="form-control" id="address" name="address" value="{{ $datas['user']->address }}">
        @if ($errors->has('address'))
        <span class="text-danger">{{ $errors->first('address') }}</span>
        @endif
      </div>
      <div class="form-group mb-3 profile p-relative">
        <label for="profile">Certificate:</label> 
        @if($datas['user']->certificate)
        <i class="fas fa-check-square b-color icon-size" title="choose certificate"></i>
        @endif
        <input type="file" placeholder="User certificate" name="certificate" id="certificate" accept="image/png, image/gif, image/jpeg" class="p-absolute">
      </div>
      <div class="form-group">
        <label for="address"> Type :</label>
        <input type="text" class="form-control" id="type" name="type" value="@foreach($datas['userRole'] as $role) {{$role}} @endforeach" disabled>
        @if ($errors->has('address'))
        <span class="text-danger">{{ $errors->first('address') }}</span>
        @endif
      </div>
      <button type="submit" class="btns">Update</button>
      
      <div class="create-categories">
        <a href="{{ route('profileshows', Auth::user()->id) }}"><i class="fas fa-arrow-circle-left"></i></a>

      </div>
    </div>
  </form>
</div>
@endsection
