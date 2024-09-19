<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminPengajarController;
use App\Http\Controllers\Admin\AdminKelasController;
use App\Http\Controllers\Admin\AdminPembayaranController;
use App\Http\Controllers\Admin\AdminSiswaController;
use App\Http\Controllers\Admin\AdminPaketPembelajaranController;
use App\Http\Controllers\Admin\AdminLaporanController;
use App\Http\Controllers\Admin\AdminProfilController;
use App\Http\Controllers\Admin\AdminWebsiteController;

// pengajar
use App\Http\Controllers\Pengajar\PengajarController;
use App\Http\Controllers\Pengajar\PengajarKelasController;
use App\Http\Controllers\Pengajar\PengajarAbsensiController;
use App\Http\Controllers\Pengajar\PengajarLaporanController;
use App\Http\Controllers\Pengajar\PengajarProfilController;

// Siswa
use App\Http\Controllers\Siswa\SiswaController;
use App\Http\Controllers\Siswa\SiswaKelasController;
use App\Http\Controllers\Siswa\SiswaAbsensiController;
use App\Http\Controllers\Siswa\SiswaProfilController;
use App\Http\Controllers\Siswa\SiswaNilaiController;


Route::controller(IndexController::class)->group(function () {
    Route::get('base', 'base');
    Route::get('/', 'beranda');
    Route::get('tentang', 'tentang');
    Route::get('kelas', 'kelas');
    Route::get('pengajar', 'pengajar');
    Route::get('berita-dan-info', 'berita');
    Route::get('berita/{berita}/detail', 'bacaBerita');
    Route::get('galeri', 'galeri');
    Route::get('kontak', 'kontak');
    Route::get('daftar-bimbel', 'formDaftar');
    Route::post('daftar-bimbel', 'storeDaftar');
    Route::get('pilih-kelas/{siswa}', 'pilihKelas');
    Route::put('pilih-kelas/{siswa}/lanjut-pembayaran', 'lanjutBayar');
});
Route::controller(AuthController::class)->group(function () {
    Route::get('admin', 'loginAdmin');
    Route::post('admin-login', 'prosesLoginAdmin');
    Route::post('pengajar-login', 'prosesLoginPengajar');
    Route::post('siswa-login', 'prosesLoginSiswa');
    Route::get('login', 'login')->name('login');
    Route::get('logout', 'logout');
});

// SISWA ===============
Route::prefix('x')->middleware('auth:siswa')->group(function(){
    Route::controller(SiswaController::class)->group(function () {
        Route::get('beranda', 'beranda');
        Route::put('upload-bukti-pendaftaran/{siswa}', 'uploadPendaftaran');
    });

    Route::controller(SiswaKelasController::class)->group(function () {
        Route::get('kelas', 'index');
        Route::get('kelas/{kelasmateri}/detail', 'show');
        Route::get('tugas/{soalmaster}/jawab', 'jawab');
        Route::post('tugas/{soalmaster}/jawab', 'prosesJawab');
    });

    Route::controller(SiswaAbsensiController::class)->group(function () {
        Route::get('absensi', 'index');
    });

    Route::controller(SiswaNilaiController::class)->group(function () {
        Route::get('nilai', 'index');
    });

    Route::controller(SiswaProfilController::class)->group(function () {
        Route::get('profil', 'index');
        Route::get('profil/{siswa}/edit', 'edit');
        Route::put('profil/{siswa}/edit', 'update');
        Route::post('profil/ganti-password', 'gantiPassword');
    });
});


// PENGAJAR ============
Route::prefix('p')->middleware('auth:pengajar')->group(function(){
    Route::controller(PengajarController::class)->group(function () {
        Route::get('beranda', 'beranda');
    });

    Route::controller(PengajarKelasController::class)->group(function () {
        Route::get('kelas', 'index');
        Route::get('kelas/{kelasmateri}/detail', 'show');
        Route::post('kelas/{kelasmateri}/absensi', 'storeAbsensi');
        Route::get('kelas/{kelasmateri}/buat-tugas', 'buatTugas');
        Route::post('kelas/{kelasmateri}/buat-tugas', 'storeSoal');
        Route::get('kelas/{soalmaster}/tambah-soal', 'tambahSoal');
        Route::post('kelas/{soalmaster}/tambah-soal', 'storeTambahSoal');

        Route::get('tugas/{soalmaster}/soal', 'showSoal');
        Route::get('tugas/{soalmaster}/list-jawaban', 'listJawaban');
        Route::get('tugas/{soalmaster}/delete', 'destroySoal');
        Route::post('tugas/{soalmaster}/nilai', 'nilaiJawaban');
    });

    Route::controller(PengajarAbsensiController::class)->group(function () {
        Route::get('absensi', 'index');
        Route::get('absensi/{kelasmateri}/absensi', 'show');
    });
    Route::controller(PengajarLaporanController::class)->group(function () {
        Route::get('laporan', 'index');
    });

    Route::controller(PengajarProfilController::class)->group(function () {
        Route::get('profil', 'index');
        Route::get('profil/{pengajar}/edit', 'edit');
        Route::put('profil/{pengajar}/edit', 'update');
        Route::post('profil/ganti-password', 'gantiPassword');
    });
});


Route::prefix('admin')->middleware('auth:admin')->group(function(){

    Route::controller(AdminController::class)->group(function () {
        Route::get('/beranda', 'beranda');
        Route::get('/siswa/{siswa}/detail', 'detail');
        Route::get('/siswa/{siswa}/terima', 'terima');
        Route::get('/siswa/{siswa}/tolak', 'tolak');
    });

    

    Route::prefix('master-data')->group(function(){
        Route::controller(AdminPengajarController::class)->group(function () {
            Route::get('/pengajar', 'index');
            Route::get('/pengajar/create', 'create');
            Route::post('/pengajar/create', 'store');
            Route::get('/pengajar/{pengajar}/detail', 'show');
            Route::get('/pengajar/{pengajar}/edit', 'edit');
            Route::put('/pengajar/{pengajar}/edit', 'update');
            Route::get('/pengajar/{pengajar}/delete', 'destroy');
        });


        Route::controller(AdminKelasController::class)->group(function () {
            Route::get('/kelas', 'index');
            Route::get('/kelas/create', 'create');
            Route::post('/kelas/create', 'store');
            Route::get('/kelas/{kelas}/detail', 'show');
            Route::post('/kelas-materi/{kelas}/create', 'storeMateri');
            Route::get('/kelas/{kelas}/edit', 'edit');
            Route::put('/kelas/{kelas}/edit', 'update');
            Route::get('/kelas/{materi}/delete-materi', 'destroyMateri');
        });

        Route::controller(AdminSiswaController::class)->group(function () {
            Route::get('/siswa', 'index');
            Route::get('/siswa/create', 'create');
            Route::post('/siswa/create', 'store');
            Route::get('/siswa/{siswa}/detail', 'show');
            Route::get('/siswa/{siswa}/edit', 'edit');
            Route::put('/siswa/{siswa}/edit', 'update');
            Route::get('/siswa/{siswa}/delete', 'destroy');
        });

        Route::controller(AdminPaketPembelajaranController::class)->group(function () {
            Route::get('/paket-pembelajaran', 'index');
            Route::get('/paket-pembelajaran/create', 'create');
            Route::post('/paket-pembelajaran/create', 'store');
            Route::get('/paket-pembelajaran/{paketPembelajaran}/detail', 'show');
            Route::get('/paket-pembelajaran/{paketPembelajaran}/edit', 'edit');
            Route::put('/paket-pembelajaran/{paketPembelajaran}/edit', 'update');
            Route::get('/paket-pembelajaran/{paketPembelajaran}/delete', 'destroy');
        });
    });

    Route::controller(AdminLaporanController::class)->group(function () {
        Route::get('/laporan', 'index');
    });


    Route::controller(AdminPembayaranController::class)->group(function () {
        Route::get('/metode-pembayaran', 'index');
        Route::post('/metode-pembayaran', 'store');
        Route::get('/metode-pembayaran/{pembayaran}/delete', 'destroy');
    });

    Route::controller(AdminProfilController::class)->group(function () {
        Route::get('profil', 'index');
        Route::get('profil/{admin}/edit', 'edit');
        Route::put('profil/{admin}/edit', 'update');
        Route::put('profil/{admin}/ganti-password', 'gantiPassword');
    });

    Route::prefix('website')->group(function(){

      Route::controller(AdminWebsiteController::class)->group(function () {
        Route::get('/profil-website', 'profil');
        Route::get('/profil-website/{website}/edit', 'editProfil');
        Route::put('/profil-website/{website}/edit', 'updateProfil');

        Route::get('/galeri', 'galeri');
        Route::post('/galeri', 'storeGaleri');
        Route::get('/galeri/{galeri}/delete', 'destroyGaleri');


        Route::get('/berita', 'berita');
        Route::get('/berita/create', 'createBerita');
        Route::post('/berita/create', 'storeBerita');
        Route::get('/berita/{berita}/delete', 'destroyBerita');
        Route::get('/berita/{berita}/detail', 'showBerita');
        Route::get('/berita/{berita}/edit', 'editBerita');
        Route::put('/berita/{berita}/edit', 'updateBerita');
    });
  });

});
