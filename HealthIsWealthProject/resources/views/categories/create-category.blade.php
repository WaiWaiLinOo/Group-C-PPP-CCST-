@extends('layouts.app')
@section('content')
<div class="adduser">
    <div class="cardHeader">Add Category</div>
    <form class="register-form" method="POST" action="{{ route('categories.store') }}">
        @csrf
        <div class="registerform">
            <div class="form-group">
                <label for="name">Category Name : </label>
                <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" autofocus>
                @if ($errors->has('name'))
                <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
            </div>
            <button type="submit" class="button-secondary">Submit</button>
            <div class="create-categories">
                <a href="{{route('categories.index')}}">Categories list <span>&#8594;</span></a>
            </div>
        </div>
    </form>
</div>
@endsection