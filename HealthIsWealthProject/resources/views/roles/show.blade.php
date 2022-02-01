@extends('frontend.app')
@section('content')

<div class="showpermission">
    <div class="cardHeader">
      <div class="create">
        <h2>Permission for {{ $datas['role']->name }}</h2>
        <a href="{{ route('roles.index') }}" title="Back to role lists">Role List <i class="fas fa-list-alt"></i></a>
      </div>
    </div>
    <div class="showlist">
        <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="form-group">
          <b class="label">Permission Provided:</b>
            @if(!empty($datas['rolePermissions']))
            <ul class="role-list">
              @foreach($datas['rolePermissions'] as $v)
              <li><i class="fas fa-check-square g-color"></i> {{ $v->name }}</li>
              @endforeach
            </ul>
            @endif
          </div>
        </div>
    </div>
</div>

@endsection
