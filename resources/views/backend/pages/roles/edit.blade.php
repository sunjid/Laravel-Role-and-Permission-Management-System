@extends('backend.layouts.master')

@section('title')
    Dashboard-Admin Panel
@endsection


@section('admin-content')

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Role Edit-Admin Panel
    {{-- <small>advanced tables</small> --}}
  </h1>
  <ol class="breadcrumb">
    <li><a href=" {{ route('admin.dashboard') }} "><i class="fa fa-dashboard"></i>Dashboard</a></li>
    <li><a href="{{ route('admin.roles.index') }}">All Roles</a></li>
    <li class="active">Data tables</li>
  </ol>
</section>
<!-- Main content -->
<section class="content">
  <div class="row">
   <div class="col-md-12">
    <div class="box box-primary">
        <div class="box-header">
          {{-- <h3 class="box-title">Quick Example</h3> --}}
        </div><!-- /.box-header -->
        <!-- form start -->
        <h4 class="header-title">Edit Role</h4>
        @include('backend.layouts.partials.messages')
        <form action="{{ route('admin.roles.update', $role->id) }}" method="POST">
        @method('PUT')
        @csrf
          <div class="box-body">
            <div class="form-group">
              <label for="name">Role Name</label>
              <input type="text" class="form-control" id="name" value="{{ $role->name }}" name="name" placeholder="Enter a role name">
            </div>
            <br> 
              <div class="form-group">
                <label for="name">Permissions</label>
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" id="checkPermissionAll" value="1" {{ App\User::roleHasPermissions($role, $permissions) ? 'checked' : '' }} >
                  <label class="form-check-label" for="checkPermissionAll">All</label>
              </div>
              <hr>
              @php $i = 1; @endphp
                          @foreach ($permission_groups as $group)
                                <div class="row">
                                  @php
                                      $permissions = App\User::getpermissionsByGroupName($group->name);
                                      $j = 1;
                                  @endphp
                                    <div class="col-md-3">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="{{ $i }}Management" value="{{ $group->name }}" onclick="checkPermissionByGroup('role-{{ $i }}-management-checkbox', this)" {{ App\User::roleHasPermissions($role, $permissions) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="checkPermission">{{ $group->name }}</label>
                                        </div>
                                    </div>

                                    <div class="col-md-9 role-{{ $i }}-management-checkbox">
                                        
                                        @foreach ($permissions as $permission)
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" onclick="checkSinglePermission('role-{{ $i }}-management-checkbox', '{{ $i }}Management', {{ count($permissions) }})" name="permissions[]" {{$role->hasPermissionTo($permission->name) ? 'checked' : '' }} id="checkPermission{{ $permission->id }}" value="{{ $permission->name }}">
                                                <label class="form-check-label" for="checkPermission{{ $permission->id }}">{{ $permission->name }}</label>
                                            </div>
                                            @php  $j++; @endphp
                                        @endforeach
                                        <br>
                                    </div>

                                </div>
                                @php  $i++; @endphp
                            @endforeach
              {{-- Permissions list from array  --}}
            </div>
            </div>
          </div><!-- /.box-body -->
          <div class="box-footer">
            <button type="submit" class="btn btn-primary">Save Role</button>
          </div>
        </form>
      </div><!-- /.box -->
  </div><!-- /.row -->
</div>
</section><!-- /.content -->
@endsection

@section('scripts')
<script src="{{ asset('backend/assets/plugins/jQuery/jQuery-2.1.3.min.js') }}"></script>

     <!-- AdminLTE App -->
    <script src="{{ asset('backend/assets/dist/js/app.min.js') }}" type="text/javascript"></script>

    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('backend/assets/dist/js/pages/dashboard.js') }}" type="text/javascript"></script>
    
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('backend/assets/dist/js/demo.js') }}" type="text/javascript"></script>
@endsection
@include('backend.pages.roles.partials.scripts');
