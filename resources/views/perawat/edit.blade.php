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
        {{-- sampe sini --}}

          {{-- isi konten --}}
          
          <div class="container flex container-p-y">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-10">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="text-center">Data Pasien</h2>
                            <center>
                                @if(Session::has('message'))
                                    {{ Session::get('message') }} KKAL
                                @endif
                            </center>
                            <form method="POST" class="editpasien" action="{{ route('update-pasien', ['id' => $detail->id]) }}">
                                @csrf
                                  <div class="form-group">
                                      @if ($detail)
                                      <div class="row mb-3">
                                          <div class="col-md-3">
                                              <label for="nama_lengkap">Nama Lengkap</label>
                                          </div>
                                          <div class="col-md-9">
                                              <input class="form-control" type="text" name="nama_lengkap" id="nama_lengkap" required value="{{$detail->nama_lengkap }}">
                                          </div>
                                      </div>
                                      <div class="row mb-3">
                                          <div class="col-md-3">
                                              <label for="nama_kamar">Nama Kamar</label>
                                          </div>
                                          <div class="col-md-3">
                                            <select name="nama_kamar" class="form-select form-select-sm" id="nama_kamar" onchange="pilihkamar()">
                                              <option value="Kartini"{{ $detail->kamars->nama_kamar == 'Kartini' ? 'selected' : '' }}>Kartini</option>
                                              <option value="Cut Maria"{{ $detail->kamars->nama_kamar == 'Cut Maria' ? 'selected' : '' }}>Cut Maria</option>
                                              <option value="Fatmawati"{{ $detail->kamars->nama_kamar == 'Fatmawati' ? 'selected' : '' }}>Fatmawati</option>
                                            </select>
                                          </div>
                                          <div class="col-md-1">
                                              <label for="kelas_kamar">Kelas </label>
                                          </div>
                                          <div class="col-md-3 ms-3">
                                            <select name="kelas_kamar" id="kelas_kamar" class="form-select form-select-sm" id="">
                                              <option value="I"{{ $detail->kamars->kelas_kamar == 'I' ? 'selected' : '' }}>I</option>
                                              <option value="II"{{ $detail->kamars->kelas_kamar == 'II' ? 'selected' : '' }}>II</option>
                                              <option value="III"{{ $detail->kamars->kelas_kamar == 'III' ? 'selected' : '' }}>III</option>
                                            </select>
                                          </div>
                                      </div>
                                      <div class="row mb-3">
                                        <div class="col-md-3">
                                            <label for="nik">No RM</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input class="form-control" type="number" name="nik" id="nik" required value="{{ $detail->nik }}">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-3">
                                            <label for="jenis_konsultasi">Jenis Konsultasi</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input class="form-control" type="text" name="jenis_konsultasi" id="jenis_konsultasi" required value="{{ $detail->jenis_konsultasi }}">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-3">
                                            <label for="jenis_kelamin">Jenis Kelamin</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input class="form-control" type="text" name="jenis_kelamin" id="jenis_kelamin" required value="{{ $detail->jenis_kelamin }}">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-3">
                                            <label for="umur">Umur</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input class="form-control" type="text" name="umur" id="umur" required value="{{ $detail->umur }}">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-3">
                                            <label for="umur">Berat Badan</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input class="form-control" type="text" name="berat_badan" id="umur" required value="{{ $detail->berat_badan }}">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-3">
                                            <label for="umur">Tinggi Badan</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input class="form-control" type="text" name="tinggi_badan" id="umur" required value="{{ $detail->tinggi_badan }}">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-3">
                                            <label for="umur">id</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input class="form-control" type="text" name="id" required value="{{ $detail->kamars->id }}">
                                        </div>
                                    </div>
                                    
                                      @else
                                      <div class="text-center">Tidak ada data konsultasi.</div>
                                      @endif
                                  </div>
                                <div class="form-group row">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            Simpan
                                        </button>
                                    </div>
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
                      <center>SIKKP@2023 Politeknik TEDC Bandung</center>
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
          $(document).on('submit', '.editpasien', function (event) {
              event.preventDefault();
              var formData = $(this).serialize();
              $.post($(this).attr('action'), formData, function (response) {
                  // Handle the server response
                  if (response.success) {
                      alert(response.message)
                      location.reload() // Redirect to a success page if needed
                  } else {
                      alert('Gagal Data sudah ada atau ada kesalahan input'); // Show error message
                  }
              }).fail(function () {
                  alert('Terjadi kesalahan saat memproses formulir.'); // Show a generic error message
              });
          });
        function pilihkamar() {
          $.get('/fect-data', function(data) {
                var selectNamaKamar = document.getElementById("nama_kamar");
                var selectKelasKamar = document.getElementById("kelas_kamar");
                var optionsKelasKamar = selectKelasKamar.options;

                var selectedNamaKamar = selectNamaKamar.value;

                for (var i = 0; i < optionsKelasKamar.length; i++) {
                    var optionKelas = optionsKelasKamar[i];
                    var kelasKamar = optionKelas.value;

                    var matchingKamars = data.filter(function(item) {
                        return item.nama_kamar === selectedNamaKamar && item.kelas_kamar === kelasKamar && item.count >= 4;
                    });

                    if (matchingKamars.length > 0) {
                        optionKelas.style.display = 'none';
                    } else {
                        optionKelas.style.display = '';
                    }
                }
            });
        }

        // Panggil fungsi pilihkamar() saat halaman dimuat
        pilihkamar();
    </script>
  </body>
@endsection


