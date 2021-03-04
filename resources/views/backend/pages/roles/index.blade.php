@extends('backend.layouts.master')

@section('title')
    Dashboard-Admin Panel
@endsection

@section('styles')
    <!-- DATA TABLES -->
    <link href="{{ asset('backend/assets/plugins/datatables/dataTables.bootstrap.css')}}" rel="stylesheet" type="text/css" />  
@endsection

@section('admin-content')

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Role Page-Admin Panel
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
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Roles List</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Si</th>
                <th>Name</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($roles as $role)
              <tr>
                <td>{{$loop->index=1}}</td>
              <td>{{ $role->name }}</td>
                <td>
                  <a class="btn btn-success text-white" href="{{ route('admin.roles.edit', $role->id) }}">Edit</a>
                  <a class="btn btn-danger text-white" href="">Delete</a>
                </td>
              </tr>
              @endforeach
            </tbody>
            <tfoot>
              <tr>
                <th>Si</th>
                <th>Name</th>
                <th>Action</th>
              </tr>
            </tfoot>
          </table>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!-- /.col -->
  </div><!-- /.row -->
</section><!-- /.content -->

@endsection

@section('scripts')
    <!-- jQuery 2.1.3 -->
    <script src="{{ asset('backend/assets/plugins/jQuery/jQuery-2.1.3.min.js') }}"></script>
    
    <!-- DATA TABES SCRIPT -->
    <script src="{{ asset('backend/assets/plugins/datatables/jquery.dataTables.js') }}" type="text/javascript"></script>
    <script src="{{ asset('backend/assets/plugins/datatables/dataTables.bootstrap.js') }}" type="text/javascript"></script>
    <!-- FastClick -->
    <script src="{{ asset('backend/assets/plugins/fastclick/fastclick.min.js') }}" ></script>
    <!-- page script -->
    <script type="text/javascript">
      $(function () {
        $("#example1").dataTable();
        $('#example2').dataTable({
          "bPaginate": true,
          "bLengthChange": false,
          "bFilter": false,
          "bSort": true,
          "bInfo": true,
          "bAutoWidth": false
        });
      });
    </script>
    <!-- AdminLTE App -->
    <script src="{{ asset('backend/assets/dist/js/app.min.js') }}" type="text/javascript"></script>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('backend/assets/dist/js/pages/dashboard.js') }}" type="text/javascript"></script>

<!-- AdminLTE for demo purposes -->
<script src="{{ asset('backend/assets/dist/js/demo.js') }}" type="text/javascript"></script>
@endsection