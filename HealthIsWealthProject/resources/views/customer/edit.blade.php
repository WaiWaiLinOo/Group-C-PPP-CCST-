@extends('frontend.app')
@section('content')
<div class="register">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
  @endif
  <div class="cardHeader">Edit User Role</div>
  <div class="editform">
    <form method="POST" action="{{ route('customers.update',$datas['user']->id) }}" enctype="multipart/form-data">
      @csrf
      @method ('PUT')
      <div class="form-group">
        <label for="user_name">Name : </label>
        <input type="text" class="form-control" name="user_name" id="user_name" value="{{ $datas['user']->user_name }}" disabled>
      </div>
      <div class="form-group">
        <label for="email">Email :</label>
        <input type="email" class="form-control" value="{{ $datas['user']->email }}" name="email" id="email" disabled>
      </div>
      <div class="form-group">
        <label for="email">Certificate :</label>
        @if($datas['user']->certificate)
        <i class="fas fa-check-square b-color icon-size"></i>
       @endif
      </div>
      <div class="form-group">
        <label for="date"> Date Of Birth :</label>
        <input type="date" placeholder="Date Of Birth" class="form-control" id="dob" name="dob" value="{{ $datas['user']->dob }}" disabled>
      </div>
      <div class="form-group">
        <label for="address"> Address :</label>
        <input type="address" class="form-control" id="address" name="address" value="{{ $datas['user']->address }}" disabled>
      </div>
      <div class="form-group">
        <strong>Role:</strong>
        {!! Form::select('roles[]', $roles = $datas['roles'],$userRole = $datas['userRole'], array('class' => 'form-control','name'=>'roles')) !!}
      </div>
      <button type="submit" class="btns">Update</button>
      <div class="create-categories">
        <a href="{{route('customers.index')}}"><i class="fas fa-arrow-circle-left"></i></a>
      </div>
    </form>
  </div>
</div>
@endsection
