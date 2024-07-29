<?php

namespace App\Http\Controllers\Pengajar;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KelasMateri;
use App\Models\Absensi;
use Auth;

class PengajarAbsensiController extends Controller
{
    function index(){
        $author = Auth::guard('pengajar')->user();
        $data['list_materi'] = KelasMateri::where('pengajar_id',$author->pengajar_id)
        ->where('flag_erase',1)
        ->get();
        return view('pengajar.absensi.index',$data);
    }

    function show(KelasMateri $kelasmateri){
        $data['detail'] = $kelasmateri;
        $data['list_absensi'] = Absensi::where('absensi_mapel_id',$kelasmateri->kelas_materi_id)->get();
        return view('pengajar.absensi.show',$data);
    }
}
