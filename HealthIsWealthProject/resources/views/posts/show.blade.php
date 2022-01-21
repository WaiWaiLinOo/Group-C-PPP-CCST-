@extends('layouts.app')
@section('content')
<div class="row">
  @if ($message = Session::get('success'))
  <div class="alert alert-success">
    <p>{{ $message }}</p>
  </div>
  @endif
  @if ($message = Session::get('error'))
  <div class="alert alert-danger">
    <p>{{ $message }}</p>
  </div>
  @endif


  <div class="col-lg-12 margin-tb">
    <div class="pull-left">
      <h2> Show Post</h2>
    </div>
  </div>
</div>
<div class="adduser" style="margin-top: 20px">
  <div class="cardHeader">
    {{ $post->post_name }}
  </div>
  <div class="register-form">
    <img src="{{ asset('post_img/' . $post->post_img) }}" class="post_img" style="width: 500px;margin-top:20px; height:auto;" />
    <span>Details</span><br>
    {{ $post->detail }}<br>
    <a href="{{ route('posts.index') }}"><button class="button-secondary">Back</button></a>
  </div>
</div>

@endsection