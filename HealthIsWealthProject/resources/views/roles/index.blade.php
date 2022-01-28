@extends('frontend.app')
@section('content')
<div class="register">
  <div class="cardHeader">
    <div class="create">
        <h2>Role List</h2>
        @can('role-create')
        <a href="{{ route('roles.create') }}"><i class="fas fa-plus-square"></i>New Role</a>
        @endcan
      </div>
  </div>
  <table class="table" id="first" >
    <thead>
      <th class="categories_class">No</th>
      <th class="categories_id">Name</th>
      <th>Action</th>
    </thead>
    <tbody>
        @foreach ($roles as $key => $role)
        <tr>
          <td>{{$loop->iteration}}</td>
          <td>{{ $role->name }}</td>
          <td>
            <a href="{{ route('roles.show',$role->id) }}"> <button class="detail">Show</button></a>
            @can('role-edit')
            <a class="edit-r" href="{{ route('roles.edit',$role->id) }}"><button class="edit-role">Edit</button></a>
            @endcan
            @can('role-delete')
            <a href="#" onclick="return confirm('Are you sure you want to delete this role!')">
              {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline;']) !!}
              {!! Form::submit('Delete', ['class' => 'deletes']) !!}
              {!! Form::close() !!}
            </a>
            @endcan
          </td>
        </tr>
        @endforeach
    </tbody>
  </table>
</div>
{!! $roles->render() !!}
@endsection
