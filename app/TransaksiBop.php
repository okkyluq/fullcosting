<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransaksiBop extends Model
{
    protected $table = 'transaksi_bop';
    protected $primaryKey = 'id';

    public function produksi()
    {
    	return $this->belongsTo('App\Produksi');
    }

    public function detail_tranksaksi_bop()
    {
    	return $this->hasMany('App\DetailTransaksiBop');
    }
}
