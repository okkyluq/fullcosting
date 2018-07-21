<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableDetailTransaksiBktl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void 
     */
    public function up()
    {
        Schema::create('detail_transaksi_bktl', function (Blueprint $table) {
            $table->increments('id');

            $table->string('bktl', 100);
            $table->string('harga', 100);
            $table->string('orang', 10);
            $table->string('total', 100);
            $table->integer('transaksi_bktl_id')->unsigned();

            $table->timestamps();

            $table->foreign('transaksi_bktl_id')->references('id')->on('transaksi_bktl')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_transaksi_bktl');
    }
}
