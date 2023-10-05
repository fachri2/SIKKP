<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\Pasien;
use App\Models\Perawatan;
use Illuminate\Http\Request;

use function PHPSTORM_META\map;

class PerawatanController extends Controller
{
    function index() {
        $kartiniI = Kamar::where('nama_kamar', 'Kartini')
                ->where('kelas_kamar', 'I')
                ->count();
        $kartiniII = Kamar::where('nama_kamar', 'Kartini')
                ->where('kelas_kamar', 'II')
                ->count();
        $kartiniIII = Kamar::where('nama_kamar', 'Kartini')
                ->where('kelas_kamar', 'III')
                ->count();
        $cutmariaI = Kamar::where('nama_kamar', 'Cut Maria')
                ->where('kelas_kamar', 'I')
                ->count();
        $cutmariaII = Kamar::where('nama_kamar', 'Cut Maria')
                ->where('kelas_kamar', 'II')
                ->count();
        $cutmariaIII = Kamar::where('nama_kamar', 'Cut Maria')
                ->where('kelas_kamar', 'III')
                ->count();
        $fatmawatiI = Kamar::where('nama_kamar', 'Fatmawati')
                ->where('kelas_kamar', 'I')
                ->count();
        $fatmawatiII = Kamar::where('nama_kamar', 'Fatmawati')
                ->where('kelas_kamar', 'II')
                ->count();
        $fatmawatiIII = Kamar::where('nama_kamar', 'Fatmawati')
                ->where('kelas_kamar', 'III')
                ->count();
        $data = Kamar::with('pasiens')->orderBy('nama_kamar', 'asc')->get();
    return view('perawatan', compact('data','kartiniI', 'kartiniII', 'kartiniIII', 'cutmariaI', 'cutmariaII', 'cutmariaIII', 'fatmawatiI', 'fatmawatiII', 'fatmawatiIII'));
}

    
    function detail (int $id){
        $detail = Perawatan::with('pasiens', 'kamars')->get();
        // $detail = Kamar::
        // join('perawatans', 'kamars.id', '=', 'perawatans.kamar_id')
        // ->join('pasiens', 'pasiens.id', '=', 'perawatans.pasien_id')
        // ->where('kamars.id', $id)
        // ->get();
       return view('kamar', compact('detail'));
    }

    public function menu()
{
    // \DB::enableQueryLog();
    $data = Pasien::with('kamars')->get();
    
    return view('menu', ['data' => $data]);

    }
    public function delete(int $id)
    {
        $data = Pasien::with('kamars')->findOrFail($id);
        // var_dump($data);exit();
        $data->delete();
        return redirect()->back()->with('status', 'Pasien selesai diobati.');
    }
    function detailkamar (int $id){
        $detail = Pasien::with('kamars')->findOrFail($id);
        // $detail = Perawatan::
        // join('kamars', 'perawatans.kamar_id', '=', 'kamars.id')
        // ->join('pasiens', 'pasiens.id', '=', 'perawatans.pasien_id')
        // ->select(
        //     'perawatans.id as id',
        //     'kamars.id as kamar_id',
        //     'pasiens.nama_lengkap as nama_lengkap',
        //     'pasiens.jenis_kelamin as jenis_kelamin',
        //     'pasiens.umur as umur',
        //     'pasiens.kalori as kalori',
        //     'pasiens.jenis_konsultasi as jenis_konsultasi',
        //     'pasiens.nik as nik',
        //     'pasiens.riwayat_penyakit as riwayat_penyakit',
        //     'pasiens.keterangan as keterangan',
        //     'pasiens.kalori as kalori',
        //     'kamars.nama_kamar as nama_kamar',
        //     'kamars.no_kamar as no_kamar',
        //     )
        // ->find($id);
       return view('detailkamar', ['detail' => $detail]);
    }
    function cetakinap (int $id){
        $cetak = Pasien::with('kamars')->findOrFail($id);
       return view('cetakinap', ['cetak' => $cetak]);
    }
    public function store(Request $request)
    {
        try {
            // Validasi input data
            $validatedData = $request->validate([
                'pasien_id' => 'required',
                'kamar_id' => 'required',
                // Atur aturan validasi lainnya sesuai kebutuhan
            ]);
    
            $pasien_id = $request->input('pasien_id');
            $kamar_id = $request->input('kamar_id');
    
            // Cek apakah data perawatan sudah ada untuk pasien
            $existingPerawatan = Perawatan::where('pasien_id', $pasien_id)
                ->exists();
    
            if ($existingPerawatan) {
                return redirect()->back()->with('error', 'Data perawatan untuk pasien ini sudah ada.');
            }
    
            // Simpan data perawatan
            Perawatan::create([
                'pasien_id' => $pasien_id,
                'kamar_id' => $kamar_id,
                // Informasi lain yang perlu disimpan
            ]);
            // Tambahkan notifikasi setelah data perawatan berhasil ditambahkan
            return redirect()->back()->with('success', 'Data perawatan berhasil ditambahkan.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
    public function kelola()
{
    // \DB::enableQueryLog();
    $data = Pasien::with('kamars')->get();
       
    // dd(\DB::getQueryLog());
    // dd($data);exit();
    return view('kelolainap', ['data' => $data]);
}    
public function editpasien($id){
    $detail = Pasien::with('kamars')->findOrFail($id);

    return view('perawat.edit', ['detail' => $detail]);
}

}