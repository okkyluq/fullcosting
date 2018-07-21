<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTempDetailTransaksiBop extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temp_detail_transaksi_bop', function (Blueprint $table) {
            $table->increments('id');
            $table->string('bop', 100);
            $table->string('harga', 100);
            $table->string('jumlah', 10);
            $table->string('total', 100);
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
        Schema::dropIfExists('temp_detail_transaksi_bop');
    }
}
