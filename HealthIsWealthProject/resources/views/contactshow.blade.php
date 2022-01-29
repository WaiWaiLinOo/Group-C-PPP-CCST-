@extends('frontend.app')
@section('content')
<div class="register">
    <div class="cardHeader">
      <h2>Contact Data Show</h2>
    </div>
  <table class="table" id="first">
    <tr>
      <th>No</th>
      <th>First Name</th>
      <th>Last Name</th>
      <th >Subject</th>
    </tr>
    @foreach ($contact as $contacts)
    <tr>
      <td>{{ $loop->iteration }}</td>
      <td>{{ $contacts->first_name}}</td>
      <td>{{ $contacts->last_name}}</td>
      <td>{{ $contacts->detail}}</td>
    </tr>
    @endforeach
  </table>
</div>
@endsection
