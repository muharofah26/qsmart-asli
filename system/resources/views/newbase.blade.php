<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="utf-8" />
 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
 <title>Q-SMART</title>
 <!-- plugins:css -->
 <link rel="stylesheet" href="{{url('public')}}/assets/vendors/mdi/css/materialdesignicons.min.css">
 <link rel="stylesheet" href="{{url('public')}}/assets/vendors/flag-icon-css/css/flag-icon.min.css">
 <link rel="stylesheet" href="{{url('public')}}/assets/vendors/css/vendor.bundle.base.css">
 <!-- endinject -->
 <!-- Plugin css for this page -->
 <link rel="stylesheet" href="{{url('public')}}/assets/vendors/jquery-bar-rating/css-stars.css" />
 <link rel="stylesheet" href="{{url('public')}}/assets/vendors/font-awesome/css/font-awesome.min.css" />
 <!-- End plugin css for this page -->
 <!-- inject:css -->
 <!-- endinject -->
 <!-- Layout styles -->
 <link rel="stylesheet" href="{{url('public')}}/assets/css/demo_1/style.css" />
 <!-- End layout styles -->
 <link rel="shortcut icon" href="{{url('public')}}/assets/logo.png" />
</head>
<body>
  <div class="container-scroller">
    <!-- partial:../../partials/_sidebar.html -->
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
      <ul class="nav">
        @include('template.sidebar')
      </ul>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:../../partials/_settings-panel.html -->
      <div id="settings-trigger"><i class="mdi mdi-settings"></i></div>
      <div id="theme-settings" class="settings-panel">
        <i class="settings-close mdi mdi-close"></i>
        <p class="settings-heading">SIDEBAR SKINS</p>
        <div class="sidebar-bg-options selected" id="sidebar-default-theme">
          <div class="img-ss rounded-circle bg-light border mr-3"></div>Default
        </div>
        <div class="sidebar-bg-options" id="sidebar-dark-theme">
          <div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark
        </div>
        <p class="settings-heading mt-2">HEADER SKINS</p>
        <div class="color-tiles mx-0 px-4">
          <div class="tiles default primary"></div>
          <div class="tiles success"></div>
          <div class="tiles warning"></div>
          <div class="tiles danger"></div>
          <div class="tiles info"></div>
          <div class="tiles dark"></div>
          <div class="tiles light"></div>
        </div>
      </div>
      <!-- partial -->
      <!-- partial:../../partials/_navbar.html -->

      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="navbar-menu-wrapper d-flex align-items-stretch">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-chevron-double-left"></span>
          </button>
          <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
            <a class="navbar-brand brand-logo-mini" href="../../index.html"><img src="../../../assets/images/logo-mini.svg" alt="logo" /></a>
          </div>
          <ul class="navbar-nav">
          </ul>
          <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item nav-logout d-none d-md-block mr-3">
              <a class="nav-link" href="#">Status</a>
            </li>
            <li class="nav-item nav-logout d-none d-md-block">
              <button class="btn btn-sm btn-danger">Trailing</button>
            </li>
            <li class="nav-item nav-profile dropdown d-none d-md-block">
              <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                <div class="nav-profile-text text-capitalize">
                  {{
                    Auth::guard('admin')->user()->nama 
                    ?? Auth::guard('pengajar')->user()->pengajar_nama 
                    ?? Auth::guard('siswa')->user()->siswa_nama 
                  }} 
                </div>
              </a>
              <div class="dropdown-menu center navbar-dropdown" aria-labelledby="profileDropdown">
                <a class="dropdown-item" href="#">
                  <i class="flag-icon flag-icon-bl mr-3"></i> French </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">
                    <i class="flag-icon flag-icon-cn mr-3"></i> Chinese </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">
                      <i class="flag-icon flag-icon-de mr-3"></i> German </a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">
                        <i class="flag-icon flag-icon-ru mr-3"></i>Russian </a>
                      </div>
                    </li>
                    <li class="nav-item nav-logout d-none d-lg-block">
                      <a class="nav-link" href="../../index.html">
                        <i class="mdi mdi-home-circle"></i>
                      </a>
                    </li>
                  </ul>
                  <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                    <span class="mdi mdi-menu"></span>
                  </button>
                </div>
              </nav>
              <!-- partial -->
              <div class="main-panel">
                <div class="content-wrapper">
                  <div class="page-header">
                    <h3 class="page-title">Material design icons</h3>
                  </div>
                  <div class="row">

                    @yield('content')
                  </div>
                </div>
                <!-- partial:../../partials/_footer.html -->
                <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Qsmart {{date('Y')}}</span>
            </div>

            <div>
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block"> Distributed By: Politeknik Negeri Ketapang</span>
            </div>
          </footer>
                <!-- partial -->
              </div>
            </div>
          </div>
          <!-- plugins:js -->



          <script src="{{url('public')}}/assets/vendors/js/vendor.bundle.base.js"></script>
          <!-- endinject -->
          <!-- Plugin js for this page -->
          <script src="{{url('public')}}/assets/vendors/jquery-bar-rating/jquery.barrating.min.js"></script>
          <script src="{{url('public')}}/assets/vendors/chart.js/Chart.min.js"></script>
          <script src="{{url('public')}}/assets/vendors/flot/jquery.flot.js"></script>
          <script src="{{url('public')}}/assets/vendors/flot/jquery.flot.resize.js"></script>
          <script src="{{url('public')}}/assets/vendors/flot/jquery.flot.categories.js"></script>
          <script src="{{url('public')}}/assets/vendors/flot/jquery.flot.fillbetween.js"></script>
          <script src="{{url('public')}}/assets/vendors/flot/jquery.flot.stack.js"></script>
          <!-- End plugin js for this page -->
          <!-- inject:js -->
          <script src="{{url('public')}}/assets/js/off-canvas.js"></script>
          <script src="{{url('public')}}/assets/js/hoverable-collapse.js"></script>
          <script src="{{url('public')}}/assets/js/misc.js"></script>
          <script src="{{url('public')}}/assets/js/settings.js"></script>
          <script src="{{url('public')}}/assets/js/todolist.js"></script>
          <!-- endinject -->
          <!-- Custom js for this page -->
          <script src="{{url('public')}}/assets/js/dashboard.js"></script>
          <!-- End custom js for this page -->

          <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
          <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
          <!-- Notifikasi -->
          @foreach(['success', 'warning', 'error', 'info'] as $status)
          @if (session($status))
          <script>
            Swal.fire({
              icon: "{{ $status }}",
              title: "{{ Str::upper($status) }}",
              text: "{{ session($status) }}!",
              showConfirmButton: false,
              timer: 15000
            })
          </script>
          @endif
          @endforeach

          <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
          <!-- End custom js for this page -->
        </body>
        </html>