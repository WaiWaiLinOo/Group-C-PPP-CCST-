@extends('layouts.app')
@section('content')
@if (count($errors) > 0)
@endif
<div class="adduser">
  <div class="cardHeader">Edit Cagetory</div>
  <form action="{{ route('categories.update', $category) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="register-form">

      <div class="form-group">
        <strong>Category Name:</strong>
        <input type="text" id="name" name="name" class="form-control" value="{{ $category->name }}" placeholder="Category name">
      </div>
      <button type="submit" class="button-secondary btns">Update</button>
      <div class="create-categories">
        <a href="{{route('categories.index')}}">Categories list <span>&#8594;</span></a>

      </div>
    </div>
  </form>
</div>
@endsection
