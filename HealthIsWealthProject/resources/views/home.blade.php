@extends('layouts.app')

@section('content')

<div class="content">
    @foreach ($posts as $post)
    <div class="responsive">
        <div class="gallery">
          <a target="_blank" href="img_5terre.jpg">
            <img src="{{asset('post_img/'.$post->post_img)}}" alt="Cinque Terre" width="600px" height="300px">
          </a>
          <div class="desc">
              <a href="{{route('postdetail',$post->id)}}">Detail Here</a><br>
             <span style="margin-left: 10px; font-size:10px;">Posted at {{ $post->created_at->diffForHumans() }}</span>

          </div>
        </div>
      </div>

    @endforeach

@endsection
