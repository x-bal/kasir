<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';

    protected $fillable = ['user_id', 'member_id',];

    public function barangs()
    {
        return $this->belongsToMany(Barang::class);
    }
}
