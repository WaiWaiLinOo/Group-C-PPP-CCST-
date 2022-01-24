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


<form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
  @csrf
  <div class="register-form">
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
          <strong>Post Name:</strong>
          <input type="text" name="post_name" class="form-control" placeholder="Post name">
        </div>
        <div class="form-group profile">
          <label for="post_img">Post Image :</label>
          <input type="file" class="form-control" name="post_img" id="post_img">
        </div>
        <div class="form-group">
          <strong>Details:</strong>
          <textarea class="form-control" style="height:150px" name="detail" placeholder="Detail"></textarea>
        </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="button-secondary btns">Submit</button>
      </div>
    </div>
  </div>
</form>
@endsection
