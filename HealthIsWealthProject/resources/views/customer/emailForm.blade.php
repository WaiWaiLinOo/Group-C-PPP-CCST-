@extends('frontend.app')
@section('title', 'Email Form')
@section('content')
<div class="register">
  <div class="cardHeader">Send User List</div>
  <form method="POST" action="{{ route('postMailForm') }}">
    @csrf
    <div class="editform">
      <div class="form-group">
        <label for="email">Email :</label>
        <input type="email" placeholder="Enter Email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" name="email" required>
        @if ($errors->has('email'))
        <span class="text-danger">{{ $errors->first('email') }}</span>
        @endif
      </div>
      <button type="submit" class="btns">Send Email</button>
      <div class="create-categories">
        <a href="{{route('customers.index')}}" title="back to user list"><i class="fas fa-arrow-circle-left"></i></a>
      </div>
    </div>
  </form>
</div>
@endsection

