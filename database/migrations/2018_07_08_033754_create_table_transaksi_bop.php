<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTransaksiBop extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { 
        Schema::create('transaksi_bop', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kode_transaksi_bop', 100); 
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
        Schema::dropIfExists('transaksi_bop');
    }
}
