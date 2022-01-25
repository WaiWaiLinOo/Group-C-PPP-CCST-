@extends('layouts.app')


@section('content')
@if (count($errors) > 0)
<div class="alert alert-danger">
  <strong>Whoops!</strong> There were some problems with your input.<br><br>
  <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif
<div class="adduser">
  <div class="cardHeader">Edit Post</div>
  <form action="{{ route('posts.update',$post->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="register-form">

      <div class="form-group">
        <strong>Post Name:</strong>
        <input type="text" name="post_name" class="form-control" value="{{ $post->post_name }}" placeholder="Post name">
      </div>
      <div class="form-group profile">
        <label for="post_img">Post Image :</label>
        <input type="file" class="form-control" name="post_img" id="post_img">
        <img src="{{ asset('post_img/' . $post->post_img) }}" class="post_img" />
      </div>
      <!--test -->
      <!-- Drop down -->
      <label for="categories"><span>Choose a category:</span></label>
      <select name="category_id" id="categories">
        <option selected disabled>Select option </option>
        @foreach ($categories as $category)
        <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
      </select>
      <!--test -->
      <div class="form-group">
        <strong>Details:</strong>
        <textarea class="form-control" style="height:150px" name="detail" placeholder="Detail">{{ $post->detail }}</textarea>
      </div>
      <button type="submit" class="button-secondary btns">Update</button>
    </div>
  </form>
</div>
@endsection