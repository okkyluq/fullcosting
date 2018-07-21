<?php 
namespace App\Helpers;
 
use Illuminate\Support\Facades\DB;
 
class Rupiah {
    
	public static function Rupiah($angka)
	{
		$hasil_rupiah = "Rp " . number_format($angka,0,',','.');
		return $hasil_rupiah.' -,';
	}

   
}

 ?>