<?php

namespace App\Http\Controllers\Pengajar;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\KelasMateri;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\Absensi;
use Carbon\Carbon;

class PengajarKelasController extends Controller
{
    function index(){
        $auth = Auth::guard('pengajar')->user();
        $data['list_materi'] = KelasMateri::where('pengajar_id',$auth->pengajar_id)->where('flag_erase',1)->get();
        return view('pengajar.kelas.index',$data);
    }

    function show(KelasMateri $kelasmateri){
        $data['detail'] = $kelasmateri;
         $auth = Auth::guard('pengajar')->user();
        $data['list_siswa'] = Siswa::where('siswa_kelas',$kelasmateri->kelas_nomor)
        ->where('siswa_status_bayar',1)
        ->get();

        $tanggal = date('Y-m-d');
        $data['absen_today'] = Absensi::where('absensi_tanggal',$tanggal)
        ->where('absensi_mapel_id',$kelasmateri->kelas_materi_id)
        ->where('absensi_pengajar_id',$auth->pengajar_id)
        ->get();

        $data['jumlahSiswa'] = Siswa::where('siswa_kelas',$kelasmateri->kelas_nomor)
        ->where('siswa_status_bayar',1)
        ->count();


        return view('pengajar.kelas.show',$data);
    }

    function storeAbsensi(Request $request, KelasMateri $kelasmateri){

        for($i = 0; $i < count($request->absensi_siswa_id); $i++){
            $km = new Absensi;
            $km->absensi_tanggal = request('absensi_tanggal');
            $km->absensi_kelas_nomor = $kelasmateri->kelas_nomor;
            $km->absensi_pengajar_id = Auth::guard('pengajar')->user()->pengajar_id;
            $km->absensi_mapel_id = $kelasmateri->kelas_materi_id;
            $km->absensi_siswa_id = $request->absensi_siswa_id[$i];
            $km->absensi_status = $request->absensi_status[$i];
            $km->save();
        }
        return back()->with('success','Absensi berhasil dibuat');
        
    }

}
