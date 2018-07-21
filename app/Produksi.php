<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produksi extends Model
{
    protected $table = 'produksi';
    protected $primaryKey = 'id';

    public function transaksi_bahan()
    {
    	return $this->hasOne('App\TransaksiBahan', 'produksi_id');
    }

    public function transaksi_bktl()
    {
    	return $this->hasOne('App\TransaksiBktl', 'produksi_id');
    }

    public function transaksi_bop()
    {
    	return $this->hasOne('App\TransaksiBop', 'produksi_id');
    }
}
