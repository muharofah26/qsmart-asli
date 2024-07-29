<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use Auth;

class AuthController extends Controller
{
    function login(Request $request){
        Auth::logout();
        Auth::guard('admin')->logout();
        Auth::guard('siswa')->logout();
        Auth::guard('pengajar')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return view('auth.login');
    }

    function loginAdmin(Request $request){
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        Auth::logout();
        Auth::guard('admin')->logout();
        Auth::guard('siswa')->logout();
        Auth::guard('pengajar')->logout();
        return view('auth.login-admin');
    }

    function loginPengajar(Request $request){
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        Auth::logout();
        Auth::guard('admin')->logout();
        Auth::guard('siswa')->logout();
        Auth::guard('pengajar')->logout();
        return view('auth.login-pengajar');
    }


    function prosesLoginSiswa(Request $request){
        $credentials = $request->only('email', 'password');
        if(Auth::guard('siswa')->attempt($credentials)) {
            return redirect()->intended('x/beranda')->with('success','Selamat datang kembali'); 
        }else if(Auth::guard('admin')->attempt($credentials)){
            return redirect()->intended('admin/beranda')->with('success','Selamat datang kembali'); 
        } else if(Auth::guard('pengajar')->attempt($credentials)){
            return redirect()->intended('p/beranda')->with('success','Selamat datang kembali'); 
        } 
        return back()->with('warning','Login Gagal, Periksa email atau password anda !!');
    }

 

    function logout(Request $request){
        Auth::logout();
        Auth::guard('admin')->logout();
        Auth::guard('siswa')->logout();
        Auth::guard('pengajar')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
         // Menghapus semua session
        Session::flush();
        return redirect('login')->with('success','Berhasil keluar');
    }
}
