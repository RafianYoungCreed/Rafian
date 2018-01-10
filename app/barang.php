<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class barang extends Model
{
    //
     protected $fillable = ['id','barang', 'jumlah', 'harga'];

     public function barang()
    {
     return $this->belongsTo('App\Barang');
 }
}
