<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Pasien;
use Illuminate\Http\Request;
use App\Models\User;
use FontLib\Table\Type\name;

class UserController extends Controller
{
    public function store(Request $request)
{
    // Mengambil data dari form
    $name = strtolower($request->input('name'));
    $username = $request->input('username');
    $level = $request->input('level');

    // Menetapkan password default "123456"
    $password = Hash::make('123456');

    // Menyimpan data kebutuhan kalori ke database
    User::create([
        'name' => ucwords($name),
        'username' => $username,
        'password' => $password,
        'level' => $level,
    ]);

    $request->session()->flash('berhasil');
    return redirect()->route('regis');
}
    public function delete(int $id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('data-user');
    }

    public function edit(Request $request)
    {
        $user = Auth::user();
    
        $request->validate([
            'username' => 'required|unique:users,username,' . $user->id,
            'current_password' => 'required',
            'password' => 'nullable|min:6',
        ]);
    
        // Verifikasi password lama
        if (!Hash::check($request->input('current_password'), $user->password)) {
            $request->session()->flash('salah');
            return redirect()->back()->with('error', 'Password lama salah. Profil tidak diperbarui.');
        }
    
        $user->username = $request->input('username');
        $user->name = ucwords(strtolower($request->input('name')));
    
        if ($request->has('password') && $request->input('password') !== null) {
            $user->password = Hash::make($request->input('password'));
        }
    
        $user->save();
        $request->session()->flash('benar');
        return redirect()->route('admin.update')->with('success', 'Profil berhasil diperbarui.');
    }
    

    public function showProfile(Request $requests)
{
    $user = Auth::user();
    return view('profil', compact('user'));
}
}

