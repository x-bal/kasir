<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = ['nama_member', 'jk', 'telp', 'alamat'];

    public function transaksi()
    {
        return $this->hasOne(Transaksi::class);
    }
}
