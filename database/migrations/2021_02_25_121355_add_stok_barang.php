<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStokBarang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('CREATE TRIGGER add_stok_barang AFTER INSERT ON stok SET barang_id = NEW.barang_id, jumlah = NEW.jumlah ON DUPLICATE KEY UPDATE jumlah = jumlah+NEW.jumlah END ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER "add_stok_barang"');
    }
}
