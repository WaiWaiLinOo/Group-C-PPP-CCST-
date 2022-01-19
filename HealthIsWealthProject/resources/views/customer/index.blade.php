@extends('layouts.app')
@section('content')
  @if (count($customers) > 0)

  <div class="search">
    <div class="create">
        <a href="{{ route('customers.create') }}"><button>Create User</button> </a>
  </div>
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
    <table class="table" id="first">
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
            @if(!empty($customer->getRoleNames()))
            @foreach($customer->getRoleNames() as $v)
            <label class="badge badge-success">{{ $v }}</label>
            @endforeach
            @endif
          </td>
          <td>
            <a href=""><button class="btn btn-primary">Show</button></a>
          </td>
          <td>
            <a href="{{route('customers.edit',$customer->id)}}"><button class="edit">Edit</button></a>
          </td>
          <td>
            <form class="delete" style="width: 100px; display:inline" ; action="{{ url('user/delete/'.$customer->id) }}" method="POST">
              @csrf
              @method('DELETE')
              <button type="submit" style="width: 100px;" class="delete">Delete</button>
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
