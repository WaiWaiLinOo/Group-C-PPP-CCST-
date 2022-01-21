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
    <div class="pull-right">
      <a class="btn btn-primary" href="{{ route('posts.index') }}"> Back</a>
    </div>
  </div>
</div>


<div class="row">
  <div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
      <strong>Name:</strong>
      {{ $post->post_name }}
    </div>
  </div>
  <div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
      <strong>Details:</strong>
      {{ $post->detail }}
    </div>
  </div>
</div>

<ul class="list-group mb-2">
  <li class="list-group-item active">
    <b>Comments ({{ count($product->comments) }})</b>
  </li>
  @foreach($product->comments as $comment)
  <li class="list-group-item">
    <a href="{{ route('commentDelete',$comment->id) }}" class="btn btn-danger">Comment delete
    </a>
    {{ $comment->content }}
    <div class="small mt-2">
      By <b>{{ $comment->user->name }}</b>,
      {{ $comment->created_at->diffForHumans() }}
    </div>
  </li>
  @endforeach
</ul>
@auth
<form action="{{ url('/comments/add') }}" method="post">
  @csrf
  <input type="hidden" name="product_id" value="{{ $product->id }}">
  <textarea name="content" class="form-control mb-2" placeholder="New Comment"></textarea>
  <input type="submit" value="Add Comment" class="btn btn-secondary">
</form>
@endauth
@endsection
<p class="text-center text-primary"><small>Tutorial by ItSolutionStuff.com</small></p>