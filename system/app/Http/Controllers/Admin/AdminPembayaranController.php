<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pembayaran;

class AdminPembayaranController extends Controller
{
    function index(){
        $data['list_pembayaran'] = Pembayaran::where('pembayaran_status',1)->where('flag_erase',1)->get();
        return view('admin.pembayaran.index',$data);
    }

    function store(){
        $pembayaran = new Pembayaran;
        $pembayaran->pembayaran_nama = request('pembayaran_nama');
        $pembayaran->pembayaran_nomor = request('pembayaran_nomor');
        $pembayaran->pembayaran_penerima = request('pembayaran_penerima');
        $pembayaran->handleUploadFoto();
        $pembayaran->save();

        return back()->with('success','Metode Pembayaran berhasil ditambah');
    }

    function destroy(Pembayaran $pembayaran){
        $pembayaran->flag_erase = 0;
        $pembayaran->save();
        return back()->with('dangger','Metode pemabayaran berhasil dihapus');
    }
}
