<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        if (Auth::check()) {
            return redirect('home');
        }else{
            return view('login');
        }
    }

    public function actionlogin(Request $request)
    {
        $data = [
            'username' => $request->input('username'),
            'password' => $request->input('password'),
        ];

        if (Auth::Attempt($data)) {
            $user = Auth::user();
            if ($user->level == 'admin') {
                return redirect('admin-dashboard');
            }
            elseif ($user->level == 'konsultan') {
                return redirect('konsultan-dashboard');
            }
            elseif ($user->level == 'rawatinap') {
                return redirect('rawatinap-dashboard');
            }
            elseif ($user->level == 'dapur') {
                return redirect('dapur-dashboard');
            }
        }else{
            $request->session()->flash('salah');
            return redirect('/login');
        }
    }

    public function actionlogout()
    {
        Auth::logout();
        return redirect('/login');
    }
}