@extends('frontend.app')
@section('content')
<div class="register">
  <div class="cardHeader">
    <div class="create">
      <h2>Post Lists</h2>
      @can('post-create')
      <a href="{{ route('posts.create') }}"><i class="fas fa-plus-square"></i> New Post</a>
      <a class="js-open-modal" href="#" data-modal-id="popup1"><i class="fas fa-cloud-upload-alt"></i> Import excel file</a>
      @role('Admin')
      <a href="/graph"><i class="fas fa-chart-bar"></i> Graph</a>
      @endrole
      @endcan
    </div>

  </div>
  <table class="table" id="first">
    <thead>
      <th>No</th>
      <th>Name</th>
      <th>Post image</th>
      <th>Details</th>
      <th>Categories</th>
      <th>Comment No</th>
      <th>Action</th>
    </thead>

    <tbody>
      @forelse ($posts as $key => $post)
      <tr>
        <td>{{ ++$i }}</td>
        <td>{{ substr($post->post_name,0,10)}} ...</td>
        <td>
          @if($post->post_img)
          <img src="{{ asset($post->post_img) }}" class="post_img" id="myImg"/>
          @endif
        </td>
        <td>{{substr($post->detail,0,10) }} ...</td>
        <td>{{$post->Category->name}}</td>
        <td><b>Comments ({{ count($post->comments) }})</b></td>
        <td>
          <a href="{{ route('postdetail',$post->id) }}" class="g-color"><i class="fas fa-eye"></i>Show</a>
          @can('post-edit')
          <a class="edit-r" href="{{ route('posts.edit',$post->id) }}" class="b-color"><i class="fas fa-edit"></i>Edit</a>
          @endcan
          @can('post-delete')

          <a href="#" onclick="return confirm('Are you sure you want to delete this post!')" class="r-color">
            <i class="fas fa-trash-alt">
              {!! Form::open(['method' => 'DELETE','route' => ['posts.destroy', $post->id],'style'=>'display:inline;']) !!}
              {!! Form::submit('Delete', ['class' => 'r-color']) !!}
              {!! Form::close() !!}
            </i>
          </a>
          @endcan
        </td>
      </tr>
      @empty
      <td colspan="5" style="text-align: center;"><b>Sorry, currently there is no Post table related to that search!</b></td>
      @endforelse
    </tbody>
  </table>
  <div id="popup1" class="modal-box">
    <header id="close"> <a href="#" class="js-modal-close close">×</a>
      <h3>Import Post Data</h3>
    </header>
    <div class="modal-body margin-top">
      <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data" class="register-form">
        @csrf
        <input type="file" name="file" class="form-control" accept=".xls,.xlsx" required class="modal" class="profile">
        <br>
        <button class="button-secondary-modal" style="width: 200px">Upload</button>
        Sample excel file. <a href="{{ asset('sample/sample_post.xlsx') }}">Download Now!</a>
      </form>
    </div>
  </div>
    <div id="myModal" class="modal">
            <span class="close">&times;</span>
            <img class="modal-content" id="img01">
            <div id="caption"></div>
        </div>
  {{--{!! $posts->render() !!}--}}
</div>
@endsection
