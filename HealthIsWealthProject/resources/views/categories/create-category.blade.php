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
  <div class="cardHeader">Add Category</div>
  <form class="register-form margin-top" method="POST" action="{{ route('categories.store') }}">
    @csrf
    <div class="editform">
      <div class="form-group">
        <label for="name" class="label">Category Name : </label>
        <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" autofocus>
      </div>
      <button type="submit" class="btns">Submit</button>
      <div class="create-categories">
        <a href="{{route('categories.index')}}"><i class="fas fa-arrow-circle-left"></i></a>
      </div>
    </div>
  </form>
</div>
@endsection