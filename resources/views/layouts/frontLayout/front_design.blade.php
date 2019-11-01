<!DOCTYPE html>

<html lang="en">
  
  
  @include('layouts.frontLayout.front_head')


<body>
<!-- Navbar -->
  @include('layouts.frontLayout.front_header')
     @yield('content')
  {{-- @include('layouts.frontLayout.front_footer') --}}





<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Custom Plugin me  -->
<script src="{{url('customer/cus_plugin_me/jquery.validate.js')}}"></script>

<!-- InputMask -->
<script src="{{url('admin/assets/plugins/moment/moment.min.js')}}"></script>
<script src="{{url('admin/assets/plugins/inputmask/min/jquery.inputmask.bundle.min.js')}}"></script> 

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
{{-- custom js  --}}
<script src="{{url('customer/custom.js')}}"></script>


{{-- date time picker --}}
   <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>


</body>
</html>