<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Btkl;

class BtklController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $btkl = Btkl::orderBy('created_at', 'asc')->get();
        return view('back.page.btkl.index', compact('btkl'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kode = $this->kode_btkl();
        return view('back.page.btkl.create', compact('kode'));
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
            'kode_btkl' => 'required',
            'btkl' => 'required'
        ]);

        $btkl = new Btkl;
        $btkl->kode_btkl = $request->kode_btkl;
        $btkl->btkl = $request->btkl;
        $btkl->save();

        return redirect('btkl');
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
        $btkl = Btkl::findOrFail($id);
        return view('back.page.btkl.edit', compact('btkl'));
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
            'kode_btkl' => 'required',
            'btkl' => 'required'
        ]);

        $btkl = Btkl::findOrFail($id);
        $btkl->kode_btkl = $request->kode_btkl;
        $btkl->btkl = $request->btkl;
        $btkl->save();

        return redirect('btkl');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $btkl = Btkl::findOrFail($id);
        $btkl->delete();

        return redirect('btkl');

    }

    public function kode_btkl()
    {
        $data = Btkl::max('kode_btkl');
        $nourut = (int)substr($data, 9, 5);
        $nourut++;
        $char = 'BTKL';
        $newID = $char.date('dmy').sprintf("%05s", $nourut);
        return $newID;
    }
}
