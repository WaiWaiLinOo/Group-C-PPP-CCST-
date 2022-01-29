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
    <h3 class="title" style="inline-block">{{$item->post_name}}
      <span class="date">({{$item->Category->name}})</span>
    </h3>
    @if($item->post_img == '')
    <div class="date">
      <i class="far fa-clock"></i>
      <span>{{ date('M-d-Y', strtotime($item->created_at)) }}</span>
    </div>
    @endif
    <p class="text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Amet, nulla maiores placeat voluptas tenetur aperiam sapiente natus fugit suscipit facilis nam iure. Voluptatum rerum numquam, optio quasi excepturi aliquid iusto!
      <a href="{{route('postdetail',$item->id)}}">Detail Here</a>
    </p>
    <div class="links">
      <a href="#" class="user">
        <i class="far fa-user"></i>
        <span>by {{$item->user->user_name}}</span>
      </a>
      <a href="#" class="icon">
        <i class="far fa-comment"></i>
        <span>({{ count($item->comments) }})</span>
      </a>
    </div>
  </div>
  @endforeach
</div>
@endsection