@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Role Management</h2>
        </div>
        <div class="create-role">
        @can('role-create')
            <a href="{{ route('roles.create') }}"><button>Create New Role</button></a>
            @endcan
        </div>
    </div>
</div>


@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif

<div class="panel">
<table class="table" id="first">
  <tr>
     <th>No</th>
     <th>Name</th>
     <th width="460px">Action</th>
  </tr>
    @foreach ($roles as $key => $role)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $role->name }}</td>
        <td>
            <a href="{{ route('roles.show',$role->id) }}"> <button class="show-role">Show</button></a>
            @can('role-edit')
                <a class="edit-r" href="{{ route('roles.edit',$role->id) }}"><button class="edit-role">Edit</button></a>
            @endcan
            @can('role-delete')
                {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline;']) !!}
                    {!! Form::submit('Delete', ['class' => 'delete-role']) !!}
                {!! Form::close() !!}
            @endcan
        </td>
    </tr>
    @endforeach
</table>
</div>

{!! $roles->render() !!}
@endsection
