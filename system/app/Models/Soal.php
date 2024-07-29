<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Str;

class Soal extends Model
{
    use HasFactory;
    protected $table = 'soal';
    protected $primaryKey = 'soal_id';

}
