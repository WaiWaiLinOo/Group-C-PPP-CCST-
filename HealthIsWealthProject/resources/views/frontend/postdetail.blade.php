@extends('frontend.app')
@section('content')
    <div class="posts-container">
        <div class="post">

            @if ($posts->post_img)
                <a target="_blank" href="img_5terre.jpg">
                    <img src="{{ asset($posts->post_img) }}" class="image">
                </a>
                <div class="date">
                    <i class="far fa-clock"></i>
                    <span>{{ date('M-d-Y', strtotime($posts->created_at)) }}</span>
                </div>
            @endif
            <h3 class="title">{{ $posts->post_name }} <span class="date">({{$posts->Category->name}})</span></h3>
            @if($posts->post_img == '')
            <div class="date">
                    <i class="far fa-clock"></i>
                    <span>{{ date('M-d-Y', strtotime($posts->created_at)) }}</span>
                </div>
            @endif
            <p class="text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Amet, nulla maiores placeat
                voluptas tenetur aperiam sapiente natus fugit suscipit facilis nam iure. Voluptatum rerum numquam, optio
                quasi excepturi aliquid iusto!
           </p>
            <div class="links">
                <a href="#" class="user">
                    <i class="far fa-user"></i>
                    <span>by {{$posts->User->user_name}}</span>
                </a>
                <a href="{{route('home')}}" class="icon"> <i class="fas fa-arrow-circle-left"></i></a>

            </div>
            <div class="posts">
                <ul>
                    <li>
                        <b>Comments ({{ count($posts->comments) }})</b>
                    </li>
                    @foreach ($posts->comments as $comment)
                        <li class="border">
                            @if (Auth::user()->id == $comment->user_id)
                                <a href="{{ route('commentDelete', $comment->id) }}" class="x">&#x2715</a>
                            @endif

                           <span>{{ $comment->content }}</span>
                            <div class="small">
                                written by <b>{{ $comment->user->user_name }}</b>

                                <span style="float: right;" id="comment">{{ $comment->created_at->diffForHumans() }}</span>
                            </div>
                        </li>

                    @endforeach
                </ul>
                @auth
                    <form action="{{ url('/comments/add') }}" method="post">
                        @csrf
                        <input type="hidden" name="post_id" value="{{ $posts->id }}">
                        <textarea name="content"  placeholder="New Comment..."></textarea><br>
                        <input type="submit" value="Add Comment" class="btn btn-secondary">
                    </form>
                @endauth
            </div>

         </div>
    </div>

@endsection
