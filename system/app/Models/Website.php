<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Str;

class Website extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $table = 'website';
    protected $primaryKey = 'website_id';


    function handleUploadFoto(){
        if(request()->hasFile('gambar_utama')){
            $foto = request()->file('gambar_utama');
            $destination = "profil";
            $randomStr = Str::random(5);
            $filename = time()."-".$randomStr.".".$foto->extension();
            $url = $foto->storeAs($destination, $filename);
            $this->gambar_utama = "app/".$url;
            $this->save;
        }
    }




}
