<!DOCTYPE html>

<html lang="en">
  
  
  @include('layouts.frontLayout.front_head')


<body>
<!-- Navbar -->
  @include('layouts.frontLayout.front_header')
     @yield('content')
  {{-- @include('layouts.frontLayout.front_footer') --}}



<!-- jQuery -->
<script src="{{url('admin/assets/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{url('admin/assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- DataTables -->
<script src="{{url('admin/assets/plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{url('admin/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
<!-- Select2 -->
<script src="{{url('admin/assets/plugins/select2/js/select2.full.min.js')}}"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="{{url('admin/assets/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js')}}"></script>
<!-- InputMask -->
<script src="{{url('admin/assets/plugins/moment/moment.min.js')}}"></script>
<script src="{{url('admin/assets/plugins/inputmask/min/jquery.inputmask.bundle.min.js')}}"></script>
<!-- date-range-picker -->
<script src="{{url('admin/assets/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- bootstrap color picker -->
<script src="{{url('admin/assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{url('admin/assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Bootstrap Switch -->
<script src="{{url('admin/assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{url('admin/assets/dist/js/adminlte.min.js')}}"></script>
</body>
</html>