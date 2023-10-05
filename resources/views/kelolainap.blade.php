@extends('layout.template')
@section('konten')
<body>
  @if ($data->count() > 0)
    @foreach ($data as $datas)
    @csrf
      <div class="modal fade" id="exampleModal{{$datas->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              Apakah anda yakin Pasien atas nama {{$datas->nama_lengkap}} telah diberikan kebutuhan kalori yang sesuai ?
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Belum</button>
              <form action="{{ route('deleteMenu', $datas->id) }}" method="POST">
                @method('PUT')
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-success">Ya</button>
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
              <a href="perawatan" class="menu-link">
                <i class="menu-icon tf-icons bx bx-detail"></i>
                <div data-i18n="Perawatan">Data Kamar</div>
              </a>
            </li>
            <li class="menu-item">
              <a href="input-pasien-rawatinap" class="menu-link">
                <i class="menu-icon tf-icons bx bx-detail"></i>
                <div data-i18n="input-pasien-rawatinap">Input Pasien</div>
              </a>
            </li>
            <li class="menu-item active">
              <a href="kelola-pasien-rawatinap" class="menu-link">
                <i class="menu-icon tf-icons bx bx-detail"></i>
                <div data-i18n="kelola-pasien-rawatinap">Data Pasien</div>
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
    
    <div class="container">
        <div class="container-p-y">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="container">
                                <h2 class="text-center mb-4">Data Pasien</h2>
                                <h2 class="text-center mb-4">Rawat Inap</h2>
                                <form action="/menu" method="get">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class="bg-info">
                                                <tr>
                                                    <th class="text-center">Nama Lengkap</th>
                                                    <th class="text-center">No RM</th>
                                                    <th class="text-center">Ruangan</th>
                                                    <th class="text-center">Jenis Kelamin</th>
                                                    <th class="text-center">Umur</th>
                                                    <th class="text-center">Jumlah Kalori</th>
                                                    <th colspan="2" class="text-center">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody class="bg-light">
                                                @if ($data->count() > 0)
                                                @foreach ($data as $item)
                                                <tr>
                                                    <td>{{ $item->nama_lengkap }}</td>
                                                    <td class="text-center">{{ $item->nik }}</td>
                                                    <td>{{ $item->kamars->nama_kamar }} No. {{ $item->kamars->kelas_kamar }}</td>
                                                    <td>{{ $item->jenis_kelamin }}</td>
                                                    <td class="text-center">{{ $item->umur }} Thn</td>
                                                    <td>{{ $item->kalori }} KKAL</td>
                                                    <td class="text-center">
                                                        <a href="{{ route('editpasien', ['id' => $item->id ]) }}" class="btn btn-secondary">Edit</a>
                                                    </td>
                                                    <td class="text-center">
                                                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $item->id }}">
                                                            Selesai
                                                        </button>
                                                    </td>
                                                </tr>
                                                @endforeach
                                                @else
                                                <tr>
                                                    <td colspan="6" class="text-center">Tidak ada data konsultasi.</td>
                                                </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
      
      
            <!-- Footer -->
            <footer class="content-footer footer bg-footer-theme">
              <div class="container-xxl d-flex flex-wrap center-content-between py-2 flex-md-row flex-column">
                <center>SIKKP@2023 Politeknik TEDC Bandung
              </div>
            </footer>

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