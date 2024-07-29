<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Pengajar;
use App\Models\KelasMateri;

class AdminLaporanController extends Controller
{
    function index(){
        $data['totalSiswa'] = Siswa::where('flag_erase',1)->count();
        $data['totalPengajar'] = Pengajar::where('flag_erase',1)->count();
        $data['totalMapel'] = KelasMateri::where('flag_erase',1)->count();
         $data['list_materi'] = KelasMateri::where('flag_erase',1)->get();
        return view('admin.laporan.index',$data);
    }

}
