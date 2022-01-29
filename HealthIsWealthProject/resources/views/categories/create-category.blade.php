@extends('frontend.app')
@section('content')
<div class="register">
  <div class="cardHeader">Add Category</div>
  <form method="POST" action="{{ route('categories.store') }}">
    @csrf
    <div class="editform">
      <div class="form-group">
        <label for="name" class="label">Category Name : </label>
        <input type="text" class="form-control" placeholder="Enter Category name" name="name" id="name" value="{{ old('name') }}" autofocus>
        @if ($errors->has('name'))
        <span class="text-danger">{{ $errors->first('name') }}</span>
        @endif
      </div>
      <button type="submit" class="btns">Submit</button>
      <div class="create-categories">
        <a href="{{route('categories.index')}}"><i class="fas fa-arrow-circle-left"></i></a>
      </div>
    </div>
  </form>
</div>
@endsection