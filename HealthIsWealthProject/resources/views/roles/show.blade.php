@extends('layouts.app')
@section('content')
<div class="row">
  <div class="col-lg-12 margin-tb">
    <div class="pull-left">
      <h2> Show Role</h2>
    </div>
  </div>
</div>

<div>
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
  <div class="pull-right">
    <a class="btn btn-primary" href="{{ route('roles.index') }}"> Back</a>
  </div>
</div>

@endsection