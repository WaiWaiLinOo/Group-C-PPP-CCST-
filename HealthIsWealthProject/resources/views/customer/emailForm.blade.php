@extends('frontend.app')

@section('title', 'Email Form')

@section('content')
<div class="adduser">
  <div class="cardHeader">Send User List</div>
      <form class="editform margin-top" action="{{ route('postMailForm') }}" method="POST">
        {{ csrf_field() }}
        <div class="form-group">
          <label for="email" class="form-label" class="label">Email:</label>
          <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Enter Email" required>
          @if ($errors->has('email'))
          <span class="text-danger">{{ $errors->first('email') }}</span>
          @endif
        </div>
        <button type="submit" class="btns">
          Send Email
        </button>
        <div class="create-categories">
            <a href="{{route('customers.index')}}" title="back to user list"><i class="fas fa-arrow-circle-left"></i></a>
        </div>
      </form>
</div>

@endsection
