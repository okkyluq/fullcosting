<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produksi;

class FullCostingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('back.page.fullcosting.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function cek_fc(Request $request)
    {
        $this->validate($request, [
            'kode_produksi' => 'required',
            'jml_produksi' => 'required',
            'laba' => 'required'
        ]);

        $produksi = Produksi::findOrFail($request->id);

        if (empty($produksi->transaksi_bahan)) {
           return redirect()->back()->with('alert', 'Data Transaksi Bahan Belum Ada Pada Kode Produksi '.$produksi->kode_produksi)->withInput();
        }

        if (empty($produksi->transaksi_bktl)) {
           return redirect()->back()->with('alert', 'Data Transaksi BTKL Belum Ada Pada Kode Produksi '.$produksi->kode_produksi)->withInput();
        }

        if (empty($produksi->transaksi_bop)) {
           return redirect()->back()->with('alert', 'Data Transaksi BOP Belum Ada Pada Kode Produksi '.$produksi->kode_produksi)->withInput();
        }

        

        $jml_produksi = $request->jml_produksi;
        $laba = $request->laba;
        $produksi = Produksi::findOrFail($request->id);
        return view('back.page.fullcosting.detail', compact('produksi', 'jml_produksi', 'laba'));
    }

}
