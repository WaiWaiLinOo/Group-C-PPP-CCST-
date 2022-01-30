@extends('frontend.app')
@section('content')
<div class="register">
  <div class="cardHeader">
    <div class="create">
      <h1>User Management</h1>
      <a href="{{ route('customers.create') }}" title="create new user"><i class="fas fa-user-plus"></i> New User</a>
      <a href="/mail" title="send email"><i class="fas fa-paper-plane"></i> Email All data</a>
    </div>
  </div>
  <div class="editform searchgroup">
    <form action="{{route('search.user')}}" class="form-group d-flex">
      <div>
      <div class="d-flex">
          <div>
            <label class="name">Name:</label><br>
            <input type="text" name="user_name" id="user_name" class="form-control" placeholder="Enter User Name">
          </div>
          <div>
            <label class="role">Role:</label>
            <input type="text" name="role" id="role" class="form-control" placeholder="Enter Role Name">
          </div>
        </div>
        <div class="d-flex">
          <div>
            <label>Start Date:</label>
            <input type="date" name="s_date" class="form-control">
          </div>
          <div>
            <label class="enddate">End Date:</label>
            <input type="date" name="e_date" class="form-control">
          </div>
        </div>
      </div>
      <button type="submit" name="submit" id="submited" class="form-control">Serach </button>
    </form>
  </div>
  <table class="table" id="first">
    <thead>
      <th>No</th>
      <th>Name</th>
      <th>Email</th>
      <th>Role</th>
      <th>Action</th>
    </thead>
    <tbody>
      @forelse ($customers as $customer)
      <tr>
        {{--<td>{{ ++$i }}</td>--}}
        <td>{{ $customer->id }}</td>
        <td>{{ $customer->user_name }}</td>
        <td>{{ $customer->email }}</td>
        <td><b class="badge badge-success">{{ $customer->name}}</b></td>
        <td>
          <a href="{{ route('profileshows', Auth::user()->id) }}" class="g-color"><i class="fas fa-eye"></i> Show</a>
          <a href="{{route('customers.edit',$customer->id)}}" class="b-color"><i class="fas fa-edit"></i> Edit</a>
          <a href="" onclick="return confirm('Are you sure you want to delete this user!')" class="r-color">
            <i class="fas fa-trash-alt"></i>
            @csrf
            @method('DELETE')
            {!! Form::open(['method' => 'DELETE','route' => ['customers.destroy', $customer->id],'style'=>'display:inline;']) !!}
            {!! Form::submit('Delete', ['class' => 'r-color']) !!}
            {!! Form::close() !!}
          </a>
        </td>
      </tr>
      @empty
      <td colspan="5" style="text-align: center;"><b>Sorry, currently there is no User table related to that search!</b></td>
      @endforelse
    </tbody>

  </table>
</div>
@endsection