<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bop;

class BopController extends Controller
{
    public function index()
    {
        $bop = Bop::orderBy('created_at', 'asc')->get();
        return view('back.page.bop.index', compact('bop'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kode = $this->kode_bop();
        return view('back.page.bop.create', compact('kode'));
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
            'kode_bop' => 'required',
            'bop' => 'required'
        ]);

        $bop = new Bop;
        $bop->kode_bop = $request->kode_bop;
        $bop->bop = $request->bop;
        $bop->save();

        return redirect('bop');
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
        $bop = Bop::findOrFail($id);
        return view('back.page.bop.edit', compact('bop'));
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
            'kode_bop' => 'required',
            'bop' => 'required'
        ]);

        $bop = Bop::findOrFail($id);
        $bop->kode_bop = $request->kode_bop;
        $bop->bop = $request->bop;
        $bop->save();

        return redirect('bop');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bop = Bop::findOrFail($id);
        $bop->delete();

        return redirect('bop');

    }

    public function kode_bop()
    {
        $data = Bop::max('kode_bop');
        $nourut = (int)substr($data, 9, 5);
        $nourut++;
        $char = 'BOP';
        $newID = $char.date('dmy').sprintf("%05s", $nourut);
        return $newID;
    }
}
