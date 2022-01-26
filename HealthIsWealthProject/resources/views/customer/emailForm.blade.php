@extends('layouts.app')

@section('title', 'Email Form')

@section('content')
<div class="adduser">
  <div class="cardHeader">Send User List</div>
      <form class="register-form" action="{{ route('postMailForm') }}" method="POST">
        {{ csrf_field() }}
        <div class="form-group">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}">
          @if ($errors->has('email'))
          <span class="text-danger">{{ $errors->first('email') }}</span>
          @endif
        </div>
        <button type="submit" class="button-secondary">
          Send Email
        </button>
      </form>
</div>

@endsection
