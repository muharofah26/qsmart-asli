<?php

namespace App\Http\Controllers\Pengajar;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\KelasMateri;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\Absensi;
use App\Models\SoalMaster;
use App\Models\SoalPilihan;
use App\Models\JawabanMaster;
use App\Models\Soal;
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

        $data['list_soal'] = SoalMaster::where('soal_mapel_id',$kelasmateri->kelas_materi_id)
        ->where('flag_erase',1)
        ->get();

        $data['jumlahTugas'] = SoalMaster::where('soal_mapel_id',$kelasmateri->kelas_materi_id)
        ->where('flag_erase',1)
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

    function buatTugas(Request $request, KelasMateri $kelasmateri){
        $data['detail'] = $kelasmateri;
        return view('pengajar.kelas.buat-tugas',$data);
    }

    function storeSoal(Request $request, KelasMateri $kelasmateri){
        $soalMaster = new SoalMaster;
        $soalMaster->soal_mapel_id = request('soal_mapel_id');
        $soalMaster->soal_tanggal_mulai = request('soal_tanggal_mulai');
        $soalMaster->soal_tanggal_selesai = request('soal_tanggal_selesai');
        $soalMaster->soal_kelas_nomor = request('soal_kelas_nomor');
        $soalMaster->soal_pengajar_id = Auth::guard('pengajar')->user()->pengajar_id;
        $soalMaster->save();

        $soal = new Soal;
        $soal->soal_master_id = $soalMaster->soal_master_id;
        $soal->soal_pengajar_id = Auth::guard('pengajar')->user()->pengajar_id;
        $soal->soal_mapel_id = request('soal_mapel_id');
        $soal->soal_kelas_nomor = request('soal_kelas_nomor');
        $soal->soal_type = request('soal_type');
        $soal->soal_pertanyaan = request('soal_pertanyaan');
        $soal->save();

        if (request()->has('pilihan') && is_array(request('pilihan'))) {
            for ($i = 0; $i < count($request->pilihan); $i++) {
              $pilihan = new SoalPilihan;
              $pilihan->soal_id = $soal->soal_id;
              $pilihan->soal_master_id = $soalMaster->soal_master_id;
              $pilihan->pilihan = $request->pilihan[$i];
              $pilihan->save();
          }
      }

      $url = 'p/kelas/'.$soalMaster->soal_master_id.'/tambah-soal';
      return redirect($url); 

  }

  function tambahSoal(SoalMaster $soalmaster){
    $data['detail'] = $soalmaster;
    return view('pengajar.kelas.tambah-soal',$data);
}


function storeTambahSoal(Request $request, SoalMaster $soalmaster){

    $soal = new Soal;
    $soal->soal_master_id = $soalmaster->soal_master_id;
    $soal->soal_pengajar_id = Auth::guard('pengajar')->user()->pengajar_id;
    $soal->soal_mapel_id = $soalmaster->soal_mapel_id;
    $soal->soal_kelas_nomor = $soalmaster->soal_kelas_nomor;
    $soal->soal_type = request('soal_type');
    $soal->soal_pertanyaan = request('soal_pertanyaan');
    $soal->save();

    if (request()->has('pilihan') && is_array(request('pilihan'))) {
        for ($i = 0; $i < count($request->pilihan); $i++) {
          $pilihan = new SoalPilihan;
          $pilihan->soal_id = $soal->soal_id;
          $pilihan->soal_master_id = $soalmaster->soal_master_id;
          $pilihan->pilihan = $request->pilihan[$i];
          $pilihan->save();
      }
  }

  $url = 'p/kelas/'.$soalmaster->soal_master_id.'/tambah-soal';
  return redirect($url); 
}

function showSoal(SoalMaster $soalmaster){
    $data['detail'] = $soalmaster;
    $data['list_soal'] = Soal::where('soal_master_id',$soalmaster->soal_master_id)->get();
    return view('pengajar.kelas.list-soal',$data);
}

function listJawaban(SoalMaster $soalmaster){
    $data['detail'] = $soalmaster;
    $data['list_siswa'] = Siswa::where('siswa_kelas',$soalmaster->soal_kelas_nomor)->get();
    return view('pengajar.kelas.list-jawaban',$data);
}

function nilaiJawaban(SoalMaster $soalmaster){
    $siswa = request('siswa_id');
    $nilai = request('nilai');
    JawabanMaster::where('soal_master_id',$soalmaster->soal_master_id)->where('siswa_id',$siswa)->update([
        'nilai' => $nilai
    ]);
    return back();
}

function destroySoal(SoalMaster $soalmaster){
    $soalmaster->flag_erase = 0;
    $soalmaster->save();
    return back()->with('warning','Data berhasil dihapus');
}
}
