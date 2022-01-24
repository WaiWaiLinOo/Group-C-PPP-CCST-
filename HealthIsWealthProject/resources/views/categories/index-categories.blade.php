@extends('layouts.app')
@section('content')
<div class="title">
  <h1>Category Management</h1>
</div>
<div class="search">

  <form action="" class="form-group searchgroup">
    <label class="name">Category Name</label>
    <input type="text" name="name" id="name" class="form-control">
    <label>Start Date :</label>
    <input type="date" name="s_date" class="form-control">
    <label class="enddate">End Date :</label>
    <input type="date" name="e_date" class="form-control">
    <input type="submit" name="submit" value="Search" id="submited" class="form-control">
  </form>
</div>
<div class="create">
  <a href="{{ route('categories.create') }}"><button>Create Category<span>&#8594;</span></button> </a>
</div>

<div class="panel panel-default">
  <div class="cardHeader">
    Category List
  </div>
  <table class="table" id="first">
    <thead>
      <th>No</th>
      <th>Name</th>
      <th>Action</th>
    </thead>
    <tbody>
    @foreach ($categories as $category)
      <tr>
        <td>{{$category->id}}</td>
        <td>{{ $category->name }}</td>
       <td>
          <a href=""><button class="btn btn-primary">Show</button></a>
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
</div>
</div>
@endsection
