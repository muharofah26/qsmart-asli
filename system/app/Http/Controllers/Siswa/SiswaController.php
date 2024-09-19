<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Siswa;
use App\Models\Absensi;

class SiswaController extends Controller
{
    function beranda(Siswa $siswa){
      $auth = Auth::guard('siswa')->user();
      $data['auth_id'] = Auth::guard('siswa')->user();
      $data['list_absensi'] = Absensi::where('absensi_siswa_id',$auth->siswa_id)->get();
      $data['hadir'] = Absensi::where('absensi_siswa_id',$auth->siswa_id)
      ->where('absensi_status','Hadir')
      ->count();

      $data['alfa'] = Absensi::where('absensi_siswa_id',$auth->siswa_id)
      ->where('absensi_status','Alfa')
      ->count();

      $data['izin'] = Absensi::where('absensi_siswa_id',$auth->siswa_id)
      ->where('absensi_status','Izin')
      ->count();

      return view('siswa.beranda',$data);
  }

  function uploadPendaftaran(Siswa $siswa){
    $siswa->handleUploadPendaftaran();
    $siswa->siswa_status_bayar = 1;
    $siswa->save();
    return back()->with('success','Bukti Pendaftaran berhasil diupload');
}
}
