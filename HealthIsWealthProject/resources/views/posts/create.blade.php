@extends('frontend.app')
@section('content')
<div class="register">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
  @endif
<div class="cardHeader">
Create Post
</div>
<form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
  @csrf

  <div class="editform">
        <div class="form-group">
          <strong>Post Name:</strong>
          <input type="text" name="post_name" class="form-control" placeholder="Post name" value="{{old('post_name')}}">
        </div>
        <div class="form-group mb-3 profile">
            <label for="profile">Post Image</label>
            (<small class="text-danger">*We only accept jpeg png gif jpg format</small>)
            <input type="file" placeholder="User Profile" value="{{old('post_img')}}" name="post_img" id="post_img" accept="image/png, image/gif, image/jpeg" style="width:100%;">
        </div>
        <div class="form-group">
          <strong>Details:</strong>
          <textarea class="form-control" style="height:150px" name="detail" placeholder="Detail" value="{{old('detail')}}"></textarea>
        </div>

       <label for="categories"><span>Choose a category:</span></label>
        <select name="category_id" id="categories" value="{{old('category_id')}}">
            <option selected disabled>Select option </option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
      <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btns">Submit</button>
      </div>
      <div class="create-categories">
        <a href="{{route('posts.index')}}"><i class="fas fa-arrow-circle-left"></i></a>
    </div>
  </div>
</form>
</div>
@endsection

