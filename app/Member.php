<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = ['kode_member', 'nama_member', 'jk', 'telp', 'alamat', 'disc'];

    public function transaksi()
    {
        return $this->hasOne(Transaksi::class);
    }
}
