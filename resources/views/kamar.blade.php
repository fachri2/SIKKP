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
            <a href="{{route('dashboard')}}" class="">
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
            <li class="menu-item">
              <a href="{{route('dashboard')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
              </a>
            </li>

            <!-- Layouts -->
            <li class="menu-item">
              <a href="{{route('perawatan')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-detail"></i>
                <div data-i18n="Perawatan">Data Kamar</div>
              </a>
            </li>
            <li class="menu-item">
              <a href="{{route('inputpasien')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-detail"></i>
                <div data-i18n="input-pasien-rawatinap">Input Pasien</div>
              </a>
            </li>
            <li class="menu-item active">
              <a href="{{route('kelola-pasien')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-detail"></i>
                <div data-i18n="kelola-pasien-rawatinap">Data Pasien</div>
              </a>
            </li>
        <!-- Misc -->
        <li class="menu-header small text-uppercase"><span class="menu-header-text">Misc</span></li>
        <li class="menu-item">
          <a
            href="{{route('edit')}}"class="menu-link"
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
            <!-- / Navbar -->
    {{-- isi konten --}}
    <div class="row">
      @if ($detail->count() > 0)
          @foreach ($detail as $item)
              <div class="col-lg-6 col-md-6 col-sm-12 mt-5">
                  <div class="card" style="background-color: rgba(122, 191, 255, 0.356);">
                      <div class="card-body">
                          <h3 class="card-title">Nama Kamar: {{ $item->kamars->nama_kamar }}</h3>
                          <h3 class="card-title">Kelas: {{ $item->kamars->kelas_kamar }}</h3>
                          <h3 class="card-title">Nama Pasien: {{ $item->pasiens->nama_lengkap }}</h3>
                          <p class="card-text">Keterangan: {{ $item->pasiens->keterangan }}</p>
                          <p class="card-text">Id Pasien: {{ $item->pasiens->id }}</p>
                      </div>
                  </div>
              </div>
          @endforeach
      @else
          <div class="col-12 mt-3">
              <div class="alert alert-info" role="alert">
                  Tidak ada pasien dalam kamar ini.
              </div>
          </div>
      @endif
  </div>
  <footer class="content-footer footer bg-footer-theme">
    <div class="container-xxl d-flex flex-wrap center-content-between py-2 flex-md-row flex-column">
      <center>SIKKP@2023 Politeknik TEDC Bandung
    </div>
  </footer>
  
</body>
</html>
