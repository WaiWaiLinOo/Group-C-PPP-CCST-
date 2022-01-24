@extends('layouts.app')
@section('content')
<a href="{{ route('homeside') }}"><button class="button-secondary" style="width: 100px;margin-bottom:29px;margin-left:229px;">Back</button></a>
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
<div class="content">
  <div class="detail">
    <div class="img">
      <p style="font-size: 30px;margin-left:0px">{{$posts->post_name}}<br></p>
      <img style="width: 500px; height:500px" src="{{asset('post_img/'. $posts->post_img)}}" alt="">
    </div>
    <div class="text">
      <span style="color:blue;">Posted at {{ $posts->created_at->diffForHumans() }}</span><br><br>
      <span style="text-indent: 20px">{{$posts->detail}}</span><br><br>
      <ul class="list-group mb-2">
        <li class="list-group-item active">
          <b>Comments ({{ count($posts->comments) }})</b>
        </li>
        @foreach($posts->comments as $comment)
        <li class="list-group-item">
          @if (Auth::user()->id == $comment->user_id)
          <a href="{{ route('commentDelete',$comment->id) }}" style="float:right;text-decoration:none;background-color:red;color:white; padding:0 5px;border-radius:5px">&#x2715</a>
          @endif
          {{ $comment->content }}
          <div class="small mt-2">
            written by <b>{{ $comment->user->name }}</b>
            <b style="float: right;">{{ $comment->created_at->diffForHumans() }}</b>
          </div>
        </li>
        @endforeach
      </ul>
      @auth
      <form action="{{ url('/comments/add') }}" method="post">
        @csrf
        <input type="hidden" name="post_id" value="{{ $posts->id }}">
        <textarea name="content" class="form-control mb-2" placeholder="New Comment..."></textarea>
        <input type="submit" value="Add Comment" class="btn btn-secondary">
    </div>
    </form>
    @endauth

  </div>
</div>
</div>
@endsection