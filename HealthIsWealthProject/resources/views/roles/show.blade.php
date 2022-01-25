@extends('layouts.app')

@section('content')

<div class="showpermission">

    <div ><h4>Show Role</h4></div>
    <div class="showlist">
        <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="form-group">
            <span>Permission for {{ $datas['role']->name }}</span>
          </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="form-group">
            <strong>Permissions Provided:</strong>
            @if(!empty($datas['rolePermissions']))
            @foreach($datas['rolePermissions'] as $v)
            <br>
            <label class="label label-success">{{ $v->name }}</label>
            @endforeach
            @endif
          </div>
        </div>
    </div>
    <a  href="{{ route('roles.index') }}"><button type="submit" class="buttons">Back</button></a>
</div>

@endsection
