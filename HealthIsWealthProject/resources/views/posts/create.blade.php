@extends('layouts.app')
@section('content')
{{--@if (count($errors) > 0)
<div class="alert alert-danger">
  <strong>Whoops!</strong> There were some problems with your input.<br><br>
  <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
@endforeach
</ul>
</div>
@endif--}}
<div class="adduser">
  <div class="cardHeader">
    Create Post
  </div>
  <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="register-form">
      <div class="form-group">
        <strong>Post Name:</strong>
        <input type="text" name="post_name" class="form-control" placeholder="Post name" value="{{old('post_name')}}">
        @if ($errors->has('post_name'))
        <span class="text-danger">{{ $errors->first('post_name') }}</span>
        @endif
      </div>
      <div class="form-group profile">
        <label for="post_img">Post Image :</label>
        <input type="file" class="form-control" name="post_img" id="post_img" value="{{old('post_img')}}" accept="image/png, image/gif, image/jpeg">
        @if ($errors->has('post_img'))
        <span class="text-danger">{{ $errors->first('post_img') }}</span>
        @endif
      </div>
      <div class="form-group">
        <strong>Details:</strong>
        <textarea class="form-control" style="height:150px" name="detail" placeholder="Detail" value="{{old('detail')}}"></textarea>
        @if ($errors->has('detail'))
        <span class="text-danger">{{ $errors->first('detail') }}</span>
        @endif
      </div>
      <!-- Drop down -->
      <label for="categories"><span>Choose a category:</span></label>
      <select name="category_id" id="categories" value="{{old('category_id')}}">
        <option selected disabled>Select option </option>
        @foreach ($categories as $category)
        <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
        @if ($errors->has('category_id'))
        <span class="text-danger">{{ $errors->first('category_id') }}</span>
        @endif
      </select>
      <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="button-secondary btnpost">Submit</button>
      </div>
      <div class="create-categories">
        <a href="{{route('posts.index')}}">Post Lists<span>&#8594;</span></a>
      </div>
    </div>
  </form>
</div>
@endsection