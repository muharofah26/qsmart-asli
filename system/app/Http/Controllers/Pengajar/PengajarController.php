<?php

namespace App\Http\Controllers\Pengajar;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PengajarController extends Controller
{
    function beranda(){
        return view('pengajar.beranda');
    }
}
