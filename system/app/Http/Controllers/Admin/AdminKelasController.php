<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\KelasMateri;
use App\Models\Pengajar;
use App\Models\Siswa;

class AdminKelasController extends Controller
{
    function index(){
        $data['list_kelas'] = Kelas::where('flag_erase',1)->get();
        $data['list_pengajar'] = Pengajar::where('flag_erase',1)->get();
        return view('admin.master-data.kelas.index',$data);
    }

    function show(Kelas $kelas){
        $data['kelas'] = $kelas;
        $data['list_pengajar'] = Pengajar::where('flag_erase',1)->get();

        $data['list_materi'] = KelasMateri::where('kelas_nomor',$kelas->kelas_nomor)
        ->where('flag_erase',1)
        ->get();

        $data['list_siswa'] = Siswa::where('siswa_kelas',$kelas->kelas_nomor)
        ->where('flag_erase',1)
        ->get();

        $data['totalMapel'] = KelasMateri::where('kelas_id',$kelas->kelas_id)->where('flag_erase',1)->count();
        $data['totalSiswa'] = Siswa::where('siswa_kelas',$kelas->kelas_nomor)
        ->where('siswa_status_aktif',2)
        ->where('flag_erase',1)
        ->count();
        return view('admin.master-data.kelas.show',$data);
    }

    function create(){
        return view('admin.master-data.kelas.create');
    }

    function storeMateri(Request $request, Kelas $kelas){
        for($i = 0; $i < count($request->kelas_materi_pilihan); $i++){
            $km = new KelasMateri;
            $km->kelas_id = $kelas->kelas_id;
            $km->kelas_nomor = $kelas->kelas_nomor;
            $km->materi_nama = $request->kelas_materi_pilihan[$i];
            $km->pengajar_id = $request->pengajar_id[$i];
            $km->save();

        }

        return back()->with('success','Materi kelas berhasil ditambah');
    }

    function store(Request $request){
        $kelas = new Kelas;
        $kelas->kelas_nomor = request('kelas_nomor');
        $kelas->save();
        
        for($i = 0; $i < count($request->kelas_materi_pilihan); $i++){

            $km = new KelasMateri;
            $km->kelas_id = $kelas->kelas_id;
            $km->materi_nama = $request->kelas_materi_pilihan[$i];
            $km->pengajar_id = $request->pengajar_id[$i];
            $km->save();
        }

        return back()->with('success','Kelas berhasil ditambah');

    }

    function destroyMateri(KelasMateri $materi){
        $materi->flag_erase = 0;
        $materi->save();
        return back()->with('warning','Materi telah dihapus');
    }
    
}
