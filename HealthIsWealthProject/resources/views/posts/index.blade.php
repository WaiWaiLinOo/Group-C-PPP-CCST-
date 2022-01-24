@extends('layouts.app')


@section('content')
<div class="row">
  <div class="col-lg-12 margin-tb">
    <div class="pull-left">
      <h2>Post Management</h2>
    </div>
    <div class="create-role">
      @can('post-create')
      <a href="{{ route('posts.create') }}"><button>Create New Post</button></a>
      @endcan
    </div>
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
<div class="panel">
  <table class="table" id="first">
    <tr>
      <th>No</th>
      <th>Name</th>
      <th>Post image</th>
      <th>Details</th>
      <th>Categories</th>
      <th>Comment Number</th>
      <th width="460px">Action</th>
    </tr>
    @foreach ($posts as $key => $post)
    <tr>
      <td>{{ ++$i }}</td>
      <td>{{ $post->post_name }}</td>
      <td>
        @if($post->post_img)
        <img src="{{ asset('post_img/' . $post->post_img) }}" class="post_img" />
        @endif
      </td>

      <td>{{substr($post->detail,0,50) }}</td>
      <td>
        {{$post->Category->name}}
      </td>
      <td>
        <b>Comments ({{ count($post->comments) }})</b>
      </td>
      <td>
        <a href="{{ route('posts.show',$post->id) }}"> <button class="show-role">Details</button></a>
        @can('post-edit')
        <a class="edit-r" href="{{ route('posts.edit',$post->id) }}"><button class="edit-role">Edit</button></a>
        @endcan
        @can('post-delete')
        <a href="#" onclick="return confirm('Are you sure you want to delete this post!')">
          {!! Form::open(['method' => 'DELETE','route' => ['posts.destroy', $post->id],'style'=>'display:inline;']) !!}
          {!! Form::submit('Delete', ['class' => 'delete-role']) !!}
          {!! Form::close() !!}
        </a>
        @endcan
      </td>
    </tr>
    @endforeach
  </table>
</div>

{!! $posts->render() !!}
@endsection