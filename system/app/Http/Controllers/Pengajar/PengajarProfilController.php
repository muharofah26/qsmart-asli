<?php

namespace App\Http\Controllers\Pengajar;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Pengajar;

class PengajarProfilController extends Controller
{
    function index(){
        $data['author'] = Auth::guard('pengajar')->user();
        return view('pengajar.profil.index',$data);
    }

    function edit(Pengajar $pengajar){
        $data['detail'] = $pengajar;
        return view('pengajar.profil.edit',$data);
    }

    function update(Pengajar $pengajar){
       $pengajar->pengajar_nama = request('pengajar_nama');
       $pengajar->email = request('pengajar_email');
       $pengajar->pengajar_pendidikan_akhir = request('pengajar_pendidikan_akhir');
       $pengajar->pengajar_kampus = request('pengajar_kampus');
       $pengajar->pengajar_alamat = request('pengajar_alamat');
       $pengajar->pengajar_notlp = request('pengajar_notlp');
       $pengajar->pengajar_tanggal_lahir = request('pengajar_tanggal_lahir');
       $pengajar->handleUploadFoto();
       $pengajar->save();

       return back()->with('success','Data berhasil diupdate');
   }


   function gantiPassword(){
        $author = Auth::guard('pengajar')->user();
        $new = request('new');
        $confirm = request('confirm');

        if($new == $confirm){
            Pengajar::where('pengajar_id',$author->pengajar_id)->update([
                'password' => bcrypt($new),
            ]);
            return back()->with('success','Password berhasil diganti');
        }
        return back()->with('warning','Password tidak sama');

    }
}


