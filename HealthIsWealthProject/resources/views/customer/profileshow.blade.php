@extends('frontend.app')
@section('content')
<div class="adduser">
    <div class="cardHeader">Profile</div>
    <div class="imgprofile">
        <div class="img">
            @if($data->profile)
            <img src="{{asset($data->profile)}}" alt="">
            @endif
            @if($data->profile == '')
            <img src="{{ asset('sample/profile.png') }}" alt="">
            @endif
        </div>
        <div class="info">
            <span>Name : {{$data->user_name}}</span>
            <span>Email : {{$data->email}}</span>
            @if($data->certificate)
            <span>Certificate : <i class="fas fa-check-square b-color"></i></span>
            @endif
            <span>Date Of Birth : {{$data->dob}}</span>
            <span>Address : {{$data->address}}</span>
            <a href="{{route('profileView',$data->id)}}">Edit</a>
        </div>
    </div>
</div>

@endsection