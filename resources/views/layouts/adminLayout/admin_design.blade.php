<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
  
  
  @include('layouts.adminLayout.admin_head')

<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  @include('layouts.adminLayout.admin_header')
  <!-- /.navbar -->
  
  <!-- Main Sidebar Container -->
  @include('layouts.adminLayout.admin_sidebar')
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          {{-- <div class="col-sm-6">
            <h1 class="m-0 text-dark">Starter Page</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Starter Page</li>
            </ol>
          </div><!-- /.col --> --}}
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        {{-- <div class="row"> --}}

          @yield('content')
          {{-- <div class="col-lg-6">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>

                <p class="card-text">
                  Some quick example text to build on the card title and make up the bulk of the card's
                  content.
                </p>

                <a href="#" class="card-link">Card link</a>
                <a href="#" class="card-link">Another link</a>
              </div>
            </div>

            <div class="card card-primary card-outline">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>

                <p class="card-text">
                  Some quick example text to build on the card title and make up the bulk of the card's
                  content.
                </p>
                <a href="#" class="card-link">Card link</a>
                <a href="#" class="card-link">Another link</a>
              </div>
            </div><!-- /.card -->
          </div> --}}
          <!-- /.col-md-6 -->
          {{-- <div class="col-lg-6"> --}}
            {{-- <div class="card">
              <div class="card-header">
                <h5 class="m-0">Featured</h5>
              </div>
              <div class="card-body">
                <h6 class="card-title">Special title treatment</h6>

                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
              </div>
            </div> --}}

            {{-- <div class="card card-primary card-outline">
              <div class="card-header">
                <h5 class="m-0">Featured</h5>
              </div>
              <div class="card-body">
                <h6 class="card-title">Special title treatment</h6>

                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
              </div>
            </div> --}}
          {{-- </div> --}}
          <!-- /.col-md-6 -->
        {{-- </div> --}}
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  @include('layouts.adminLayout.admin_beside')
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  @include('layouts.adminLayout.admin_footer')

</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->


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

<!-- Custom Plugin me  -->
<script src="{{url('admin/cus_plugin_me/jquery.validate.js')}}"></script>
<!-- Custom JS -->
<script src="{{url('admin/custom.js')}}"></script>


{{-- <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script> --}}
{{-- <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script> --}}

<!-- Summernote -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script src="{{url('admin/assets/plugins/summernote/summernote-bs4.min.js')}}"></script>


{{-- custom --}}
<script src="{{url('admin/cus_plugin_me/jquery-ui/jquery-ui.js')}}" integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30=" crossorigin="anonymous"></script>


{{-- swal --}}
{{-- <script src="sweetalert2.all.min.js"></script> --}}
<!-- Optional: include a polyfill for ES6 Promises for IE11 and Android browser -->
{{-- <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script> --}}

<script>




    $(function () {
      //Initialize Select2 Elements
      $('.select2bs4').select2({
        theme: 'bootstrap4'
      })
  
      //Initialize Select2 Elements
      $('.select2').select2()
  
      //Datemask dd/mm/yyyy
      $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
      //Datemask2 mm/dd/yyyy
      $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
      //Money Euro
      $('[data-mask]').inputmask()
  
      //Date range picker
      var minDate = new Date();
      var maxDate = "+1M";
      $('#reservation').daterangepicker(
        {
          // singleDatePicker: true,
          showDropdowns: true,
          minYear: 1901,
          startDate: moment().startOf('hour'),
        endDate: moment().startOf('hour').add(32, 'hour'),
          locale: {
            format: 'YYYY/MM/DD'
            // format: 'DD/MM/YYYY hh:mm A'
          },
          maxYear: parseInt(moment().format('YYYY'),10)
        }, 
        function(start, end, label) {
          // alert(start);
          // alert(end);

          var days = Math.floor((end - start)/1000/60/60/24);
          $('#honog').val(days);  

        });

      //Date range picker with time picker
      // $('#reservationtime').daterangepicker({
      //   timePicker: true,
      //   timePickerIncrement: 30,
      //   locale: {
      //     format: 'MM/DD/YYYY hh:mm A'
      //   }
      // })

      //Date range as a button
      // $('#from_date_cus,#to_date_cus').daterangepicker(
      //   {
      //     singleDatePicker: true,
      //     showDropdowns: true,
      //     minYear: 1901,
      //     locale: {
      //       format: 'DD/MM/YYYY'
      //       // format: 'DD/MM/YYYY hh:mm A'
      //     },
      //     maxYear: parseInt(moment().format('YYYY'),10)
      //   }, 
      //   function(start, end, label) {
          // alert(start);
          // alert(end);

        //   var days = Math.floor((end - start)/1000/60/60/24);
        //   $('#honog').val(days);  

        // });
        // function(start, end, label) {
        //   var years = moment().diff(start, 'years');
        //   alert("You are " + years + " years old!");
        // }
        
        // function (start, end) {
        //   $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
        // }
      
  
      //Timepicker
      $('#timepicker').datetimepicker({
        format: 'LT'
      })
      
      //Bootstrap Duallistbox
      $('.duallistbox').bootstrapDualListbox()
  
      //Colorpicker
      $('.my-colorpicker1').colorpicker()
      //color picker with addon
      $('.my-colorpicker2').colorpicker()
  
      $('.my-colorpicker2').on('colorpickerChange', function(event) {
        $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
      });
  
      $("input[data-bootstrap-switch]").each(function(){
        $(this).bootstrapSwitch('state', $(this).prop('checked'));
      });
  
    })
  </script>

  <!-- page script -->
<script>
    $(function () {
      // $("#example1").DataTable();
      $('#example1').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": true,
      });
    });
  </script>


{{-- summernote --}}
<script>
  $(function () {
    // Summernote
    $('.textarea').summernote({
      height: 200
    });
  })
</script>

</body>
</html>
