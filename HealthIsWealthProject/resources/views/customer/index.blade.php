@extends('layouts.app')
@section('content')
@if (count($customers) > 0)
<div class="title">
  <h1>User Management</h1>
</div>
<div class="search">

  <form action="" class="form-group searchgroup">
    <label class="name">Name</label>
    <input type="text" name="name" id="name" class="form-control">
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
  <a  href="/exportpdf"><button>Export Pdf</button></a>
</div>

<div class="panel panel-default">
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
      @foreach ($customers as $customer)
      <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $customer->name }}</td>
        <td>{{ $customer->email }}</td>
        <td>
          @if(!empty($customer->getRoleNames()))
          @foreach($customer->getRoleNames() as $v)
          <label class="badge badge-success">{{ $v }}</label>
          @endforeach
          @endif
        </td>
        <td>
          <a href=""><button class="btn btn-primary">Show</button></a>
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
      @endforeach
    </tbody>
  </table>
</div>
</div>
@endif
</div>

@endsection
