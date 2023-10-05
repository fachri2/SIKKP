<?php

namespace App\Http\Controllers;

use Svg\Tag\Rect;
use App\Models\User;
use App\Models\Kamar;
use App\Models\Pasien;
use App\Models\Perawatan;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('home');
    }

    public function indes()
    {
        $mandiriCount = Pasien::where('jenis_konsultasi', 'Mandiri')->count();
        $rawatInapCount = Pasien::where('jenis_konsultasi', 'Rawat Inap')->count();
        return view('konsultan', compact('mandiriCount', 'rawatInapCount'));
    }

    public function indet()
    {
        $mandiriCount = Pasien::where('jenis_konsultasi', 'Mandiri')->count();
        $rawatInapCount = Pasien::where('jenis_konsultasi', 'Rawat Inap')->count();
        return view('rawatinap', compact('mandiriCount', 'rawatInapCount'));
    }

    public function indep()

    {
        $totalPasien = Pasien::with('kamars')->count();
        return view('dapur', compact('totalPasien'));


    }
    public function inder()
    {
        return view('perhitungankalori');
    }
    public function inputpasien()
    {
        $data = Kamar::get();
        return view('perawat.index', compact('data'));
    }

    public function fect_data()
    {
        $kamarCounts = DB::table('kamar')
        ->select('nama_kamar', 'kelas_kamar', DB::raw('COUNT(*) as count'))
        ->groupBy('nama_kamar', 'kelas_kamar')
        ->get();

        return response()->json($kamarCounts);
    }

    public function visitpasien()
    {
        return view('visit');
    }
    public function kamar()
    {
        return view('perawatan');
    }
    public function dashboard()
    {
            if (auth()->user()->level == 'admin') {
                return redirect('admin-dashboard');
            }
            elseif (auth()->user()->level == 'konsultan') {
                return redirect('konsultan-dashboard');
            }
            elseif (auth()->user()->level == 'rawatinap') {
                return redirect('rawatinap-dashboard');
            }
            elseif (auth()->user()->level == 'dapur') {
                return redirect('dapur-dashboard');
            }
            else{
                return redirect()->back();
            }

    }
    

}