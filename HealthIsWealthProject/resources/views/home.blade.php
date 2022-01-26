@extends('layouts.app')

@section('content')

<div class="content">
  <!--test -->
  <div class="searchbar">
    <form action="">
      <input type="text" placeholder="Search post name or detail..." name="search" />
      <button type="submit">
        <i class="fa fa-search">Search</i>
      </button>
    </form>
  </div>
  <div class="categories">
    <ul>
      @foreach ($categories as $category)
      <li><a href="{{route('homeside', ['category' => $category->name ])}}">{{ $category->name }}</a></li>
      @endforeach
    </ul>
  </div>
  @foreach ($posts as $post)
  <div class="responsive">
    <div class="gallery">
      @if($post->post_img)
      <a target="_blank" href="img_5terre.jpg">
        <img src="{{asset($post->post_img)}}" width="600px" height="300px">
      </a>
      @endif
      <div class="desc">
        <span>{{$post->post_name}}</span><br>
        <a href="{{route('postdetail',$post->id)}}">Detail Here</a><br>
        <span style="margin-left: 10px; font-size:10px;">Posted at {{ $post->created_at->diffForHumans() }}</span>

      </div>
    </div>
  </div>

  @endforeach

  @endsection