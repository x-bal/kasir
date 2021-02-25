<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Distributor extends Model
{
    protected $table = 'distributor';

    protected $fillable = ['nama_distributor', 'alamat', 'telp'];

    public function barang()
    {
        return $this->hasOne(Barang::class);
    }
}
