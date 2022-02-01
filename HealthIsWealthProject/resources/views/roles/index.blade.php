@extends('frontend.app')
@section('content')
<div class="register">
  <div class="cardHeader">
    <div class="create">
        <h2>Role List</h2>
        @can('role-create')
        <a href="{{ route('roles.create') }}" title="add new role"><i class="fas fa-plus-square"></i> New Role </a>
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
            <a href="{{ route('roles.show',$role->id) }}" class="g-color"><i class="fas fa-eye"></i> Show</a>
            @can('role-edit')
            <a class="edit-r" href="{{ route('roles.edit',$role->id) }}" class="b-color"><i class="fas fa-edit"></i> Edit</button></a>
            @endcan
            @can('role-delete')
            <a href="#" onclick="return confirm('Are you sure you want to delete this role!')" class="r-color">
            <i class="fas fa-trash-alt"></i>
              {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline;']) !!}
              {!! Form::submit('Delete', ['class' => 'r-color']) !!}
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
