@extends('layouts.app')
@section('content')
<div class="register">
<div class="create">
  <h1>User Management</h1>
</div>
<div class="search">
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

</div>
<div class="create">
  <a href="{{ route('customers.create') }}"><button>Create User</button> </a>
  <a  href="/mail"><button>Email All data</button></a>
  <a href="/exportpdf"><button>ExportPDF</button></a>
</div>

  <div class="cardHeader">
    Customer List
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
        <td> @if(!empty($customer->getRoleNames()))
          @foreach($customer->getRoleNames() as $v)
          <label class="badge badge-success">{{ $v }}</label>
          @endforeach
          @endif</td>
        <td>
          <a href="{{ route('profileshows', Auth::user()->id) }}"><button class="show-role-detail">Show</button></a>
          <a href="{{route('customers.edit',$customer->id)}}"><button class="edit">Edit</button></a>
          <a href="" onclick="return confirm('Are you sure you want to delete this user!')">
            <form class="delete" style="display:inline-block" ; action="{{ url('user/delete/'.$customer->id) }}" method="POST">
              @csrf
              @method('DELETE')
              <button type="submit" style="width: 100px;" class="delete-role">Delete</button>
            </form>
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
