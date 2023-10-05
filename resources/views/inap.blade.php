@extends('layout.template')
@section('konten')
<body>
  @if ($konsultasis->count() > 0)
  @foreach ($konsultasis as $konsultasi)
    @csrf
      <div class="modal fade" id="exampleModal{{$konsultasi->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Konfirmasi penghapusan</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              Apakah anda yakin akan menghapus data Pasien atas nama {{$konsultasi->nama_lengkap}}?
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
              <form action="{{ route('deletePasien', $konsultasi->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Hapus</button>
              </form>
            </div>
          </div>
            </div>
          </div>
        </div>
      </div>
      @endforeach
      @endif
      <!-- JavaScript to show the notification after data deletion -->
      <script>
        $(document).ready(function() {
      // Check if the "deleted" parameter is present in the URL
      const urlParams = new URLSearchParams(window.location.search);
      if (urlParams.has('deleted')) {
          // Show the notification if the "deleted" parameter is found
          $("#deleteNotification").fadeIn().delay(2000).fadeOut();
      }
    });
  </script>

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
              <li class="menu-item">
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
            <li class="menu-item active">
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
          <!-- / Navbar -->
        {{-- sampe sini --}}

          {{-- isi konten --}}
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-body">
                    <h2 class="text-center">Data Konsultasi:</h2>
                    @if(Session::has('berhasil'))
                    <div class="alert alert-info alert-danger">
                        <i class="fa fa-coffee"></i>
                        Data Pasien Berhasil di <strong>Hapus</strong>
                    </div>
                    @endif
                    <form action="{{ route('data-konsultasi') }}" method="get">
                      @csrf
                      <div class="row mb-3">
                        <div class="col-md-3">
                          <label for="jenis_konsultasi">Jenis Konsultasi:</label>
                          <select class="form-control" name="jenis_konsultasi" id="jenis_konsultasi">
                            <option value="all" {{ $jenisKonsultasi === 'all' ? 'selected' : '' }}>Semua</option>
                            <option value="Rawat Inap" {{ $jenisKonsultasi === 'Rawat Inap' ? 'selected' : '' }}>Rawat Inap</option>
                            <option value="Mandiri" {{ $jenisKonsultasi === 'Mandiri' ? 'selected' : '' }}>Mandiri</option>
                          </select>
                        </div>
                        <div class="col-md-3">
                          <label for="nik">Cari berdasarkan No Rekam Medik:</label>
                          <input type="text" class="form-control" name="nik" id="nik" value="{{ $nik }}" placeholder="Masukkan NIK">
                        </div>
                        <div class="col-md-2">
                          <button class="btn btn-primary" type="submit">Filter</button>
                        </div>
                      </div>
                    </form>
                    <div class="table-responsive" >
                        <table class="table table-bordered">
                            <thead class="bg-light">
                                <tr>
                                    <th>Nama Lengkap</th>
                                    <th>Jenis Konsultasi</th>
                                    <th>Jenis Kelamin</th>
                                    <th>No Rekam Medik</th>
                                    <th>Umur</th>
                                    <th>Jumlah Kalori</th>
                                    <th>Waktu</th>
                                    <th colspan="2"><center>Aksi</center></th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($konsultasis->count() > 0)
                                    @foreach ($konsultasis as $konsultasi)
                                    <tr>
                                        <td>{{ $konsultasi->nama_lengkap }}</td>
                                        <td>{{ $konsultasi->jenis_konsultasi }}</td>
                                        <td>{{ $konsultasi->jenis_kelamin }}</td>
                                        <td>{{ $konsultasi->nik }}</td>
                                        <td>{{ $konsultasi->umur }}</td>
                                        <td>{{ $konsultasi->kalori }} KKAL</td>
                                        <td>{{ $konsultasi->created_at }}</td>
                                        <td><a href="{{ route('detailpasien', ['id'=> $konsultasi->id ])}}" class="btn btn-primary">Detail</a></td>
                                        <td>
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $konsultasi->id }}">
                                                Hapus
                                            </button>
                                        </td>
                                    </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="10">Tidak ada data konsultasi.</td>
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