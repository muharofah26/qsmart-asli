<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Absensi;
use Auth;

class SiswaAbsensiController extends Controller
{
    function index(){
        $auth = Auth::guard('siswa')->user();
        $data['list_absensi'] = Absensi::where('absensi_siswa_id',$auth->siswa_id)->get();
        return view('siswa.absensi.index',$data);
    }
}
