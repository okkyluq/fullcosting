<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produksi;

class ProduksiController extends Controller
{
    public function index()
    {
        $produksi = Produksi::orderBy('created_at', 'asc')->get();
        return view('back.page.produksi.index', compact('produksi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kode = $this->kode_produksi();
        return view('back.page.produksi.create', compact('kode'));
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
            'kode_produksi' => 'required',
            'nama_produksi' => 'required'
        ]);

        $produksi = new Produksi;
        $produksi->kode_produksi = $request->kode_produksi;
        $produksi->nama_produksi = $request->nama_produksi;
        $produksi->save();

        return redirect('produksi');
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
        $produksi = Produksi::findOrFail($id);
        return view('back.page.produksi.edit', compact('produksi'));
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
            'kode_produksi' => 'required',
            'nama_produksi' => 'required'
        ]);

        $produksi = Produksi::findOrFail($id);
        $produksi->kode_produksi = $request->kode_produksi;
        $produksi->nama_produksi = $request->nama_produksi;
        $produksi->save();

        return redirect('produksi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produksi = Produksi::findOrFail($id);
        $produksi->delete();

        return redirect('produksi');

    }

    public function kode_produksi()
    {
        $data = Produksi::max('kode_produksi');
        $nourut = (int)substr($data, 9, 5);
        $nourut++;
        $char = 'PRO';
        $newID = $char.date('dmy').sprintf("%05s", $nourut);
        return $newID;
    }

    public function getkodeproduksi(Request $request)
    {
        $produksi = Produksi::select('id','kode_produksi','nama_produksi')->where('kode_produksi', 'LIKE', '%'.$request->name_startsWith.'%')->get();
        $data = array();
        foreach ($produksi as $item) {
            $data[] = $item->id.'|'.$item->kode_produksi.'|'.$item->nama_produksi;
        }
        return response()->json($data);
    }
}
