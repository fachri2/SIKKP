<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use App\Models\Pasien;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $mandiriCount = Pasien::where('jenis_konsultasi', 'Mandiri')->count();
        $rawatInapCount = Pasien::where('jenis_konsultasi', 'Rawat Inap')->count();
        $userCount = User::all()->count();
        $adminCount = User::where('level','admin')->count();
        $konsultanCount = User::where('level','konsultan')->count();
        $dapurCount = User::where('level','dapur')->count();
        $rawatinapCount = User::where('level','rawatinap')->count();

        return view
        ('admin.index', compact('mandiriCount', 'rawatInapCount','userCount',
        'adminCount','konsultanCount','dapurCount','rawatinapCount'));
    }
    public function regis()
    {
        return view('admin.register');
    }
    public function edit()
{
    $user = Auth::user();
    return view('admin.update', compact('user'));
}
    public function delete(Request $request)
    {
        $level2 = $request->query('level', 'all');

        // Ambil semua data konsultasi dari database
        $level = User::orderByDesc('created_at')->get();

        // Filter data konsultasi berdasarkan jenis yang dipilih pengguna
        if ($level2 === 'admin') {
            $level = $level->where('level', 'admin');
        } elseif ($level2 === 'konsultan') {
            $level = $level->where('level', 'konsultan');
        }elseif ($level2 === 'rawatinap') {
            $level = $level->where('level', 'rawatinap');
        }elseif ($level2 === 'dapur') {
            $level = $level->where('level', 'dapur');
        }

        return view('admin.useredit', ['level' => $level, 'level2' => $level2]);
    }
    public function inder()
    {
        return view('perhitungankalori');
    }
    public function rawat(Request $request)
    {
        $jenisKonsultasi = $request->query('jenis_konsultasi', 'all');
        $nik = $request->query('nik');
    
        // Query awal untuk mengambil semua data konsultasi dari database
        $query = Pasien::orderByDesc('created_at');
    
        // Filter data konsultasi berdasarkan jenis yang dipilih pengguna
        if ($jenisKonsultasi === 'Rawat Inap') {
            $query->where('jenis_konsultasi', 'Rawat Inap');
        } elseif ($jenisKonsultasi === 'Mandiri') {
            $query->where('jenis_konsultasi', 'Mandiri');
        }
    
        // Filter data berdasarkan NIK jika ada
        if ($nik) {
            $query->where('nik', $nik);
        }
    
        // Ambil data konsultasi sesuai dengan query yang telah dibuat
        $konsultasis = $query->get();
    
        return view('inap', ['konsultasis' => $konsultasis, 'jenisKonsultasi' => $jenisKonsultasi, 'nik' => $nik]);
    }
    public function rawati(Request $request)
    {
        $jenisKonsultasi = $request->query('jenis_konsultasi', 'all');
        $nik = $request->query('nik');
    
        // Query awal untuk mengambil semua data konsultasi dari database
        $query = Pasien::orderByDesc('created_at');
    
        // Filter data konsultasi berdasarkan jenis yang dipilih pengguna
        if ($jenisKonsultasi === 'Rawat Inap') {
            $query->where('jenis_konsultasi', 'Rawat Inap');
        } elseif ($jenisKonsultasi === 'Mandiri') {
            $query->where('jenis_konsultasi', 'Mandiri');
        }
    
        // Filter data berdasarkan NIK jika ada
        if ($nik) {
            $query->where('nik', $nik);
        }
    
        // Ambil data konsultasi sesuai dengan query yang telah dibuat
        $konsultasis = $query->get();
    
        return view('admin.data', ['konsultasis' => $konsultasis, 'jenisKonsultasi' => $jenisKonsultasi, 'nik' => $nik]);
    }
    
    public function makan()
    {
        return view('menu');
    }
    public function rekap()
    {
        $users = User::all();
        return view('admin.useredit', ['users' => $users]);
    }

    public function edituser(User $user)
    {
        return view('admin.userupdate', ['user' => $user]);
    }

    public function update(Request $request, User $user)
    {
        $user->update([
            'name' => $request->name,
            'username' => $request->username,
            'level' => $request->level,
        ]);
        $request->session()->flash('berhasil');
        return redirect()->back()->with('success', 'User updated successfully');
    }
    public function resetPassword(Request $request, User $user)
    {
        $user->update([
            'password' => Hash::make('123456'), // Reset password to default
        ]);
        $request->session()->flash('bisa');
        return redirect()->back()->with('success', 'Password reset to default successfully');
    }
}
