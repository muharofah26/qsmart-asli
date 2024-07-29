<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\KelasMateri;
use App\Models\Pengajar;

class AdminPengajarController extends Controller
{
    function index(){
        $data['list_pengajar'] = Pengajar::where('flag_erase',1)->get();
        return view('admin.master-data.pengajar.index',$data);
    }

    function create(){
        $data['list_materi'] = KelasMateri::all();
        return view('admin.master-data.pengajar.create',$data);
    }

    function show(Pengajar $pengajar){
        $data['pengajar'] = $pengajar;
        return view('admin.master-data.pengajar.show',$data);
    }

    function edit(Pengajar $pengajar){
        $data['detail'] = $pengajar;
        $data['list_materi'] = KelasMateri::all();
        return view('admin.master-data.pengajar.edit',$data);
    }

    function update(Pengajar $pengajar){
        $pengajar->pengajar_nama = request('pengajar_nama');
        $pengajar->email = request('pengajar_email');
        $pengajar->pengajar_pendidikan_akhir = request('pengajar_pendidikan_akhir');
        $pengajar->pengajar_kampus = request('pengajar_kampus');
        $pengajar->pengajar_alamat = request('pengajar_alamat');
        $pengajar->pengajar_notlp = request('pengajar_notlp');
        $pengajar->pengajar_tanggal_lahir = request('pengajar_tanggal_lahir');
        $pengajar->password = bcrypt(12345);
        $pengajar->handleUploadFoto();
        $pengajar->save();
        return back()->with('success','Data pengajar berhassil diupdate');
    }

    function store(){
        $pengajar = new Pengajar;
        $pengajar->pengajar_nama = request('pengajar_nama');
        $pengajar->email = request('pengajar_email');
        $pengajar->pengajar_pendidikan_akhir = request('pengajar_pendidikan_akhir');
        $pengajar->pengajar_kampus = request('pengajar_kampus');
        $pengajar->pengajar_alamat = request('pengajar_alamat');
        $pengajar->pengajar_notlp = request('pengajar_notlp');
        $pengajar->pengajar_tanggal_lahir = request('pengajar_tanggal_lahir');
        $pengajar->password = bcrypt(12345);
        $pengajar->handleUploadFoto();
        $pengajar->save();
        return back()->with('success','Data pengajar berhassil ditambahkan');
    }

    function destroy(Pengajar $pengajar){
        $pengajar->flag_erase = 0;
        $pengajar->save();
        return back()->with('success','Data pegngajar berhasil dihapus');
    }
}
