@extends('layouts.app')
@section('content')
<div class="content">
  <div class="imageshow">
    <div class="imgprofile">
      <img src="{{asset($data->profile)}}" alt=""><br><br>
      <span>Name : {{$data->name}}</span>
      <span>Email : {{$data->email}}</span>
      <span>Certificate : {{$data->certificate}}</span>
      <span>Date Of Birth : {{$data->dob}}</span>
      <span>Address : {{$data->address}}</span>
      <a href="{{route('profileView',$data->id)}}"><button>Edit</button></a>
      <a href="{{route('home')}}"><button class="cancel">Cancel</button></a>
    </div>

  </div>
</div>
@endsection