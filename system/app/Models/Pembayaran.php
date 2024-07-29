<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Str;
class Pembayaran extends Model
{
    use HasFactory;
    protected $table = 'pembayaran';
    protected $primaryKey = 'pembayaran_id';

    function handleUploadFoto(){
        if(request()->hasFile('pembayaran_icon')){
            $this->handleDeleteFoto();
            $foto = request()->file('pembayaran_icon');
            $destination = "pembayaran-icon";
            $randomStr = Str::random(5);
            $filename = time()."-".$randomStr.".".$foto->extension();
            $url = $foto->storeAs($destination, $filename);
            $this->pembayaran_icon = "app/".$url;
            $this->save;
        }
    }
    function handleDeleteFoto(){
        $foto= $this->pembayaran_icon;
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
