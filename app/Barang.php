<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = 'barang';

    protected $fillable = ['distributor_id', 'nama_barang', 'harga_pokok', 'ppn', 'diskon', 'harga_jual'];

    public function stok()
    {
        return $this->hasOne(Stok::class);
    }

    public function distributor()
    {
        return $this->belongsTo(Distributor::class);
    }
}
