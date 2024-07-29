<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Siswa;

class AdminSiswaController extends Controller
{
    function index(){
        $data['list_siswa'] = Siswa::where('flag_erase',1)->get();
        $data['jumlahSiswa'] = Siswa::where('flag_erase',1)->count();
        return view('admin.master-data.siswa.index',$data);
    }

    function show(Siswa $siswa){
        $data['siswa'] = $siswa;
        return view('admin.master-data.siswa.show',$data);
    }

    function edit(Siswa $siswa){
        $data['siswa'] = $siswa;
        return view('admin.master-data.siswa.edit',$data);
    }         

    function update(Siswa $siswa){
        $siswa->siswa_nama = request('siswa_nama');
        $siswa->email = request('email');
        $siswa->siswa_kode = mt_rand(000001,999999);
        $siswa->password = bcrypt('12345');
        $siswa->siswa_alamat = request('siswa_alamat');
        $siswa->siswa_jenis_kelamin = request('siswa_jenis_kelamin');
        $siswa->siswa_kelas = request('siswa_kelas');
        $siswa->siswa_tempat_lahir = request('siswa_tempat_lahir');
        $siswa->siswa_tanggal_lahir = request('siswa_tanggal_lahir');
        $siswa->siswa_asal_sekolah = request('siswa_asal_sekolah');
        $siswa->siswa_notlp = request('siswa_notlp');
        $siswa->siswa_jurusan = request('siswa_jurusan');
        $siswa->siswa_rangking = request('siswa_rangking');
        $siswa->siswa_ayah = request('siswa_ayah');
        $siswa->siswa_ibu = request('siswa_ibu');
        $siswa->siswa_alamat_ortu = request('siswa_alamat_ortu');
        $siswa->siswa_ortu_notlp = request('siswa_ortu_notlp');
        $siswa->siswa_kelas = request('siswa_kelas');
        $siswa->siswa_paket_les_id = request('siswa_paket_les_id');
        if(request('siswa_foto') == null){
            $siswa->siswa_foto = $siswa->siswa_foto;
        }else{
            $siswa->handleUploadFoto();
        }

        if(request('sisw_raport') == null ){
            $siswa->siswa_raport = $siswa->siswa_raport;
        }else{
            $siswa->handleUploadRaport();
        }
        $siswa->save();

        return back()->with('success','Data mahasiswa berhasil diupdate');
    }

    function destroy(Siswa $siswa){
        $siswa->flag_erase = 0;
        $siswa->save();
        return back()->with('success','Data siswa berhasil dihapus');
    }
    
}
