@extends('backend.layouts.master')

@section('title')
    Dashboard-Admin Panel
@endsection


@section('admin-content')

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Role Create-Admin Panel
    {{-- <small>advanced tables</small> --}}
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Tables</a></li>
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
        @include('backend.layouts.partials.messages')
        <form action="{{ route('admin.roles.store') }}" method="POST">
        @csrf
          <div class="box-body">
            <div class="form-group">
              <label for="name">Role Name</label>
              <input type="text" class="form-control" id="name" name="name" placeholder="Enter a role name">
            </div>
            <br> 
              <div class="form-group">
                <label for="name">Permissions</label>
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" id="checkPermissionAll" value="1">
                  <label class="form-check-label" for="checkPermissionAll">All</label>
              </div>
              <hr>
              @php $i = 1; @endphp
                          @foreach ($permission_groups as $group)
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="{{ $i }}Management" value="{{ $group->name }}" onclick="checkPermissionByGroup('role-{{ $i }}-management-checkbox', this)">
                                            <label class="form-check-label" for="checkPermission">{{ $group->name }}</label>
                                        </div>
                                    </div>

                                    <div class="col-md-9 role-{{ $i }}-management-checkbox">
                                        @php
                                            $permissions = App\User::getpermissionsByGroupName($group->name);
                                            $j = 1;
                                        @endphp
                                        @foreach ($permissions as $permission)
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" name="permissions[]" id="checkPermission{{ $permission->id }}" value="{{ $permission->name }}">
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
     <script>
         /**
         * Check all the permissions
         */
         $("#checkPermissionAll").click(function(){
             if($(this).is(':checked')){
                 // check all the checkbox
                 $('input[type=checkbox]').prop('checked', true);
             }else{
                 // un check all the checkbox
                 $('input[type=checkbox]').prop('checked', false);
             }
         });
         function checkPermissionByGroup(className, checkThis){
            const groupIdName = $("#"+checkThis.id);
            const classCheckBox = $('.'+className+' input');
            if(groupIdName.is(':checked')){
                 classCheckBox.prop('checked', true);
             }else{
                 classCheckBox.prop('checked', false);
             }
         }
     </script>
     <!-- AdminLTE App -->
    <script src="{{ asset('backend/assets/dist/js/app.min.js') }}" type="text/javascript"></script>

    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('backend/assets/dist/js/pages/dashboard.js') }}" type="text/javascript"></script>
    
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('backend/assets/dist/js/demo.js') }}" type="text/javascript"></script>
@endsection