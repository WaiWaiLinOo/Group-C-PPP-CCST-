@extends('layouts.app')

@section('content')
<div class="adduser">
  <div class="cardHeader">Reset Pasword</div>
  <div class="card-body">
    @if (session('status'))
    <div class="alert alert-success" role="alert">
      {{ session('status') }}
    </div>
    @endif
    <form method="POST" action="{{ route('password.email') }}">
      @csrf
      <div class="form-group row">
        <input id="email" type="email" placeholder="Email address" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
        @error('email')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
      <div class="form-group row mb-0">
        <button type="submit" class="btn btn-primary">
          {{ __('Send Password Reset Link') }}
        </button>
      </div>
    </form>
  </div>
</div>
@endsection