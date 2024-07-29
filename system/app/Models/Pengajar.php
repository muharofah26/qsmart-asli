<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Str;

class Pengajar extends Authenticatable
{
    use HasFactory;
    protected $table = 'pengajar';
    protected $primaryKey = 'pengajar_id';

    function handleUploadFoto(){
        if(request()->hasFile('pengajar_foto')){
            $this->handleDeleteFoto();
            $foto = request()->file('pengajar_foto');
            $destination = "pengajar";
            $randomStr = Str::random(5);
            $filename = time()."-".$randomStr.".".$foto->extension();
            $url = $foto->storeAs($destination, $filename);
            $this->pengajar_foto = "app/".$url;
            $this->save;
        }
    }
    function handleDeleteFoto(){
        $foto= $this->pengajar_foto;
        if($foto){
            $path = public_path($foto);
        if(file_exists($path)){
            unlink($path);

        }
    return true;
        }
    }


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
}
