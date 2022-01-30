@extends('frontend.app')
@section('content')
<div class="register">
  <div class="cardHeader">
    <div class="create">
        <h2>Category List</h2>
        <a href="{{ route('categories.create') }}"><i class="fas fa-plus-square"></i> New Category</a>
      </div>
  </div>
  <table class="table" id="first" >
    <thead>
      <th class="categories_class">No</th>
      <th class="categories_id">Name</th>
      <th>Action</th>
    </thead>
    <tbody>
      @foreach ($categories as $category)
      <tr>
        <td>{{$category->id}}</td>
        <td>{{ $category->name }}</td>
       <td>
          <a href="{{ route('categories.edit', $category) }}" class="b-color"><i class="fas fa-edit"></i>Edit</a>
          <a href="" onclick="return confirm('Are you sure you want to delete this category!')" class="r-color">
            <i class="fas fa-trash-alt"></i>
            @csrf
            @method('DELETE')
            {!! Form::open(['method' => 'DELETE','route' => ['categories.destroy', $category->id],'style'=>'display:inline;']) !!}
            {!! Form::submit('Delete', ['class' => 'r-color']) !!}
            {!! Form::close() !!}
          </a>
        </td>
      </tr>
      @endforeach
      @if($categories == '')
      <tr>
        <td colspan="7"><b>No data found</b></td>
      </tr>
      @endif
    </tbody>
  </table>
</div>
@endsection
