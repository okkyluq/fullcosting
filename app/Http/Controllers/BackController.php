<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BahanBaku;
use App\Btkl;
use App\Bop;

class BackController extends Controller
{
    public function index(Request $request)
    {
    	$bahan = BahanBaku::all();
    	$btkl = Btkl::all();
    	$bop = Bop::all();
    	return view('back.page.index', compact('bahan', 'btkl', 'bop'));
    }
}
