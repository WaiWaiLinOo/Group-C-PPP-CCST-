@extends('layouts.app')
@section('content')
<div class="register">
<div class="title">
  <h1>Category Management</h1>
</div>
<div class="create">
  <a href="{{ route('categories.create') }}"><button>Create Category</button> </a>
</div>
  <div class="cardHeader">
    Category List
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
          <a href="{{ route('categories.edit', $category) }}"><button class="edit">Edit</button></a>
          <a href="" onclick="return confirm('Are you sure you want to delete this category!')">
            <form class="delete" style="display:inline-block" ; action="{{route('categories.destroy', $category)}}" method="POST">
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
@endsection
