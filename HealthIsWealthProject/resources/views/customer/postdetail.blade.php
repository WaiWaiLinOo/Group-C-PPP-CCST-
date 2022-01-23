@extends('layouts.app')
@section('content')

<div class="detail">
    <div class="img">
        <img src="{{asset('post_img/'. $posts->post_img)}}" alt="">
    </div>
    {{--<div class="text">
        {{$post->post_name}}
    </div>--}}
    </div>

@endsection
