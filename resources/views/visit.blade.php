@extends('layout.template')
@section('konten')
<script>
  function cariPasien() {
    var noRekamMedik = document.getElementById("nik").value;
    // Lakukan permintaan AJAX ke kontroller untuk mencari data pasien
    // Anda perlu menyesuaikan URL permintaan AJAX sesuai dengan rute Anda
    $.ajax({
        url: '/visit', // Ganti dengan URL yang sesuai
        type: 'GET',
        data: { nik: noRekamMedik },
        success: function(data) {
            if (data) {
                // Isi formulir dengan data pasien yang ditemukan
                document.getElementById("jenis_kelamin").value = data.jenis_kelamin;
                document.getElementById("id").value = data.id;
                document.getElementById("nama_lengkap").value = data.nama_lengkap;
                document.getElementById("jenis_konsultasi").value = data.jenis_konsultasi;
                document.getElementById("umur").value = data.umur;
                document.getElementById("berat_badan").value = data.berat_badan;
                document.getElementById("tinggi_badan").value = data.tinggi_badan;
                document.getElementById("aktivitas").value = data.aktivitas;
                document.getElementById("tingkat_kesetresan").value = data.tingkat_kesetresan;
                document.getElementById("keterangan").value = data.keterangan;
                document.getElementById("riwayat_penyakit").value = data.riwayat_penyakit;
                document.getElementById("kalori").value = data.kalori;
                document.getElementById("bmi").value = data.bmi;


            } else {
                alert("No Rekam Medik tidak ditemukan");
            }
        },
        error: function(error) {
            alert("Terjadi kesalahan saat melakukan pencarian");
        }
    });
}
</script>
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
              <a href="perhitungankalori" class="menu-link">
                <i class="menu-icon tf-icons bx bx-layout"></i>
                <div data-i18n="Perhitungan Kalori">Perhitungan Kalori</div>
              </a>
            </li>
            <li class="menu-item active">
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
          <!-- / Navbar -->
        {{-- sampe sini --}}

          {{-- isi konten --}}
          
          <div class="container flex container-p-y">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-10">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="text-center">Kalkulator Kalori Harian</h2>
                            
        <form id="pasienForm" action="{{ route('simpan-data') }}" method="post">
            @csrf
            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <td>
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                        </td><td>
                        <input class="w-50" type="text" name="jenis_kelamin" id="jenis_kelamin" required readonly>
                        </td>
                    </tr>
                    <tr>
                      <td>
                        <label for="nama_lengkap">Nama Pasien</label>
                      </td>
                      <td>
                        <input class="w-50" type="text" name="nama_lengkap" id="nama_lengkap" required readonly>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <label for="jenis_konsultasi">Jenis Konsultasi</label>
                      </td>
                      <td>
                        <input class="w-50" type="text" name="jenis_konsultasi" id="jenis_konsultasi" readonly>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <label for="nik">No Rekam Medik</label>
                      </td>
                      <td>
                        <input class="w-50" type="text" name="nik" id="nik" required maxlength="4" oninput="if (this.value.length > 4) this.value = this.value.slice(0, 4);">
                        <button type="button" class="btn btn-secondary" onclick="cariPasien()">Cari</button>
                      </td>
                    </tr>
                                   
                    <tr>
                      <td>
                        <label for="umur">Usia</label>
                      </td>
                      <td>
                        <input class="w-50" type="number" name="umur" id="umur" required maxlength="3" oninput="if (this.value.length > 3) this.value = this.value.slice(0, 3);" readonly>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <label for="berat_badan">Berat Badan (kg)</label>
                      </td>
                      <td>
                        <input class="w-50" type="number" name="berat_badan" id="berat_badan" required maxlength="3" oninput="if (this.value.length > 3) this.value = this.value.slice(0, 3);" readonly>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <label for="tinggi_badan">Tinggi Badan (cm)</label>
                      </td>
                      <td>
                        <input class="w-50" type="number" name="tinggi_badan" id="tinggi_badan" required maxlength="3" oninput="if (this.value.length > 3) this.value = this.value.slice(0, 3);" readonly>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <label for="tinggi_badan">id</label>
                      </td>
                      <td>
                        <input class="w-50" type="number" name="id" id="id" required maxlength="3" oninput="if (this.value.length > 3) this.value = this.value.slice(0, 3);" readonly>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <label for="aktivitas">Tingkat Aktivitas</label>
                      </td>
                      <td>
                        <select class="w-50" name="aktivitas" id="aktivitas" readonly >
                            <option value="10">Bad Rest</option>
                            <option value="20">Beraktivitas ringan</option>
                            <option value="30">Beraktivitas sedang</option>
                            <option value="40">Beraktivitas tinggi</option>
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <label for="tingkat_kesetresan">Stres Metabolik (Kebutuhan Energi yang meningkat Karena adanya Infeksi)</label>
                      </td>
                      <td>
                        <select class="w-50" name="tingkat_kesetresan" id="tingkat_kesetresan" readonly>
                            <option value="0">Tidak ada infeksi</option>
                            <option value="5">5 %</option>
                            <option value="10">10 %</option>
                            <option value="15">15 %</option>
                            <option value="20">20 %</option>
                            <option value="25">25 %</option>
                            <option value="30">30 %</option>
                            <option value="35">35 %</option>
                            <option value="40">40 %</option>
                            <option value="45">45 %</option>
                            <option value="50">50 %</option>
                          </select>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <label for="keterangan">Keterangan</label>
                      </td>
                      <td>
                        <textarea rows="10" cols="50" name="keterangan" id="keterangan" required readonly></textarea>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <label for="riwayat_penyakit">Riwayat Penyakit</label>
                      </td>
                      <td>
                          <textarea rows="10" cols="50" name="riwayat_penyakit" id="riwayat_penyakit" required readonly></textarea>
                      </td>
                    </tr>
                      <tr>
                        <td>
                          <label for="bmi">BMI</label>
                        </td>
                        <td>
                          <input class="w-5" type="number" name="bmi" id="bmi" required maxlength="4" oninput="if (this.value.length > 4) this.value = this.value.slice(0, 4);" readonly>
                          <p id="k_bmi" style="display:inline-block; margin-left: 10px;"></p> <!-- Menggunakan CSS untuk mengatur tampilan di sampingnya -->
                        </td>
                      </tr>
                    </tr>
                    
                    <tr>
                      <td>
                        <label for="kalori">Hasil Perhitungan</label>
                      </td>
                      <td>
                        <input class="w-50" type="number" name="kalori" id="kalori" required maxlength="4" oninput="if (this.value.length > 4) this.value = this.value.slice(0, 4);" readonly>
                      </td>
                    </tr>
                    
                    
                    <tr>
                      <td colspan="2" class="text-center">
                          <button type="button" class="btn btn-success" id="editButton" onclick="editData()">Edit</button>
                          <!-- Tombol Simpan (awalnya tersembunyi) -->
                      </td>
                  </tr>
                  <tr>
                    <td colspan="2" class="text-center">
                        <div class="d-flex justify-content-between">
                          <button type="button" class="btn btn-primary" id="hitungButton" style="display: none;" onclick="hitungKebutuhanKalori()">Hitung</button>
                            <button type="button" class="btn btn-primary" id="simpanButton" style="display: none;" onclick="simpanData()">Simpan</button>
                        </div>
                    </td>
                </tr>
                
              </table>
          </div>
      </form>
      <script src="{{ asset('js/pasien.js') }}"></script>
      <script>
        
    // Fungsi untuk mengaktifkan mode edit
    function editData() {
        // Aktifkan mode edit
        document.querySelectorAll('input, textarea, select').forEach(function (el) {
            el.removeAttribute('readonly');
        });
        // Tampilkan tombol Simpan dan sembunyikan tombol Hitung
        document.getElementById('simpanButton').style.display = 'none';
        document.getElementById('hitungButton').style.display = 'block';
    }

    // Fungsi untuk mengirim data yang diedit ke server
    function simpanData() {
        // Mengambil data dari formulir
        var formData = new FormData(document.getElementById('pasienForm'));

        // Mengirim permintaan AJAX ke server
        axios.post('/simpan-data', formData)
            .then(function (response) {
                if (response.data) {
                    // Menampilkan hasil perhitungan kalori pada elemen HTML dengan ID "hasilKebutuhanKalori"
                    alert('Data berhasil disimpan.');
                } else {
                    alert('Gagal menyimpan data. Silakan coba lagi.');
                }
            })
            .catch(function (error) {
                console.error('Gagal menyimpan data: ', error);
                alert('Gagal menyimpan data. Silakan coba lagi.');
            });
          }
    function hitungKebutuhanKalori() {
    // Ambil data yang diperlukan untuk perhitungan (umur, berat_badan, tinggi_badan, dll.)
    var umur = parseInt(document.getElementById('umur').value);
    var beratBadan = parseFloat(document.getElementById('berat_badan').value);
    var tinggiBadan = parseFloat(document.getElementById('tinggi_badan').value);
    var aktivitas = parseFloat(document.getElementById('aktivitas').value);
    var tingkatKesetresan = parseFloat(document.getElementById('tingkat_kesetresan').value);

    // Hitung BMI (Body Mass Index)
    var tinggiM = tinggiBadan / 100;
    var bmi = beratBadan / (tinggiM * tinggiM);

    // Kategori BMI
    var k_bmi;
    if (bmi < 18.5) {
        k_bmi = "Kategori: Kurus";
    } else if (bmi < 25) {
        k_bmi = "Kategori: Normal";
    } else if (bmi < 30) {
        k_bmi = "Kategori: Gemuk";
    } else {
        k_bmi = "Kategori: Obesitas";
    }

    // Menghitung BMR (Basal Metabolic Rate) berdasarkan jenis kelamin
    var jenisKelamin = document.getElementById('jenis_kelamin').value;
    var bmr;
    if (jenisKelamin === "Laki-laki") {
        bmr = 66 + (13.75 * beratBadan) + (5 * tinggiBadan) - (6.75 * umur);
    } else {
        bmr = 655 + (9.56 * beratBadan) + (1.85 * tinggiBadan) - (4.68 * umur);
    }

    // Menghitung kalori berdasarkan aktivitas dan tingkat kesetresan
    var bmr_aktivitas = bmr * aktivitas / 100;
    var bmrkurus = (bmi < 18.5) ? (bmr * 20 / 100) : 0;
    var kalori_stres = bmr * tingkatKesetresan / 100;

    // Total kalori yang dibutuhkan
    var kalori = bmr + bmr_aktivitas - bmrkurus + kalori_stres;

    // Tampilkan hasil perhitungan pada elemen HTML dengan ID "hasilKebutuhanKalori"
    document.getElementById('kalori').value = kalori.toFixed(2);
    document.getElementById('bmi').value = bmi.toFixed(2);
    document.getElementById('k_bmi').innerHTML = k_bmi;
    // Tampilkan tombol Simpan setelah perhitungan selesai
    document.getElementById('simpanButton').style.display = 'block';
}

</script>
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