<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Str;

class KelasMateri extends Model
{
    use HasFactory;
    protected $table = 'kelas_materi';
    protected $primaryKey = 'kelas_materi_id';


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

    public function kelas()    {
        return $this->belongsTo(Kelas::class, 'kelas_id','kelas_id');
    }
    public function pengajar()    {
        return $this->belongsTo(Pengajar::class, 'pengajar_id');
    }
}
