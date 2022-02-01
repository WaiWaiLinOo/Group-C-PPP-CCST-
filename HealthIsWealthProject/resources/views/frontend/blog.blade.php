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
      <a href="#" class="icon">
        <i class="far fa-comment"></i>
        <span>({{ count($item->comments) }})</span>
      </a>
    <span title="Likes" id="saveLikeDislike" data-type="like" data-post="{{ $item->id}}" class="mr-2 btn btn-sm btn-outline-primary d-inline font-weight-bold">
        Like
        <span class="like-count">{{ $item->likes() }}</span>
    </span>
    <span title="Dislikes" id="saveLikeDislike" data-type="dislike" data-type="dislike" data-post="{{ $item->id}}" class="mr-2 btn btn-sm btn-outline-danger d-inline font-weight-bold">
        Dislike
        <span class="dislike-count">{{ $item->dislikes() }}</span>
    </span>

    </div>
  </div>
  @endforeach
</div>

@endsection
@section('script')

<script>
    $(document).ready(function () {
    $.ajaxSetup({
        headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
     });

$('#saveLikeDislike').click(function(){
    var _post=$(this).data('post');
    var _type=$(this).data('type');
    var vm = $(this);
    // Run Ajax
    $.ajax({
        url:"{{url('save-likedislike')}}",
        type:"post",
        dataType: 'json',
        data: {
            post:_post,
            type:_type,
            _token:"{{ csrf_token() }}"
        },
        beforeSend:function(){
            vm.addClass('disabled');
        },
        success:function(res){
            if(res.bool==true){
                vm.removeClass('disabled').addClass('active');
                vm.removeAttr('id');
                var _prevCount=$("."+_type+"-count").text();
                _prevCount++;
                $("."+_type+"-count").text(_prevCount);
            }
        }
    })
    });
});
</script>
@endsection
