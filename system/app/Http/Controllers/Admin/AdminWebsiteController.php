<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\Galeri;
use App\Models\Website; 

class AdminWebsiteController extends Controller
{
    function galeri(){
        $data['list_galeri'] = Galeri::where('flag_erase',1)->get();
        return view('admin.website.galeri.index',$data);
    }

    function storeGaleri(){
        $galeri = new Galeri;
        $galeri->judul = request('judul');
        $galeri->handleUploadFoto();
        $galeri->save();
        return back()->with('success','Galeri berhasil diunggah');
    }

    function destroyGaleri(Galeri $galeri){
       $galeri->flag_erase = 0;
       $galeri->save();
       return redirect('admin/website/galeri')->with('warning','Foto telah dihapus');
   }

// BERITA
   function berita(){
    $data['list_berita'] = Berita::where('flag_erase',1)->get();
    return view('admin.website.berita.index',$data);
}

function createBerita(){
    return view('admin.website.berita.create');
}

function storeBerita(){
    $berita = new Berita;
    $berita->judul = request('judul');
    $berita->isi = request('isi');
    $berita->kategori = request('kategori');
    $berita->handleUploadFoto();
    $berita->save();
    return redirect('admin/website/berita')->with('success','Berita telah dibuat');
}

function showBerita(Berita $berita){
    $data['detail'] = $berita;
    return view('admin.website.berita.show',$data);
}

function editBerita(Berita $berita){
 $data['detail'] = $berita;
 return view('admin.website.berita.edit',$data);
}

function updateBerita(Berita $berita){
   $berita->judul = request('judul');
   $berita->isi = request('isi');
   $berita->kategori = request('kategori');
   $berita->handleUploadFoto();
   $berita->save();
   return redirect('admin/website/berita')->with('success','Berita telah diupdate');
}

function destroyBerita(Berita $berita){
   $berita->flag_erase = 0;
   $berita->save();
   return redirect('admin/website/berita')->with('warning','Berita telah dihapus');
}

    // PROFIL WEBSITE

function profil(){
    $data['website'] = Website::first();
    $data['count'] = Website::count();
    return view('admin.website.profil.index',$data);
}

function editProfil(Website $website){
    $data['detail'] = $website;
   return view('admin.website.profil.edit',$data);
}

function updateProfil(Website $Website){
    $Website->tentang = request('tentang');
    $Website->maps = request('maps');
    $Website->alamat = request('alamat');
    $Website->kontak = request('kontak');
    $Website->email = request('email');
    $Website->handleUploadFoto();
    $Website->save();
    return redirect('admin/website/profil-website')->with('success','Berhasil');
}
}
