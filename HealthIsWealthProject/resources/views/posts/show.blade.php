@extends('layouts.app')
@section('content')

<a href="{{ route('posts.index') }}"><button class="button-secondary" style="width: 100px;margin-bottom:29px;margin-left:229px;">Back</button></a>
<div class="content">
<div class="detail">
    <div class="img">
        <p style="font-size: 30px;margin-left:0px">{{$post->post_name}}<br></p>
        <img src="{{asset('post_img/'. $post->post_img)}}" alt="">
    </div>
    <div class="text">
        <span style="color:blue;">Posted at {{ $post->created_at->diffForHumans() }}</span><br><br>
        <span style="text-indent: 20px" >{{$post->detail}}</span><br><br>
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
        <ul class="list-group mb-2">
          <li class="list-group-item active">
            <b>Comments ({{ count($post->comments) }})</b>
          </li>
          @foreach($post->comments as $comment)
          <li class="list-group-item">
            <a href="{{ route('commentDelete',$comment->id) }}" style="float:right;text-decoration:none">&#x2715</a>
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
          <input type="hidden" name="post_id" value="{{ $post->id }}">
          <textarea name="content" class="form-control mb-2" placeholder="New Comment..."></textarea>
          <input type="submit" value="Add Comment" class="btn btn-secondary">

        </form>
        @endauth

    </div>
    </div>
</div>
@endsection
