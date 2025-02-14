<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="/admin/view-bookings" class="brand-link">
    <img src="{{asset('admin/images/logm-o.png')}}" alt="," class="brand-image img-circle elevation-3"
         style="opacity: .8">
    {{-- <span class="brand-text font-weight-light">MYHOTEL</span> --}}
  </a>
  
  <?php $url = url()->current(); ?>
  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        {{-- <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image"> --}}
      </div>
      <div class="info">
        <a href="#" class="d-block">Удирдлагын хэсэг</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
             
        {{-- =============================================
          Захиалга
         --}}


        <li class="nav-item has-treeview menu-close">
          <a href="#" <?php if(preg_match("/booking/i", $url) || preg_match("/booking/i", $url) ){ ?>class="nav-link active" <?php }?>  class="nav-link ">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Захиалга
              <i class="right fas fa-angle-left"></i>
              {{-- <span class="badge badge-info right">6</span> --}}
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="/admin/booking/add-booking" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Нэмэх</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/admin/booking/view-bookings" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Бүгд</p>
              </a>
            </li>
          </ul>
        </li>




        {{-- ====================================================
          Зочид буудал 
         --}}
        <li class="nav-item has-treeview menu-close">
          {{-- <a href="#" class="nav-link "> --}}
              <a href="#" <?php if(preg_match("/hotel/i", $url) || preg_match("/hotel/i", $url) ){ ?>class="nav-link active" <?php }?>  class="nav-link ">
              <i class="fas fa-hotel"></i>
            <p>
              Зочид буудал
              <i class="right fas fa-angle-left"></i>
              {{-- <span class="right badge badge-danger">1</span> --}}
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="/admin/hotel/add-hotel" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Нэмэх</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/admin/hotel/view-hotels" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Бүгд</p>
              </a>
            </li>
          </ul>
        </li>


        {{-- ======================================================
          Өрөө 
         --}}
        <li class="nav-item has-treeview menu-close">
            <a href="#" <?php if(preg_match("/room/i", $url) || preg_match("/room/i", $url) ){ ?>class="nav-link active" <?php }?>  class="nav-link ">
          {{-- <a href="#" class="nav-link "> --}}
              <i class="fas fa-bed"></i> 
            <p>
              Өрөө
              <i class="right fas fa-angle-left"></i>
              {{-- <span class="right badge badge-danger">1</span> --}}
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="/admin/room/add-room" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Нэмэх</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/admin/room/view-rooms" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Бүгд</p>
              </a>
            </li>
          </ul>
        </li>


        {{-- ======================================================
          Үнэ 
         --}}
        <li class="nav-item has-treeview menu-close">
          {{-- <a href="#" class="nav-link "> --}}
            <a href="#" <?php if(preg_match("/rate/i", $url) || preg_match("/rate/i", $url) ){ ?>class="nav-link active" <?php }?>  class="nav-link ">
              <i class="fas fa-bed"></i> 
            <p>
              Үнэ
              <i class="right fas fa-angle-left"></i>
              {{-- <span class="right badge badge-danger">1</span> --}}
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="/admin/rate/add-rate" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Нэмэх</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/admin/rate/view-rates" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Бүгд</p>
              </a>
            </li>
          </ul>
        </li>


        {{-- ======================================================
          Хэрэглэл 
         --}}
        <li class="nav-item has-treeview menu-close">
          {{-- <a href="#" class="nav-link "> --}}
            <a href="#" <?php if(preg_match("/facility/i", $url) || preg_match("/facility/i", $url) ){ ?>class="nav-link active" <?php }?>  class="nav-link ">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Үйлчилгээ
              <i class="right fas fa-angle-left"></i>
              {{-- <span class="right badge badge-danger">1</span> --}}
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="/admin/facility/add-facility" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Нэмэх</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/admin/facility/view-facilities" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Бүгд</p>
              </a>
            </li>
          </ul>
        </li>


        {{-- ======================================================
          Чиглэл 
         --}}
        <li class="nav-item has-treeview menu-close">
            <a href="#" <?php if(preg_match("/destination/i", $url) || preg_match("/destination/i", $url) ){ ?>class="nav-link active" <?php }?>  class="nav-link ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Чиглэл
              <i class="right fas fa-angle-left"></i>
              {{-- <span class="right badge badge-danger">1</span> --}}
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="/admin/destination/add-destination" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Нэмэх</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/admin/destination/view-destinations" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Бүгд</p>
              </a>
            </li>
          </ul>
        </li>


      
     



      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>