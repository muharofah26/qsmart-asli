<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Str;

class PaketPembelajaranDetail extends Model
{
    use HasFactory;
    protected $table = 'paket_pembelajaran_detail';
    protected $primaryKey = 'paket_detail_id';

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

    public function paketNama()    {
        return $this->belongsTo(PaketPembelajaran::class, 'paket_id');
    }
}
