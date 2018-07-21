<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTransaksiBaku extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi_bahan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kode_transaksi_bahan', 100); 
            $table->string('grand_total', 100); 
            $table->integer('produksi_id')->unsigned(); 
            $table->timestamps();

            $table->foreign('produksi_id')->references('id')->on('produksi')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksi_bahan');
    }
}
