<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Str;

class Siswa extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $table = 'siswa';
    protected $primaryKey = 'siswa_id';

    function handleUploadFoto(){
        if(request()->hasFile('siswa_foto')){
            $this->handleDeleteFoto();
            $foto = request()->file('siswa_foto');
            $destination = "siswa";
            $randomStr = Str::random(5);
            $filename = time()."-".$randomStr.".".$foto->extension();
            $url = $foto->storeAs($destination, $filename);
            $this->siswa_foto = "app/".$url;
            $this->save;
        }
    }

    function handleUploadPendaftaran(){
        if(request()->hasFile('bukti_bayar_pendaftaran')){
            $this->handleDeleteFoto();
            $foto = request()->file('bukti_bayar_pendaftaran');
            $destination = "bukti-pendaftaran";
            $randomStr = Str::random(5);
            $filename = time()."-".$randomStr.".".$foto->extension();
            $url = $foto->storeAs($destination, $filename);
            $this->bukti_bayar_pendaftaran = "app/".$url;
            $this->save;
        }
    }

    function handleUploadRaport(){
        if(request()->hasFile('siswa_raport')){
            $foto = request()->file('siswa_raport');
            $destination = "raport";
            $randomStr = Str::random(5);
            $filename = time()."-".$randomStr.".".$foto->extension();
            $url = $foto->storeAs($destination, $filename);
            $this->siswa_raport = "app/".$url;
            $this->save;
        }
    }


    function handleDeleteFoto(){
        $foto= $this->siswa_foto;
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
