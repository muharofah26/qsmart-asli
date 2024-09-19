<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\KelasMateri;
use App\Models\Pengajar;

class AdminController extends Controller
{   
    function beranda(){
        
        $data['list_siswa'] = Siswa::where('siswa_status_aktif',1)
        ->where('siswa_status_bayar', 1)
        ->get();

        $data['totalMateri'] = KelasMateri::where('flag_erase',1)->count();
        $data['totalPengajar'] = Pengajar::where('flag_erase',1)->count();
        $data['totalSiswa'] = Siswa::where('flag_erase',1)
        ->count();
        return view('admin.beranda',$data);
    }

    function terima(Siswa $siswa){
        $siswa->siswa_status_aktif = 2;
        $siswa->save();
        return back()->with('success','Siswa telah diterima');
    }

    function tolak(Siswa $siswa){
         $siswa->delete();
        return back()->with('success','Siswa telah ditolak');
    }
}
