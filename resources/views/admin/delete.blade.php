@extends('layout.template')
@section('konten')
<body>
  @if ($level->count() > 0)
    @foreach ($level as $levels)
    @csrf
      <div class="modal fade" id="exampleModal{{$levels->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Konfirmasi penghapusan</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              Apakah anda yakin akan menghapus data atas nama {{$levels->name}}?
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
              <form action="{{ route('deleteUser', $levels->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Hapus</button>
            </form>
            </div>
          </div>
        </div>
      </div>
      @endforeach
      @endif
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
                <a href="admin-dashboard" class="menu-link">
                  <i class="menu-icon tf-icons bx bx-home-circle"></i>
                  <div data-i18n="Analytics">Dashboard</div>
                </a>
              </li>
              <li class="menu-item active">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                  <i class="menu-icon tf-icons bx bx-dock-top"></i>
                  <div data-i18n="Account Settings">Managemen User</div>
                </a>
                <ul class="menu-sub active">
                  <li class="menu-item">
                    <a href="data-user" class="menu-link">
                      <div data-i18n="Account">Kelola User</div>
                    </a>
                  </li>
                  <li class="menu-item">
                    <a href="register" class="menu-link">
                      <div data-i18n="Account">Input User</div>
                    </a>
                  </li>
                </ul>
              </li>
              
              <!-- Layouts -->
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
          <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-body">
                    <h2 class="text-center mb-4">Hapus User</h2>
                    <form action="delete" method="get">
                        <div class="mb-3">
                            <label for="level" class="form-label">Filter Level:</label>
                            <div class="d-flex">
                                <select class="form-select me-3" name="level" id="level">
                                    <option value="all" {{ $level === 'all' ? 'selected' : '' }}>Semua</option>
                                    <option value="admin" {{ $level === 'admin' ? 'selected' : '' }}>Admin</option>
                                    <option value="konsultan" {{ $level === 'konsultan' ? 'selected' : '' }}>Konsultan</option>
                                    <option value="rawatinap" {{ $level === 'rawatinap' ? 'selected' : '' }}>Rawat Inap</option>
                                    <option value="dapur" {{ $level === 'dapur' ? 'selected' : '' }}>Dapur</option>
                                </select>
                                <button class="btn btn-primary" type="submit">Filter</button>
                            </div>
                        </div>
                    </form>
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="bg-info">
                                <tr>
                                    <th class="text-center">Nama Lengkap</th>
                                    <th class="text-center">Username</th>
                                    <th class="text-center">Level</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="bg-light">
                                @if ($level->count() > 0)
                                @foreach ($level as $levels)
                                <tr>
                                    <td class="text-center">{{ $levels->name }}</td>
                                    <td class="text-center">{{ $levels->username }}</td>
                                    <td class="text-center">{{ $levels->level }}</td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $levels->id }}">
                                            Hapus
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="4" class="text-center">Tidak ada data</td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

                {{-- akhir konten --}}

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