<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Str;

class Absensi extends Model
{
    use HasFactory;
    protected $table = 'absensi';
    protected $primaryKey = 'absensi_id';
    protected $with = ['mapel','siswa'];

    protected static function boot(){
        parent::boot();
        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = Str::uuid()->toString();
            }
        });
    }

    // biar tidak auto increment
    public function getIncrementing(){
        return false;
    }

    // mendevinisikan sebagai string
    public function getKeyType(){
        return 'string';
    }

    public function mapel()    {
        return $this->belongsTo(KelasMateri::class, 'absensi_mapel_id');
    }
     public function siswa()    {
        return $this->belongsTo(Siswa::class, 'absensi_siswa_id');
    }
}
