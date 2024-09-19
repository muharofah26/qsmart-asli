<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Admin;
use App\Models\Kelas;
use App\Models\Website;
use App\Models\Pembayaran;
use App\Models\PengaturanPembelajaran;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
      

        Pembayaran::factory()->create([
            'pembayaran_nama' => 'Dana',
            'pembayaran_nomor' => '081234567890',
            'pembayaran_penerima' => 'Qsmart Pay',
        ]);

        Admin::factory()->create([
            'nama' => 'Admin Qsmart',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
            'level' => '1',
            'no_telp' => '081234567890',
        ]);

        Admin::factory()->create([
            'nama' => 'Admin Qsmart 2',
            'email' => 'admin2@gmail.com',
            'password' => bcrypt('admin2'),
            'level' => '1',
            'no_telp' => '081234567890',
        ]);

        Kelas::factory()->create([
            'kelas_nomor' => '1',
        ]);
        Kelas::factory()->create([
            'kelas_nomor' => '2',
        ]);
        Kelas::factory()->create([
            'kelas_nomor' => '3',
        ]);
        Kelas::factory()->create([
            'kelas_nomor' => '4',
        ]);
        Kelas::factory()->create([
            'kelas_nomor' => '5',
        ]);
        Kelas::factory()->create([
            'kelas_nomor' => '6',
        ]);
        Kelas::factory()->create([
            'kelas_nomor' => '7',
        ]);
        Kelas::factory()->create([
            'kelas_nomor' => '8',
        ]);
        Kelas::factory()->create([
            'kelas_nomor' => '9',
        ]);
        Kelas::factory()->create([
            'kelas_nomor' => '10',
        ]);
        Kelas::factory()->create([
            'kelas_nomor' => '11',
        ]);
        Kelas::factory()->create([
            'kelas_nomor' => '12',
        ]);

        PengaturanPembelajaran::factory()->create([
            'semester_kode' => '202401',
            'semester_nama' => '1',
        ]);
        

        PengaturanPembelajaran::factory()->create([
            'semester_kode' => '202402',
            'semester_nama' => '2',
        ]);

        Website::factory()->create([
            'tentang' => 'Qsmart adalah sebuah platform pendidikan teknologi yang menyediakan konten pelajaran digital skills dengan metode “blended-learning” dalam bentuk online maupun offline.',
            'gambar_utama' => '-',
            'maps' => '-',
            'kontak' => '-',
            'email' => '-',
            'alamat' => '-',
        ]);
        
    }
}
