<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Str;

class Galeri extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $table = 'galeri';
    protected $primaryKey = 'galeri_id';
    
    function handleUploadFoto(){
        if(request()->hasFile('foto')){
            $foto = request()->file('foto');
            $destination = "galeri";
            $randomStr = Str::random(5);
            $filename = time()."-".$randomStr.".".$foto->extension();
            $url = $foto->storeAs($destination, $filename);
            $this->foto = "app/".$url;
            $this->save;
        }
    }




}