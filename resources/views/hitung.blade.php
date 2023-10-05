@extends('layout.template')
@section('konten')
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
              <a href="{{route('perhitungankalori')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-layout"></i>
                <div data-i18n="Perhitungan Kalori">Perhitungan Kalori</div>
              </a>
            </li>
            <li class="menu-item active">
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
        {{-- sampe sini --}}

          {{-- isi konten --}}
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
            <div class="card">
                <div class="card-body">
                    <h2 class="text-center">Kalkulator Kalori Harian</h2>
      
                    <table class="table mt-4">
                        <thead class="bg-info">
                            <tr>@if(Session::has('nama'))
                                <th colspan="2" class="text-center"> 
                                  Perhitungan Pasien Atas Nama {{ Session::get('nama') }} yaitu :
                                    </th>
                                  @endif
                            </tr>
                        </thead>
                        <tbody class="bg-light">
                          <tr>
                              <td>
                                  @if(Session::has('bmi'))
                                  Dengan BMI {{ Session::get('bmi') }}
                                  @endif
                              </td>
                              <td>
                                  <center>
                                      @if(Session::has('kbmi'))
                                      {{ Session::get('kbmi') }}
                                      @endif
                                  </center>
                              </td>
                          </tr>
                          <tr>
                              <td>
                                  @if(Session::has('nama'))
                                  Perhitungan Awal kebutuhan kalori atas nama pasien {{ Session::get('nama') }} yaitu :
                                  @endif
                              </td>
                              <td>
                                  <center>
                                      @if(Session::has('bmr1'))
                                      {{ Session::get('bmr1') }} KKAL
                                      @endif
                                  </center>
                              </td>
                          </tr>
                          <tr>
                              <td>
                                  @if(Session::has('nama'))
                                  Hasil akhir kebutuhan kalori atas nama pasien {{ Session::get('nama') }} yaitu :
                                  @endif
                              </td>
                              <td>
                                  <center>
                                      @if(Session::has('message'))
                                      {{ Session::get('message') }} KKAL
                                      @endif
                                  </center>
                              </td>
                          </tr>
                          <!-- ... baris hasil lainnya ... -->
                          <!-- Modifikasi baris hasil lainnya dengan cara yang sama -->
                      
                          <tr>
                              <td colspan="2" class="text-center">
                                  <a href="{{route('perhitungankalori')}}" class="btn btn-primary">Kembali</a>
                                  @if(Session::has('id'))
                                  <a href="{{ route('detailpasien', ['id'=> Session::get('id')])}}" class="btn btn-success">Detail</a>
                                  @endif
                              </td>
                          </tr>
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
      </table>
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