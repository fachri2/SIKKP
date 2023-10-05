<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\Kamar;
use App\Models\User;
use App\Models\Perawatan;
use Illuminate\Http\Request;
use Symfony\Component\VarDumper\VarDumper;

class PasienController extends Controller
{

    public function inputPasien(Request $request)
{
    // Validasi data yang diterima dari formulir
    $request->validate([
        'jenis_kelamin' => 'required',
        'nama_lengkap' => 'required',
        'jenis_konsultasi' => 'required',
        'nik' => 'required',
        'umur' => 'required|numeric',
        'berat_badan' => 'required',
        'tinggi_badan' => 'required',
        'nama_kamar' => 'required',
        'kelas_kamar' => 'required'
    ]);
    

    // Membuat instansiasi model Pasien dan mengisi properti dengan data dari formulir
    $pasien = new Pasien;
    $pasien->jenis_kelamin = $request->input('jenis_kelamin');
    $pasien->nama_lengkap = ucwords($request->input('nama_lengkap'));
    $pasien->jenis_konsultasi = $request->input('jenis_konsultasi');
    $pasien->nik = $request->input('nik');
    $pasien->umur = $request->input('umur');
    $pasien->berat_badan = $request->input('berat_badan');
    $pasien->tinggi_badan = $request->input('tinggi_badan');

    // Menyimpan data ke database
    $pasien->save();

    // Mendapatkan ID pasien yang baru saja disimpan
    $pasien_id = $pasien->id;

    $kamar = new Kamar;
    $kamar->pasien_id = $pasien_id;
    $kamar->nama_kamar = $request->input('nama_kamar');
    $kamar->kelas_kamar = $request->input('kelas_kamar');
    $kamar->save();

    return response()->json(['success' => true, 'message' => 'Data Berhasil Disimpan!!!']);
}

    function detail (int $id){
        $detail = Pasien::find($id);
       return view('detail', ['detail' => $detail]);
    }

    public function delete(Request $request, int $id)
    {
        $pasien = Pasien::find($id);
        $pasien->delete();
        $request->session()->flash('berhasil');
        return redirect()->back();
    }

    public function cetakhasil(int $id)
    {
        $cetakhasil = Pasien::find($id);
        return view('cetakhasil',['cetakhasil' => $cetakhasil]);
    }
    public function visit(Request $request)
    {
        $noRekamMedik = $request->input('nik');
        
        // Tambahkan log untuk memeriksa nilai $noRekamMedik
        \Log::info('No Rekam Medik yang Diterima: ' . $noRekamMedik);
    
        // Lakukan pencarian data pasien berdasarkan $noRekamMedik di sini
        // Anda dapat menggunakan model Pasien atau Eloquent Query Builder untuk melakukan pencarian
    
        $dataPasien = Pasien::where('nik', $noRekamMedik)->first();
    
        if ($dataPasien) {
            // Jika data pasien ditemukan, kirimkan respons JSON dengan data pasien
            return response()->json($dataPasien);
        } else {
            // Jika data pasien tidak ditemukan, kirimkan pesan kesalahan
            return response()->json(['error' => 'No Rekam Medik tidak ditemukan'], 404);
        }
    }
    public function edit($id)
{
    // Ambil data pasien dari database berdasarkan $id
    $pasien = Pasien::find($id);

    // Tampilkan halaman edit dengan data pasien
    return view('visit', compact('pasien'));
}

public function update(Request $request)
{
    // Validasi data yang dikirimkan oleh pengguna
    $request->validate( [

        'nik' => 'required',
        'keterangan' => 'required',
        'riwayat_penyakit' => 'required',
        // Tambahkan validasi lain sesuai kebutuhan Anda
    ]);
    
    // Ambil data pasien dari database berdasarkan $nik
    $pasien = Pasien::where('nik', $request->input('nik'))->first();
    $data = $request->input('id');
    // Update data pasien dengan data yang diterima dari request
   
    $pasien = Pasien::findOrFail($data);
    $pasien->aktivitas = $request->input('aktivitas');
    $pasien->riwayat_penyakit = $request->input('riwayat_penyakit');
    $pasien->keterangan = $request->input('keterangan');
    $pasien->tingkat_kesetresan = $request->input('tingkat_kesetresan');
    $pasien->kalori = $request->input('kalori');
    $pasien->bmi = $request->input('bmi');
    

    // $kalori = $this->hitungKebutuhanKalori($data);
    // Simpan perubahan pada data pasien
    $pasien->update();
    
    // Anda dapat memberikan respons JSON yang sesuai jika perlu
    return response()->json(['message' => 'Data pasien berhasil diupdate'], 200);
}
public function updatepasien(Request $request, $id)
{
    $request->validate([
        'jenis_kelamin' => 'required',
        'nama_lengkap' => 'required',
        'jenis_konsultasi' => 'required',
        'nik' => 'required',
        'umur' => 'required|numeric',
        'berat_badan' => 'required',
        'tinggi_badan' => 'required',
        'nama_kamar' => 'required',
        'kelas_kamar' => 'required'
    ]);
    

    // Membuat instansiasi model Pasien dan mengisi properti dengan data dari formulir
    $pasien = Pasien::find($id);
    $pasien->jenis_kelamin = $request->input('jenis_kelamin');
    $pasien->nama_lengkap = ucwords($request->input('nama_lengkap'));
    $pasien->jenis_konsultasi = $request->input('jenis_konsultasi');
    $pasien->nik = $request->input('nik');
    $pasien->umur = $request->input('umur');
    $pasien->berat_badan = $request->input('berat_badan');
    $pasien->tinggi_badan = $request->input('tinggi_badan');

    // Menyimpan data ke database
    $pasien->update();

    // Mendapatkan ID pasien yang baru saja disimpan
    $pasien_id = $request->input('id');

    $kamar = Kamar::find($pasien_id);
    $kamar->nama_kamar = $request->input('nama_kamar');
    $kamar->kelas_kamar = $request->input('kelas_kamar');
    $kamar->update();

    return response()->json(['success' => true, 'message' => 'Data Berhasil Diubah!!!']);
}



}

