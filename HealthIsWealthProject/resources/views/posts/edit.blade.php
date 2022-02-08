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
  <div class="cardHeader">Edit Post</div>
  <form action="{{ route('posts.update',$post->id) }}" method="POST" enctype="multipart/form-data" class="register-form">
    @csrf
    @method('PUT')
    <div class="editform">
      <div class="form-group">
        <label for="name">Post Name:</label>
        <input type="text" name="post_name" class="form-control" value="{{ old('post_name', $post->post_name) }}" placeholder="Post name">
      </div>
      <div class="form-group mb-3 profile">
        <label for="profile">Post Image</label>
        (<small class="text-danger">*We only accept jpeg png gif jpg format</small>)
        <input type="file" onchange="previewFile(this);" name="post_img" id="post_img" accept="image/png, image/gif, image/jpeg" value={{$post->post_img}}>
        @if($post->post_img)
        <img src="{{ asset($post->post_img) }}" class="post_img" id="previewImg" />
        @endif
      </div>
      <div class="form-group">
        <label for="categories"><span>Choose a category:</span></label>
        <select name="category_id" id="categories">
          @foreach ($categories as $category)
          @if (old('category') == $category->id || $category->id == $post->category_id)
          <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
          @else
          <option value="{{$category->id}}">{{ $category->name }}</option>
          @endif
          @endforeach
        </select>
      </div>
      <div class="form-group">
        <strong>Details:</strong>
        <textarea class="form-control" style="height:150px" name="detail" placeholder="Detail">{{ old('detail', $post->detail) }}</textarea>
      </div>
      <button type="submit" class="btns">Update</button>
      <div class="create-categories">
        <a href="{{route('posts.index')}}"><i class="fas fa-arrow-circle-left"></i></a>
      </div>
    </div>
  </form>
</div>
@endsection