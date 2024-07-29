<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Admin;
class AdminProfilController extends Controller
{
  function index(){
    $data['author'] = Auth::guard('admin')->user();
    return view('admin.profil.index',$data);
}


function gantiPassword(Admin $admin){
    $new = request('new');
    $confirm = request('confirm');

    if($new == $confirm){
        $admin->password = bcrypt($new);        
        $admin->nama = request('nama');
        $admin->email = request('email');
        $admin->handleUploadFoto();
        $admin->save();
        return back()->with('success','Password berhasil diganti');
    }
    return back()->with('warning','Password tidak sama');

}
}
