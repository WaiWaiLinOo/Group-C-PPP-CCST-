@extends('frontend.app')
@section('content')
<div class="register">
  <div class="cardHeader">
    <div class="create">
      <h2>Role Management</h2>
      @can('role-create')
      <a href="{{ route('roles.create') }}" title="create new role">New Role <i class="fas fa-plus-square"></i></a>
      @endcan
    </div>
  </div>
  @if ($message = Session::get('success'))
  <div class="alert alert-success">
    <p>{{ $message }}</p>
  </div>
  @endif

  <table class="table" id="first">
    <tr>
      <th>No</th>
      <th>Name</th>
      <th>Action</th>
    </tr>
    @foreach ($roles as $key => $role)
    <tr>
      <td>{{ $loop->iteration }}</td>
      <td>{{ $role->name }}</td>
      <td>
        <a href="{{ route('roles.show',$role->id) }}" class="g-color"> <i class="fas fa-list-alt"></i> Show</a>
        @can('role-edit')
        <a href="{{ route('roles.edit',$role->id) }}" class="b-color"><i class="fas fa-edit"></i> Edit</a>
        @endcan
        @can('role-delete')
        <a href="#" onclick="return confirm('Are you sure you want to delete this role!')" class="r-color">
        <i class="fas fa-trash-alt"></i>
        {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline;']) !!}
          {!! Form::submit('Delete', ['class' => 'delete-role']) !!}
          {!! Form::close() !!}
        </a>
        @endcan
      </td>
    </tr>
    @endforeach
  </table>
</div>

{!! $roles->render() !!}
@endsection
