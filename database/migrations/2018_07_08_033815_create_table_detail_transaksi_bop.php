<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableDetailTransaksiBop extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_transaksi_bop', function (Blueprint $table) {
            $table->increments('id');

            $table->string('bop', 100);
            $table->string('harga', 100);
            $table->string('jumlah', 10);
            $table->string('total', 100);
            $table->integer('transaksi_bop_id')->unsigned();

            $table->timestamps();

            $table->foreign('transaksi_bop_id')->references('id')->on('transaksi_bop')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_transaksi_bop');
    }
}
