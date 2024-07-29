<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Siswa;

class SiswaController extends Controller
{
    function beranda(Siswa $siswa){
        $data['auth_id'] = Auth::guard('siswa')->user();
        return view('siswa.beranda',$data);
    }

    function uploadPendaftaran(Siswa $siswa){
        $siswa->handleUploadPendaftaran();
        $siswa->siswa_status_bayar = 1;
        $siswa->save();
        return back()->with('success','Bukti Pendaftaran berhasil diupload');
    }
}
