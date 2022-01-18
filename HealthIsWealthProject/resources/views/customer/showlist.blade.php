@extends('layouts.app')
@section('content')
<div class="container">
  @if (count($customers) > 0)
  <div class="search">
    <form action="">
      <label class="name">Name</label>
      <input type="text" name="name" id="name">
      <label>Start Date :</label>
      <input type="date" name="s_date">
      <label class="enddate">End Date :</label>
      <input type="date" name="e_date">
      <input type="submit" name="submit" value="Search" id="submit">
    </form>
  </div>
  <div class="panel panel-default">
    <div class="cardHeader">
      Customer List
    </div>
    <table class="table table-light" id="first">
      <thead>
        <th>No</th>
        <th>Name</th>
        <th>Email</th>
        <th>Action</th>
      </thead>
      <tbody>
        @foreach ($customers as $customer)
        <tr>
          <td>{{ $customer->id }}</td>
          <td>{{ $customer->name }}</td>
          <td>{{ $customer->email }}</td>
          <td>
            <a href=""><button class="btn btn-primary">Show</button></a>
          </td>
          <td>
            <a href="{{route('user_edit_view',$customer->id)}}"><button class="btn btn-success">Edit</button></a>
          </td>
          <td>  
            <form style="width: 100px;" action="{{ url('user/delete/'.$customer->id) }}" method="POST">
              @csrf
              @method('DELETE')
              <button type="submit" style="width: 100px;" class="btn btn-danger btn-sm">Delete</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endif
</div>

@endsection