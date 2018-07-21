<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BahanBaku;

class BahanBakuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bahan = BahanBaku::orderBy('created_at', 'asc')->get();
        return view('back.page.bahan_baku.index', compact('bahan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kode = $this->kode_bahanbaku();
        return view('back.page.bahan_baku.create', compact('kode'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'kode_bahan_baku' => 'required',
            'nama' => 'required',
            'satuan' => 'required'
        ]);

        $bahan = new BahanBaku;
        $bahan->kode_bahanbaku = $request->kode_bahan_baku;
        $bahan->nama = $request->nama;
        $bahan->satuan = $request->satuan;
        $bahan->save();

        return redirect('bahan');

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
        $bahan = BahanBaku::findOrFail($id);
        return view('back.page.bahan_baku.edit', compact('bahan'));
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
        $this->validate($request, [
            'kode_bahan_baku' => 'required',
            'nama' => 'required',
            'satuan' => 'required'
        ]);

        $bahan = BahanBaku::findOrFail($id);
        $bahan->kode_bahanbaku = $request->kode_bahan_baku;
        $bahan->nama = $request->nama;
        $bahan->satuan = $request->satuan;
        $bahan->save();

        return redirect('bahan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bahan = BahanBaku::findOrFail($id);
        $bahan->delete();

        return redirect('bahan');
    }

    public function kode_bahanbaku()
    {
        $data = BahanBaku::max('kode_bahanbaku');
        $nourut = (int)substr($data, 9, 5);
        $nourut++;
        $char = 'BB';
        $newID = $char.date('dmy').sprintf("%05s", $nourut);
        return $newID;
    }
}
