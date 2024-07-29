<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KelasMateri;
use App\Models\Siswa;
use App\Models\SoalMaster;
use App\Models\Soal;
use App\Models\Pengajar;
use App\Models\Jawaban;
use App\Models\JawabanMaster;
use Auth;

class SiswaKelasController extends Controller
{
    function index(){
        $auth = Auth::guard('siswa')->user();
        $data['list_materi'] = KelasMateri::where('kelas_nomor',$auth->siswa_kelas)
        ->where('flag_erase',1)
        ->get();
        return view('siswa.kelas.index',$data);
    }
    function show(KelasMateri $kelasmateri){
        $data['detail'] = $kelasmateri;
        $data['jumlahSiswa'] = Siswa::where('siswa_kelas',$kelasmateri->kelas_nomor)
        ->where('siswa_status_bayar',1)
        ->count();

        $data['list_soal'] = SoalMaster::where('soal_mapel_id',$kelasmateri->kelas_materi_id)
        ->where('flag_erase',1)
        ->get();

        $data['jumlahTugas'] = SoalMaster::where('soal_mapel_id',$kelasmateri->kelas_materi_id)
        ->where('flag_erase',1)
        ->count();
        $data['author'] = Auth::guard('siswa')->user();

        $data['pengajar'] = Pengajar::where('pengajar_id',$kelasmateri->pengajar_id)->first();
        return view('siswa.kelas.show',$data);
    }

    function jawab(SoalMaster $soalmaster){
        $data['detail'] = $soalmaster;
        $data['list_pertanyaan'] = Soal::where('soal_master_id',$soalmaster->soal_master_id)->get();
        return view('siswa.kelas.jawab',$data);
    }

    function prosesJawab(Request $request){
        $jm = new JawabanMaster;
        $jm->siswa_id = Auth::guard('siswa')->user()->siswa_id;
        $jm->pengajar_id = $request->pengajar_id;
        $jm->kelas = $request->kelas;
        $jm->mapel_id = $request->mapel_id;
        $jm->soal_master_id = $request->soal_master_id;
        $jm->save();


        for ($i = 0; $i < count($request->jawaban); $i++) {
          $pilihan = new Jawaban;
          $pilihan->jawaban = $request->jawaban[$i];
          $pilihan->jawaban_master_id = $jm->jawaban_master_id;
          $pilihan->jawaban_soal_id = $request->jawaban_soal_id[$i];
          $pilihan->jawaban_mapel_id = $request->jawaban_mapel_id[$i];
          $pilihan->jawaban_pengajar_id = $request->jawaban_pengajar_id[$i];
          $pilihan->jawaban_kelas_nomor = $request->jawaban_kelas_nomor[$i];
          $pilihan->jawaban_soal_master_id = $request->jawaban_soal_master_id[$i];
          $pilihan->jawaban_user_id = Auth::guard('siswa')->user()->siswa_id;
          $pilihan->save();
      }

      return back();
  }


}
