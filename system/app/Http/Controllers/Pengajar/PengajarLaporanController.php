<?php

namespace App\Http\Controllers\Pengajar;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\KelasMateri;

class PengajarLaporanController extends Controller
{
    function index(){
        $author = Auth::guard('pengajar')->user();
        $data['list_materi'] = KelasMateri::where('pengajar_id',$author->pengajar_id)->where('flag_erase',1)->get();
        return view('pengajar.laporan.index',$data);
    }
}
