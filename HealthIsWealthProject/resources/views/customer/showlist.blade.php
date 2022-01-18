@extends('layouts.app')
@section('content')
    <div class="container">
        @if (count($customers) > 0)
            <div class="search">
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
                <table class="table table-light" id="first">
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
                                    <a href=""><button class="btn btn-primary">Show</button></a>
                                    <a href=""><button class="btn btn-success">Edit</button></a>
                                    {{-- {!! Form::open(['method' => 'DELETE','route' => ['customer.destroy', $customer->id],'style'=>'display:inline']) !!}
                                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                    {!! Form::close() !!} --}}

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
