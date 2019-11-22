<!DOCTYPE html>

<html lang="en">
  
  
  @include('layouts.frontLayout.front_head')


<body>
<!-- Navbar -->
  @include('layouts.frontLayout.front_header')
     @yield('content')
  {{-- @include('layouts.frontLayout.front_footer') --}}





<!-- jQuery library -->
<script src="{{url('customer/template_assets/jquery.min.js')}}"></script>

<!-- Custom Plugin me  -->
<script src="{{url('customer/cus_plugin_me/jquery.validate.js')}}"></script>

<!-- InputMask -->
<script src="{{url('admin/assets/plugins/moment/moment.min.js')}}"></script>
<script src="{{url('admin/assets/plugins/inputmask/min/jquery.inputmask.bundle.min.js')}}"></script> 

<!-- Popper JS -->
<script src="{{url('customer/template_assets/popper.min.js')}}"></script>

<!-- Latest compiled JavaScript -->
<script src="{{url('customer/template_assets/bootstrap.min.js')}}"></script>

{{-- date time picker --}}
<script src="{{url('customer/template_assets/bootstrap-datetimepicker.min.js')}}"></script>

{{-- custom js  --}}
<script src="{{url('customer/custom.js')}}"></script>

{{-- 
<script src="https://cdnjs.cloudflare.com/ajax/libs/headroom/0.10.3/headroom.min.js" integrity="sha256-DXRDwre7SI85oVANz903ySeRkl2VAd+L+5r77BbXQjc=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.js" integrity="sha256-yDarFEUo87Z0i7SaC6b70xGAKCghhWYAZ/3p+89o4lE=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.min.js" integrity="sha256-JtQPj/3xub8oapVMaIijPNoM0DHoAtgh/gwFYuN5rik=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/countdown/2.6.0/countdown.min.js" integrity="sha256-SECU2CXX/L0UAxX9pvFJ6cs1qiGsPEFDmVSGndEJRsE=" crossorigin="anonymous"></script> --}}

{{-- template  --}}
<script src="{{url('customer/template_assets/spaces.js')}}"></script>

   

</body>
</html>