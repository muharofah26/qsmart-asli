<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KelasMateri;
use Auth;
class SiswaNilaiController extends Controller
{
    function index(){
       $author = $data['author'] = Auth::guard('siswa')->user();
        $data['list_mapel'] = KelasMateri::where('kelas_nomor',$author->siswa_kelas)
        ->where('flag_erase',1)
        ->get();
        return view('siswa.nilai.index',$data);
    }
}
