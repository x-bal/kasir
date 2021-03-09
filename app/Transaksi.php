<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';

    protected $fillable = ['user_id', 'member_id', 'invoice', 'total', 'bayar', 'kembalian'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}
