@extends('frontend.app')
@section('content')
@if (count($errors) > 0)
@endif
<div class="register">
  <div class="cardHeader">Edit Cagetory</div>
  <form action="{{ route('categories.update', $category) }}" method="POST" class="register-form">
    @csrf
    @method('PUT')
    <div class="registerform">
        <div class="editform">
            <div class="form-group">
              <strong>Category Name:</strong>
              <input type="text" id="name" name="name" class="form-control" value="{{ $category->name }}" placeholder="Category name">
            </div>
            <button type="submit" class="btns">Update</button>
            <div class="create-categories">
              <a href="{{route('categories.index')}}"><i class="fas fa-arrow-circle-left"></i></a>

            </div>
          </div>
    </div>
  </form>
</div>
@endsection
