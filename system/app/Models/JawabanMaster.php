<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Str;

class JawabanMaster extends Model
{
    use HasFactory;
    protected $table = 'jawaban_master';
    protected $primaryKey = 'jawaban_master_id';
}
