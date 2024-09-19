<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Siswa;
use App\Models\PengaturanPembelajaran;

class SiswaProfilController extends Controller
{
    function index(){
        $data['siswa'] = Auth::guard('siswa')->user();
        return view('siswa.profil.index',$data);
    }

    function gantiPassword(){
        $author = Auth::guard('siswa')->user();
        $new = request('new');
        $confirm = request('confirm');

        if($new == $confirm){
         Siswa::where('siswa_id',$author->siswa_id)->update([
            'password' => bcrypt($new),

        ]);

         return back()->with('success','Password berhasil diganti');
     }
     return back()->with('warning','Password tidak sama');

 }

 function edit(Siswa $siswa){
    $data['detail'] = $siswa;
    return view('siswa.profil.edit',$data);
}

function update(Siswa $siswa){
   $semeterAwal = PengaturanPembelajaran::latest()->first()->pengaturan_id;
   $siswa->siswa_nama = request('siswa_nama');
   $siswa->email = request('email');
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
   $siswa->siswa_paket_les_id = request('siswa_paket_les_id');
   $siswa->siswa_semester_awal_id = $semeterAwal;
   $siswa->handleUploadFoto();
   $siswa->save();
   return back()->with('success','Profil berhasil diperbaharui');
}
}
