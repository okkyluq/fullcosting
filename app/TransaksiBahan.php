<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransaksiBahan extends Model
{
    protected $table = 'transaksi_bahan';
    protected $primaryKey = 'id';

    public function produksi()
    {
    	return $this->belongsTo('App\Produksi');
    }

    public function detail_tranksaksi_bahan()
    {
    	return $this->hasMany('App\DetailTransaksiBahan');
    }


}
