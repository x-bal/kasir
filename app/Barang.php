<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = 'barang';

    protected $fillable = ['distributor_id', 'nama_barang', 'harga_pokok', 'ppn', 'diskon', 'harga_jual'];
}
