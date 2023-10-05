@extends('layout.template')
@section('konten')
<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme" >
            <div class="app-brand">
              <a href="{{route('admin-dashboard')}}" class="">
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
                <a href="{{route('admin-dashboard')}}" class="menu-link">
                  <i class="menu-icon tf-icons bx bx-home-circle"></i>
                  <div data-i18n="Analytics">Dashboard</div>
                </a>
              </li>
              <li class="menu-item active">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                  <i class="menu-icon tf-icons bx bx-dock-top"></i>
                  <div data-i18n="Account Settings">Managemen Akun</div>
                </a>
                <ul class="menu-sub active">
                  <li class="menu-item">
                    <a href="{{route('data-user')}}" class="menu-link">
                      <div data-i18n="Account">Kelola User</div>
                    </a>
                  </li>
                  <li class="menu-item">
                    <a href="{{route('register')}}" class="menu-link">
                      <div data-i18n="Account">Input User</div>
                    </a>
                  </li>
                  <li class="menu-item">
                </ul>
              </li>
              <!-- Layouts -->
              <li class="menu-item">
                <a href="{{route('data-konsultasi')}}" class="menu-link">
                  <i class="menu-icon tf-icons bx bx-table"></i>
                  <div data-i18n="Rawat Inap">Data Konsultasi</div>
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
              <title>Edit User</title>
              
              <!-- Include Bootstrap CSS -->
              <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
              <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
          </head>
          <body>
              <div class="container my-5">
                  <div class="card">
                      <div class="card-header">
                          <h1 class="card-title">Edit User</h1>
                      </div>
                      <div class="card-body">
                          <form method="POST" action="{{ route('data-update', $user) }}">
                              @csrf
                              @method('PUT')
                          
                              <div class="mb-3">
                                  <label for="name" class="form-label">Nama Lengkap:</label>
                                  <input type="text" id="name" name="name" value="{{ $user->name }}" class="form-control" required>
                              </div>
                          
                              <div class="mb-3">
                                  <label for="username" class="form-label">Username:</label>
                                  <input type="text" id="username" name="username" value="{{ $user->username }}" class="form-control" required>
                              </div>
                          
                              <div class="mb-3">
                                  <label for="level" class="form-label">Level:</label>
                                  <select id="level" name="level" class="form-control" required>
                                      <option value="admin" {{ $user->level === 'admin' ? 'selected' : '' }}>Admin</option>
                                      <option value="rawatinap" {{ $user->level === 'rawatinap' ? 'selected' : '' }}>Perawat</option>
                                      <option value="dapur" {{ $user->level === 'dapur' ? 'selected' : '' }}>Dapur</option>
                                      <option value="konsultan" {{ $user->level === 'konsultan' ? 'selected' : '' }}>Konsultan</option>
                                  </select>
                              </div>
                          
                              @if(Session::has('berhasil'))
                              <div class="alert alert-info alert-dismissible fade show">
                                  <i class="fa fa-coffee"></i>
                                  Profil telah di <strong>Update</strong>
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                  </button>
                              </div>
                              @endif
                          
                              <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                          </form>
                          
                          <form method="POST" action="{{ route('admin.reset-password', $user) }}" class="mt-3">
                              @csrf
                              <button type="submit" class="btn btn-warning">Reset Password Kembali Ke Semula</button>
                          
                              @if(Session::has('bisa'))
                              <div class="alert alert-info alert-dismissible fade show mt-3">
                                  <i class="fa fa-coffee"></i>
                                  Password sudah di <strong>Reset</strong>
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                  </button>
                              </div>
                              @endif
                          </form>
                      </div>
                  </div>
              </div>
          
              <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
              <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
              <script>
                  $(document).ready(function() {
                      // Close the notification when the close button is clicked
                      $("#notification .close").on('click', function() {
                          $("#notification").alert('close');
                      });
                  });
              </script>
          </body>
          </html>
          <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

          
            
            
            
            
            
            
            
          
              <!-- Include Bootstrap JS (optional) -->

          
            
            
        
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
