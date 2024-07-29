<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PaketPembelajaran;
use App\Models\PaketPembelajaranDetail;

class AdminPaketPembelajaranController extends Controller
{
    function index(){
        $data['list_paket'] = PaketPembelajaran::where('flag_erase',1)->get();
        return view('admin.master-data.paket-pembelajaran.index',$data);
    }

    function create(){
        return view('admin.master-data.paket-pembelajaran.create');
    }

    function store(Request $request){
        $store = new PaketPembelajaran;
        $store->paket_nama = request('paket_nama');
        $store->paket_deskripsi = request('paket_deskripsi');
        $store->save();

        for($i = 0; $i < count($request->paket_biaya_daftar); $i++){

            $km = new PaketPembelajaranDetail;
            $km->paket_id = $store->paket_id;
            $km->paket_kelas = $request->paket_kelas[$i];
            $km->paket_biaya_daftar = $request->paket_biaya_daftar[$i];
            $km->paket_spp_bulan = $request->paket_spp_bulan[$i];
            $km->paket_spp_semester = $request->paket_spp_semester[$i];
            $km->paket_spp_tahun = $request->paket_spp_tahun[$i];
            $km->save();
        }

        return redirect('admin/master-data/paket-pembelajaran')->with('success','Paket pembelajaran berhasil dibuat');



    }
}
