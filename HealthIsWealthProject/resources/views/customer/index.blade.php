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
  <!--<div class="search">
  <form action="{{route('customer.index')}}" class="form-group searchgroup">
    <label class="name">Name</label>
    <input type="text" name="user_name" id="user_name" class="form-control">
    <label class="role">Role</label>
    <input type="text" name="role" id="role" class="form-control">
    <label>Start Date :</label>
    <input type="date" name="s_date" class="form-control">
    <label class="enddate">End Date :</label>
    <input type="date" name="e_date" class="form-control">
    <input type="submit" name="submit" value="Search" id="submited" class="form-control">
  </form>

</div>-->
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