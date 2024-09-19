<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\PaketPembelajaran;
use App\Models\PaketPembelajaranDetail;
use App\Models\KelasMateri;
use App\Models\Pembayaran;
use App\Models\Galeri;
use App\Models\Berita;
use App\Models\Pengajar;
use App\Models\Website;
use App\Models\PengaturanPembelajaran;
use Auth;

class IndexController extends Controller
{

    function base(){
        return view('newbase');
    }
    function beranda(){
        $data['list_kelas'] = Kelas::where('flag_erase',1)->get();
        $data['website'] = Website::first();
        return view('landing.index',$data);
    }

    function formDaftar(){
        $data['list_kelas'] = Kelas::where('flag_erase',1)->get();
        $data['title'] = "Form Daftar Bimbel Qsmart";
        $data['website'] = Website::first();
        return view('landing.daftar',$data);
    }

    function storeDaftar(){
        $semeterAwal = PengaturanPembelajaran::latest()->first()->pengaturan_id;
        $siswa = new Siswa;
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
        $siswa->siswa_paket_les_id = request('siswa_paket_les_id');
        $siswa->siswa_semester_awal_id = $semeterAwal;
        $siswa->handleUploadFoto();
        $siswa->handleUploadRaport();
        $siswa->save();


         // Kirim email
        \Mail::to($siswa->email)->send(new \App\Mail\WelcomeEmail($siswa));

        $url = "pilih-kelas/".$siswa->siswa_id;
        return redirect($url)->with('success','Silahkan lengkapi pillihan anda berikut ini !');
    }

    function pilihKelas(Siswa $siswa){
        $data['title'] = "Paket Pembelajaran & Pembayaran";
        $data['siswa'] = $siswa;
        $data['website'] = Website::first();
        $data['pilih_paket'] = PaketPembelajaranDetail::where('paket_kelas',$siswa->siswa_kelas)
        ->where('flag_erase',1)
        ->get();

        $data['list_pembayaran'] = Pembayaran::where('flag_erase',1)->get();
        return view('landing.pilih-kelas',$data);
    }

    function lanjutBayar(Request $request, Siswa $siswa){
      $data['website'] = Website::first();
      $siswa->siswa_paket_les_id = $request->input('siswa_paket_les_id');
      $siswa->siswa_metode_bayar = $request->input('siswa_metode_bayar');

        // Simpan data siswa
      $siswa->save();

        // Buat data untuk otentikasi
      $credentials = [
        'email' => $siswa->email,
            'password' => '12345', // Kata sandi default
        ];

        // Periksa apakah siswa sudah memiliki akun
        $existingSiswa = Siswa::where('email', $siswa->email)->first();

        // Jika belum ada, buat akun baru
        if (!$existingSiswa) {
            $siswa->password = bcrypt('12345'); // Enkripsi kata sandi
            $siswa->save();
        }

        // Coba untuk melakukan login
        if(Auth::guard('siswa')->attempt($credentials)) {
            return redirect()->intended('x/beranda')->with('success','Selamat datang kembali'); 
        } else {
            return back()->with('warning','Login Gagal, Periksa email atau password anda !!');
        }
    }

    function pilihPaket(Siswa $siswa){

    }

    function tentang(){
        $data['title'] = "Tentang Qsmart";
        $data['website'] = Website::first();
        return view('landing.tentang',$data);
    }

    function pengajar(){
        $data['title'] = "Tenaga Pengajar Qsmart";
        $data['website'] = Website::first();
        $data['list_pengajar'] = Pengajar::where('flag_erase',1)->get();
        return view('landing.pengajar',$data);
    }

    function berita(){
        $data['list_berita'] = Berita::where('flag_erase',1)->get();
        $data['title'] = "Berita & Informasi Qsmart";
        $data['website'] = Website::first();
        return view('landing.berita',$data);
    }
    function bacaBerita(Berita $berita){
        $data['title'] = "Detail Berita";
        $data['detail'] = $berita;
        $data['website'] = Website::first();
        return view('landing.berita-baca',$data);
    }

    function galeri(){
        $data['title'] = "Galeri Qsmart";
        $data['website'] = Website::first();
        $data['list_galeri'] = Galeri::where('flag_erase',1)->get();
        return view('landing.galeri',$data);
    }

    function kontak(){
     $data['website'] = Website::first();
     $data['title'] = "Kontak Qsmart";
     return view('landing.kontak',$data);
 }
}