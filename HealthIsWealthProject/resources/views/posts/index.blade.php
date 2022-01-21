@extends('layouts.app')


@section('content')
<div class="row">
  <div class="col-lg-12 margin-tb">
    <div class="pull-left">
      <h2>Post Management</h2>
    </div>
    <div class="create-role">
      @can('role-create')
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

<div class="panel">
  <table class="table" id="first">
    <tr>
      <th>No</th>
      <th>Name</th>
      <th>Post image</th>
      <th>Details</th>
      <th width="460px">Action</th>
    </tr>
    @foreach ($posts as $key => $post)
    <tr>
      <td>{{ ++$i }}</td>
      <td>{{ $post->post_name }}</td>
      <td> <img src="{{ asset('post_img/' . $post->post_img) }}" class="post_img" /></td>
      <td>{{ $post->detail }}</td>
      <td>
        <a href="{{ route('posts.show',$post->id) }}"> <button class="show-role">Show</button></a>
        @can('role-edit')
        <a class="edit-r" href="{{ route('posts.edit',$post->id) }}"><button class="edit-role">Edit</button></a>
        @endcan
        @can('post-delete')
        {!! Form::open(['method' => 'DELETE','route' => ['posts.destroy', $post->id],'style'=>'display:inline;']) !!}
        {!! Form::submit('Delete', ['class' => 'delete-role']) !!}
        {!! Form::close() !!}
        @endcan
      </td>
    </tr>
    @endforeach
  </table>
</div>

{!! $posts->render() !!}
@endsection