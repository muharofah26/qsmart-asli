<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Str;

class Kelas extends Model
{
    use HasFactory;
    protected $table = 'kelas';
    protected $primaryKey = 'kelas_id';

    function handleUploadFoto(){
        if(request()->hasFile('kelas_icon')){
            $this->handleDeleteFoto();
            $foto = request()->file('kelas_icon');
            $destination = "kelas-icon";
            $randomStr = Str::random(5);
            $filename = time()."-".$randomStr.".".$foto->extension();
            $url = $foto->storeAs($destination, $filename);
            $this->kelas_icon = "app/".$url;
            $this->save;
        }
    }
    function handleDeleteFoto(){
        $foto= $this->kelas_icon;
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
