<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kalori;
use App\Models\Pasien;
use Illuminate\Http\Request;

class PerhitungankaloriController extends Controller
{
    public function create()
    {
        return view('kalori');
    }

    public function store(Request $request)
    {
        
        // Mengambil data dari form
        $nama_pasien = strtolower($request->input('nama_pasien'));
        $jenis_konsultasi = $request ->input('jenis_konsultasi');
        $nik = $request ->input('nik');
        $umur = $request->input('umur');
        $jenis_kelamin = $request->input('jenis_kelamin');
        $berat_badan = $request->input('berat_badan');
        $tinggi_badan = $request->input('tinggi_badan');
        $aktivitas = $request->input('aktivitas');
        $tingkat_kesetresan = $request -> input('tingkat_kesetresan');
        $riwayat_penyakit = $request->input('riwayat_penyakit');
        $keterangan = $request->input ('keterangan');
        

        $tinggi_m = $tinggi_badan / 100;
        // Hitung BMI (Body Mass Index) rumus broca 
        $bmi1 = $berat_badan / ($tinggi_m * $tinggi_m);
        $bmi = number_format($bmi1, 2);
        if ($bmi < 18.5) {
            $k_bmi = "Kategori: Kurus";
        } elseif ($bmi >= 18.5 && $bmi < 25) {
            $k_bmi = "Kategori: Normal";
        } elseif ($bmi >= 25 && $bmi < 30) {
            $k_bmi = "Kategori: Gemuk";
        } else {
            $k_bmi = "Kategori: Obesitas";
        }

        // Menghitung kebutuhan kalori berdasarkan rumus Benedik
        if($jenis_kelamin == "Laki-laki"){
            $bmr3 = 66 + (13.75 * $berat_badan) + (5 * $tinggi_badan) - (6.75 * $umur);
        } else {
            $bmr3 = 655 + (9.56 * $berat_badan) + (1.85 * $tinggi_badan) - (4.68 * $umur);
        }
        // Mengurangi kebutuhan kalori apa bila di atas umur di atas 40 tahun
        // if($umur > 40){
        //     $bmr2 = $bmr3*5/100;
        // } elseif($umur > 60){
        //     $bmr2 = $bmr3*10/100;   
        // } else {
        //     $bmr2 = 0;
        // }
        
        //aktifitas BMR (Basal Metabolic Rate)
        $bmr1 = $bmr3*$aktivitas/100;
        
        if ($bmi < 18.5) {
           $bmr = 0;
        } elseif ($bmi >= 18.5 && $bmi < 25) {
            $bmr = 0;
        } elseif ($bmi >= 25 && $bmi < 30) {
            $bmr = $bmr3*10/100;
        } else {
            $bmr = $bmr3*20/100;
        }
        if ($bmi<18.5){
            $bmrkurus=$bmr3*20/100;
        } else {
            $bmrkurus=0;
        }
        //untuk presentase menggunakan meflin
        //tingkat setre metabolik
        $kalori1 = $bmr3*$tingkat_kesetresan/100;

        $kalori = $bmr3+$bmr1-$bmr+$bmrkurus+$kalori1;
    
        // var_dump($kalori); exit();
        
        // Menyimpan data kebutuhan kalori ke database
        $create = Pasien::create([
            'nama_lengkap' => ucwords($nama_pasien),
            'jenis_konsultasi' => $jenis_konsultasi,
            'nik' => $nik,
            'umur' => $umur,
            'jenis_kelamin' => $jenis_kelamin,
            'tinggi_badan' => $tinggi_badan,
            'berat_badan' => $berat_badan,
            'keterangan' => $keterangan,
            'riwayat_penyakit' => $riwayat_penyakit,
            'aktivitas' => $aktivitas,
            'kalori' => $kalori,
            'bmi' => $bmi,
            'tingkat_kesetresan' => $tingkat_kesetresan,
        ]);
        $hasil = sprintf("%.3f", $kalori);
        $request->session()->flash('message', $hasil);
        $request->session()->flash('nama', ucwords($nama_pasien));
        $request->session()->flash('bmi',($bmi));
        $request->session()->flash('kbmi',($k_bmi));
        $request->session()->flash('bmr1',($bmr3));
        $request->session()->flash('id',($create->id));
        return view('hitung');
    }

}