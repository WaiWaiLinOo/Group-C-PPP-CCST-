@extends('layouts.app')
@section('content')
<div class="content">
  <table>
    <tr>
      <th>Name</th>
      <th>Email</th>
      <th>Date OF birth</th>
      <th>Address</th>
    </tr>
    <tbody>
      @foreach ($users as $user)
      <tr>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
        <td>{{$user->dob}}</td>
        <td>{{$user->address}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
