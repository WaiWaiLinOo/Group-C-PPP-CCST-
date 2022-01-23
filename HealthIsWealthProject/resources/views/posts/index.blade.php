@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Post Management</h2>
            </div>
            <div class="create-role">
                @can('role-create')
                    <a href="{{ route('posts.create') }}"><button>Create New Post</button></a>
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
                <th>Post image</th>
                <th>Details</th>
                <th width="460px">Action</th>
            </tr>
            @foreach ($posts as $key => $post)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $post->post_name }}</td>
                    <td> <img src="{{ asset('userProfile' . $post->post_img) }}" class="post_img" /></td>
                    <td>{{ substr($post->detail, 0, 50) }}</td>
                    <td>
                        <a href="{{ route('posts.show', $post->id) }}"> <button class="show-role">Show</button></a>
                        @can('role-edit')
                            <a class="edit-r" href="{{ route('posts.edit', $post->id) }}"><button
                                    class="edit-role">Edit</button></a>
                        @endcan
                        @can('post-delete')
                            {!! Form::open(['method' => 'DELETE','route' => ['posts.destroy', $post->id],'style'=>'display:inline;']) !!}
                            {!! Form::submit('Delete', ['class' => 'delete-role']) !!}
                            {!! Form::close() !!}
        </div>
    @endcan
    </td>
    </tr>
    @endforeach
    </table>
    </div>

    {!! $posts->render() !!}

    <script>
        // Get the modal
        var modal = document.getElementById('id01');

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
@endsection
