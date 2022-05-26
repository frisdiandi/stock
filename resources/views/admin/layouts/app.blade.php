@auth
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Admin | Furgetech</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{url('asset-admin')}}/vendors/feather/feather.css">
  <link rel="stylesheet" href="{{url('asset-admin')}}/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="{{url('asset-admin')}}/vendors/css/vendor.bundle.base.css">
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="{{url('asset-admin')}}/vendors/mdi/css/materialdesignicons.min.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="{{url('asset-admin')}}/vendors/select2/select2.min.css">
  <link rel="stylesheet" href="{{url('asset-admin')}}/vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
  <!-- Plugin css for this page -->
  <link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{url('asset-admin')}}/css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{url('asset-admin')}}/images/favicon.png" />

  <script src="{{url('asset-admin')}}/js/jquery-3.4.1.min.js"></script>

  <style type="text/css">
    .badge-reservasi {
      color: #fff;
      background-color: #FF007F;
    }
    .badge-proses  {
      color: #fff;
      background-color: #FF00FF;
    }
  </style>

  @yield('head')
</head>

<body>
  @yield('modal')
  <div class="container-scroller">
    <!-- partial:{{url('asset-admin')}}/partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="/"><img src="{{url('asset-admin')}}/images/logo.png" class="mr-2"
            alt="logo" width="100%" /></a>
        <a class="navbar-brand brand-logo-mini" href="/"><img src="{{url('asset-admin')}}/images/logo-mini.png"
            alt="logo" width="100%" /></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <img src="{{url('asset-admin')}}/images/user.png" alt="profile" />
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a href="/admin/change" class="dropdown-item">
                <i class="ti-settings text-primary"></i>
                Change Password
              </a>
              <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                <i class="ti-power-off text-primary"></i>
                Logout
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>

            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
          data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:{{url('asset-admin')}}/partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item @if ($activePage == 'dashboard') active @endif">
            <a class="nav-link" href="/admin/home">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          @if(Auth::User()->level == "1")
          <li class="nav-item @if ($activePage == 'master') active @endif">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="ti-settings menu-icon"></i>
              <span class="menu-title">Data Master</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="/admin/satuan">Data Satuan</a></li>
                <li class="nav-item"> <a class="nav-link" href="/admin/jenis_barang">Data Jenis Barang</a></li>
              </ul>
            </div>
          </li>
          @endif
          <li class="nav-item @if ($activePage == 'absen') active @endif">
            <a class="nav-link" href="/admin/barang">
              <i class="ti-archive menu-icon"></i>
              <span class="menu-title">Data Barang</span>
            </a>
          </li>
          <li class="nav-item @if ($activePage == 'setting') active @endif">
            <a class="nav-link" data-toggle="collapse" href="#ui-setting" aria-expanded="false" aria-controls="ui-setting">
              <i class="ti-agenda menu-icon"></i>
              <span class="menu-title">Data Transaksi</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-setting">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="/admin/barang_masuk">Data Barang Masuk</a></li>
                <li class="nav-item"> <a class="nav-link" href="/admin/barang_keluar">Data Barang Keluar</a></li>
              </ul>
            </div>
          </li>
        </ul>
      </nav>
      @yield('content')
              <!-- partial:{{url('asset-admin')}}/partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © Furgetech <?php echo date('Y'); ?>. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Designed By <a href="https://www.furgetech.com/" target="_blank">Furgetech Theme</a></span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
    <!-- plugins:js -->
  <script src="{{url('asset-admin')}}/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="{{url('asset-admin')}}/vendors/chart.js/Chart.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="{{url('asset-admin')}}/js/off-canvas.js"></script>
  <script src="{{url('asset-admin')}}/js/hoverable-collapse.js"></script>
  <script src="{{url('asset-admin')}}/js/template.js"></script>
  <script src="{{url('asset-admin')}}/js/settings.js"></script>
  <script src="{{url('asset-admin')}}/js/todolist.js"></script>
  <script src="{{url('asset-admin')}}/js/tabs.js"></script>
  <script src="{{url('asset-admin')}}/js/tooltips.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="{{url('asset-admin')}}/js/Chart.roundedBarCharts.js"></script>

  <script src="{{url('asset-admin')}}/vendors/select2/select2.min.js"></script>
  <script src="{{url('asset-admin')}}/js/select2.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
  <!-- End custom js for this page-->
  <script type="text/javascript">
    $(document).ready(function() {
      $('#examples').DataTable();
    } );
    for (let i = 1; i <= 100; i++) {
      $(document).ready(function() {
        $('#example'+i).DataTable();
      } );
    }
  </script>
  <script>
    window.setTimeout(function() {
      $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
      });
    }, 3000);
    $(function () {
      $('[data-toggle="tooltip"]').tooltip()
    })
    $('.carousel').carousel({
      interval: false,
    });
  </script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    @yield('script')
  </body>
</html>

@endauth
@guest
  <script>window.location = "/login";</script>
@endguest