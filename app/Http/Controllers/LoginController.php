<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class LoginController extends Controller
{
    public function login()
    {
        if (Auth::check()) 
        {
            return redirect('home');
        }
        else
        {
            return view('login');
        }
    }

    public function loginaksi(Request $request)
    {
        $data = [
            'nip' => $request->input('nip'),
            'password' => $request->input('password'),
        ];

        if (Auth::Attempt($data)) 
        {
            return redirect('home');
            // $user = Auth::user(); // Mendapatkan informasi pengguna yang sedang login

            // if($user->jabatan == 'DIREKTUR') {
            //     return redirect()->route('direktur'); // Ganti 'halaman.direktur' dengan nama route halaman direktur Anda
            // } elseif ($user->jabatan == 'STAFF') {
            //     return redirect()->route('staff'); // Ganti 'halaman.staff' dengan nama route halaman staff Anda
            // } else {
            //     return redirect('home'); // Jika jabatan tidak dikenali, arahkan ke halaman default
            // }
        }
        else
        {
            Session::flash('error', 'nip atau Password Salah');
            return redirect('/');
        }
    }

    public function logoutaksi()
    {
        Auth::logout();
        return redirect('/');
    }
}