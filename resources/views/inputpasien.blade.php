@extends('layout.template')
@section('konten')
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
            <li class="menu-item active">
              <a href="input-pasien-rawatinap" class="menu-link">
                <i class="menu-icon tf-icons bx bx-detail"></i>
                <div data-i18n="input-pasien-rawatinap">Input Pasien</div>
              </a>
            </li>
            <li class="menu-item">
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
        {{-- sampe sini --}}

          {{-- isi konten --}}
          
          <div class="container flex container-p-y">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-10">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="text-center">Kalkulator Kalori Harian</h2>
                            <center>
                                @if(Session::has('message'))
                                    {{ Session::get('message') }} KKAL
                                @endif
                            </center>
                            <form action="{{ route('input-pasien') }}" method="POST">
                                @csrf
                                <div class="table-responsive">
                                    <table class="table">
                                        <tr>
                                            <td>
                                                <label for="jenis_kelamin">Jenis Kelamin</label>
                                            </td>
                                            <td>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin_laki" value="Laki-laki" checked>
                                                    <label class="form-check-label" for="jenis_kelamin_laki">Laki-laki</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin_perempuan" value="Perempuan">
                                                    <label class="form-check-label" for="jenis_kelamin_perempuan">Perempuan</label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label for="nama">Nama Pasien</label>
                                            </td>
                                            <td>
                                                <input class="w-50" type="text" name="nama_lengkap" required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label for="jenis_konsultasi">Jenis Konsultasi</label>
                                            </td>
                                            <td>
                                                <select class="w-50" name="jenis_konsultasi">
                                                  <option value="Rawat Inap">Rawat Inap</option>
                                                    <option value="Mandiri">Mandiri</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label for="nik">No Rekam Medik</label>
                                            </td>
                                            <td>
                                                <input class="w-50" type="number" name="nik" id="nik" required maxlength="4" oninput="if (this.value.length > 4) this.value = this.value.slice(0, 4);">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label for="umur">Usia</label>
                                            </td>
                                            <td>
                                                <input class="w-50" type="number" name="umur" required maxlength="3" oninput="if (this.value.length > 3) this.value = this.value.slice(0, 3);">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label for="berat_badan">Berat Badan (kg)</label>
                                            </td>
                                            <td>
                                                <input class="w-50" type="number" name="berat_badan" required maxlength="3" oninput="if (this.value.length > 3) this.value = this.value.slice(0, 3);">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label for="tinggi_badan">Tinggi Badan (cm)</label>
                                            </td>
                                            <td>
                                                <input class="w-50" type="number" name="tinggi_badan" required maxlength="3" oninput="if (this.value.length > 3) this.value = this.value.slice(0, 3);">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label for="tinggi_badan">Ruangan</label>
                                            </td>
                                            <td>
                                              {{$data}}
                                                @csrf
                                                <select class="form-select" name="kamar_id" id="">
                                                    @if ($data->count() > 0)
                                                        @foreach($data->kamars as $datas)
                                                            <option value="{{$datas->id}}">Ruang: {{$datas->nama_kamar}}. Kelas: {{$datas->kelas_kamar}}</option>
                                                        @endforeach
                                                    @else
                                                        <option disabled>Tidak ada data kamar.</option>
                                                    @endif
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label for="no_kamar">No Kamar</label>
                                            </td>
                                            <td>
                                                <input class="w-25" type="number" name="no_kamar" required maxlength="3">
                                                <label for="bed">Bed</label>
                                                <input class="w-25" type="number" name="bed" required maxlength="3">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="text-center">
                                                <button class="btn btn-primary">Input</button>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        
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