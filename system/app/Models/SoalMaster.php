<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Str;

class SoalMaster extends Model
{
    use HasFactory;
    protected $table = 'soal_master';
    protected $primaryKey = 'soal_master_id';

}
