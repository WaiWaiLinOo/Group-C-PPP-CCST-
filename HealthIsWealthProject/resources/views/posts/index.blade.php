@extends('layouts.app')
@section('content')
<div class="register">
    <div class="create">
        <h2>Post Management</h2>
    </div>
    <div class="create">
      @can('post-create')
      <a href="{{ route('posts.create') }}"><button>Create New Post</button></a>
      <a class="js-open-modal" href="#" data-modal-id="popup1"><button>Import excel file</button></a>
      <a href="{{ route('export') }}"><button>Export excel file</button></a>
      @role('Admin')
      <a href="/graph"><button>View Post Graph</button></a>
      @endrole
     @endcan
    </div>
<div id="popup1" class="modal-box">
  <header id="close"> <a href="#" class="js-modal-close close">×</a>
    <h3>Import Post Data</h3>
  </header>
  <div class="modal-body">
    <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <input type="file" name="file" class="form-control" accept=".xls,.xlsx" required class="modal">
      <br>
      <button class="button-secondary-modal" style="width: 200px">Upload</button>
      Sample excel file. <a href="{{ asset('sample/sample_post.xlsx') }}">Download Now!</a>
    </form>
  </div>
</div>

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
<table class="table" id="first">
    <tr>
      <th>No</th>
      <th>Name</th>
      <th>Post image</th>
      <th>Details</th>
      <th>Categories</th>
      <th>Comment Number</th>
      <th>Action</th>
    </tr>
    @foreach ($posts as $key => $post)
    <tr>
      <td>{{ ++$i }}</td>
      <td>{{ $post->post_name }}</td>
      <td>
        @if($post->post_img)
        <img src="{{ asset($post->post_img) }}" class="post_img" />
        @endif
      </td>
      <td>{{substr($post->detail,0,50) }}</td>
      <td>{{$post->Category->name}}</td>
      <td><b>Comments ({{ count($post->comments) }})</b></td>
      <td>
        <a href="{{ route('posts.show',$post->id) }}"> <button class="show-role-detail">Details</button></a>
        @can('post-edit')
        <a class="edit-r" href="{{ route('posts.edit',$post->id) }}"><button class="edit-role-detail">Edit</button></a>
        @endcan
        @can('post-delete')
        <a href="#" onclick="return confirm('Are you sure you want to delete this post!')">
          {!! Form::open(['method' => 'DELETE','route' => ['posts.destroy', $post->id],'style'=>'display:inline;']) !!}
          {!! Form::submit('Delete', ['class' => 'delete-role-detail']) !!}
          {!! Form::close() !!}
        </a>
        @endcan
      </td>
    </tr>
    @endforeach
</table>
</div>

{!! $posts->render() !!}

<script>
    // Get the modal
    var modal = document.getElementById('id01');

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>
@endsection
