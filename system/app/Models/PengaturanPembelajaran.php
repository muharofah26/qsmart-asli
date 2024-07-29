<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Str;

class PengaturanPembelajaran extends Model
{
    use HasFactory;
    protected $table = 'pengaturan_pembelajaran';
    protected $primaryKey = 'pengaturan_pembelajaran_id';
}
