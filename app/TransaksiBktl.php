<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransaksiBktl extends Model
{
    protected $table = 'transaksi_bktl';
    protected $primaryKey = 'id';

    public function produksi()
    {
    	return $this->belongsTo('App\Produksi');
    }

    public function detail_tranksaksi_bktl()
    {
    	return $this->hasMany('App\DetailTransaksiBktl');
    }
}
