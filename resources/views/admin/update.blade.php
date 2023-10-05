@extends('layout.template')
@section('konten')
<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme" >
          <div class="app-brand">
            <a href="admin-dashboard" class="">
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
                <a href="dashboard" class="menu-link">
                  <i class="menu-icon tf-icons bx bx-home-circle"></i>
                  <div data-i18n="Analytics">Dashboard</div>
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
          <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-primary text-center">Edit Profile</h1>
        <hr>
        <div class="col-md-9 mx-auto">
            <div class="alert alert-info alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="fa fa-coffee"></i>
                Perhatikan <strong>Password lama</strong> anda, jika lupa <strong>Password lama</strong> silahkan hubungi admin.
            </div>
            <h3 class="mb-4">Personal info</h3>
            <form class="form-horizontal" role="form" action="{{ route('admin.update') }}" method="post">
                @csrf
                @method('put')
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label">Nama Lengkap :</label>
                    <div class="col-lg-8">
                        <input class="form-control" type="text" name="name" id="name" required value="{{ old('name') ?? $user->name }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label">Level :</label>
                    <div class="col-lg-8">
                       {{auth()->user()->level}}
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label" for="username">Username :</label>
                    <div class="col-lg-8">
                        <input class="form-control" type="text" name="username" id="username" required value="{{ old('username') ?? $user->username }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label" for="current_password">Password Lama</label>
                    <div class="col-lg-8">
                        <input class="form-control" type="password" name="current_password" id="current_password" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-10 col-form-label" for="password">Password Baru (kosongkan jika tidak ingin diubah)</label>
                    <div class="col-lg-8">
                        <input class="form-control" type="password" name="password" id="password" minlength="6">
                    </div>
                </div>
                @if(Session::has('salah'))
                <div class="alert alert-info alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <i class="fa fa-coffee"></i>
                    Password Lama anda <strong>Salah</strong>
                </div>
                @endif
                @if(Session::has('benar'))
                <div class="alert alert-info alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <i class="fa fa-coffee"></i>
                    Profil berhasil di<strong>Update</strong>
                </div>
                @endif
                <div class="mt-5 text-center">
                    <button class="btn btn-primary profile-button" type="submit">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

        <hr>
          
            
            
        
              {{-- Akhir konten --}}
                  
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
@endsection
