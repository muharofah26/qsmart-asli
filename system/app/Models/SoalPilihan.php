<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Str;

class SoalPilihan extends Model
{
    use HasFactory;
    protected $table = 'soal_pilihan';
    protected $primaryKey = 'soal_pilihan_id';

}
