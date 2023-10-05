<!DOCTYPE html>

<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Perhitungan Kebutuhan Kalori</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?= url('template/assets/img/favicon/login.png') ?>" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="<?= url('template/assets/vendor/fonts/boxicons.css') ?>" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="<?= url('template/assets/vendor/css/core.css') ?>" class="template-customizer-core-css" />
    <link rel="stylesheet" href="<?= url('template/assets/vendor/css/theme-default.css') ?>" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="<?= url('template/assets/css/demo.css') ?>" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="<?= url('template/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') ?>" />

    <link rel="stylesheet" href="<?= url('template/assets/vendor/libs/apex-charts/apex-charts.css') ?>" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="<?= url('template/assets/vendor/js/helpers.js') ?>"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="<?= url('template/assets/js/config.js') ?>"></script>
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme" >
          <div class="app-brand">
            <a href="dashboard" class="">
              <center><h4>Konsultasi Gizi</h4></center>
            </a>            
            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
          </div>

          <div class="menu-inner-shadow">
          </div>

          <ul class="menu-inner py-1">
            <li class="menu-header small text-uppercase"><span class="menu-header-text"><h5>{{auth()->user()->level}}</h5></li>
                <div></div>
                         {{-- copy dari sini --}}
            <!-- Dashboard -->
            <li class="menu-item active">
              <a href="dashboard" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
              </a>
            </li>

            <!-- Layouts -->
            <li class="menu-item">
              <a href="perhitungankalori" class="menu-link">
                <i class="menu-icon tf-icons bx bx-layout"></i>
                <div data-i18n="Perhitungan Kalori">Perhitungan Kalori</div>
              </a>
            </li>
            <li class="menu-item">
              <a href="visit-pasien-rawatinap" class="menu-link">
                <i class="menu-icon tf-icons bx bx-layout"></i>
                <div data-i18n="Perhitungan Kalori">Visit Pasien Rawat Inap</div>
              </a>
            </li>
            <li class="menu-item">
              <a href="data-konsultasi" class="menu-link">
                <i class="menu-icon tf-icons bx bx-table"></i>
                <div data-i18n="Rawat Inap">Data Konsultasi</div>
              </a>
            </li>
        <!-- Misc -->
        <li class="menu-header small text-uppercase"><span class="menu-header-text">Misc</span></li>
        <li class="menu-item">
          <a
            href="edit"class="menu-link"
          >
            <i class="menu-icon tf-icons bx bx-user"></i>
            <div data-i18n="update">Edit Profil</div>
          </a>
        </li>
    <li class="menu-item">
      <a
        href="/actionlogout"
        class="menu-link"
      >
        <i class="menu-icon tf-icons bx bx-power-off me-2"></i>
        <div data-i18n="login">Logout</div>
      </a>
    </li>
      </ul>
    </aside>
    <!-- Layout container -->
    <div class="layout-page">
      <!-- Navbar -->
      <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
        <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
          <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
            <i class="bx bx-menu bx-sm"></i>
          </a>
        </div>

        <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">

          <ul class="navbar-nav flex-row align-items-center ms-auto">
            <!-- User -->
            <a href="{{route('profil')}}" class="menu-link">
            {{auth()->user()->name}}
                <div class="avatar avatar-online">
                  <img src="{{ URL::asset('image/profile.png'); }}" width="100" height="100" alt="" class="w-px-40 h-auto rounded-circle">
                </div>
            </a>
          </ul>
        </div>
      </nav>
        {{-- sampe sini --}}
          <!-- / Navbar -->

          <header class="container-p-y text-black text-center">
            <div class="py-4">
                <h1 class="display-4">Selamat Datang</h1>
            </div>
        </header>
        
        
        <main class="container">
        
            <div class="col-12 py-10">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-sm-12 py-4">
                                <div class="card" style="background-color:rgba(122, 191, 255, 0.356);">
                                    <div class="card-body">
                                        <h4 class="card-title">Jumlah Pasien Konsultasi Mandiri: </h4>
                                        <a href="data-konsultasi" class="app-brand-link">
                                            <i class="menu-icon tf-icons bx bx-file"></i>
                                            <h4 class="card-text">{{ $mandiriCount}} Pasien</h4>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 py-4">
                                <div class="card" style="background-color:rgb(158, 255, 113);">
                                    <div class="card-body">
                                        <h4 class="card-title">Jumlah Pasien Konsultasi Rawat Inap: </h4>
                                        <a href="data-konsultasi" class="app-brand-link">
                                            <i class="menu-icon tf-icons bx bx-file"></i>
                                            <h4 class="card-text">{{ $rawatInapCount}} Pasien</h4>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        
            <!-- Footer -->
            <footer class="content-footer footer bg-footer-theme">
              <div class="container-xxl d-flex flex-wrap center-content-between py-2 flex-md-row flex-column">
                <center>SIKKP@2023 Politeknik TEDC Bandung
              </div>
            </footer>
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->
    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="<?= url('template/assets/vendor/libs/jquery/jquery.js')?>"></script>
    <script src="<?= url('template/assets/vendor/libs/popper/popper.js')?>"></script>
    <script src="<?= url('template/assets/vendor/js/bootstrap.js')?>"></script>
    <script src="<?= url('template/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')?>"></script>

    <script src="<?= url('template/assets/vendor/js/menu.js')?>"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="<?= url('template/assets/vendor/libs/apex-charts/apexcharts.js')?>"></script>

    <!-- Main JS -->
    <script src="<?= url('template/assets/js/main.js')?>"></script>

    <!-- Page JS -->
    <script src="<?= url('template/assets/js/dashboards-analytics.js')?>"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>
