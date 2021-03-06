@extends('frontend.app')
@section('content')
<div class="posts-container">
  @foreach ($posts as $item)
  <div class="post">
    @if($item->post_img)
    <a target="_blank" href="img_5terre.jpg">
      <img src="{{asset($item->post_img)}}" class="image">
    </a>
    <div class="date">
      <i class="far fa-clock"></i>
      <span>{{ date('M-d-Y', strtotime($item->created_at)) }}</span>
    </div>
    @endif
    <h3 class="title" style="display:inline-block;">{{$item->post_name}}
      <span class="date">({{$item->Category->name}})</span>
    </h3>
    @if($item->post_img == '')
    <div class="date">
      <i class="far fa-clock"></i>
      <span>{{ date('M-d-Y', strtotime($item->created_at)) }}</span>
    </div>
    @endif
    <p class="text">{{$item->detail}}<a href="{{route('postdetail',$item->id)}}">Detail Here</a></p>
    <div class="links">
      <a href="#" class="user">
        <i class="far fa-user"></i>
        <span>by {{$item->user->user_name}}</span>
      </a>
      <a href="{{route('postdetail',$item->id)}}" class="icon">
        <i class="far fa-comment"></i>
        <span>({{ count($item->comments) }})</span>
      </a>
    </div>
  </div>
  @endforeach
  {{ $posts->links() }}
</div>
@endsection