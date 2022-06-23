<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang', function (Blueprint $table) {
            $table->id();
            $table->string('kode_barang');
            $table->foreignId('distributor_id')->constrained('distributor')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('nama_barang', 128);
            $table->bigInteger('harga_pokok');
            $table->integer('ppn');
            $table->integer('diskon')->nullable();
            $table->bigInteger('harga_jual');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barangs');
    }
}
