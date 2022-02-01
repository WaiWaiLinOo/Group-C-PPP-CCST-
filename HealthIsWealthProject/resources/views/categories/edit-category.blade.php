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
