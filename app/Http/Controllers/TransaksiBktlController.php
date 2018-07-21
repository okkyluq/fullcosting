<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TransaksiBktl;
use App\Btkl; 
use Yajra\Datatables\Facades\Datatables;
use DB;
use App\Helpers\Rupiah;

class TransaksiBktlController extends Controller
{
    /** 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $t_btkl = TransaksiBktl::orderBy('created_at', 'asc')->get();
        return view('back.page.transaksi_btkl.index', compact('t_btkl'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kode = $this->kode_transaksi_btkl();
        return view('back.page.transaksi_btkl.create', compact('kode'));
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

        if (DB::table('temp_detail_transaksi_bktl')->count() == 0) {
            return redirect()->back()->with('alert', 'Tabel Detail BTKL Masih Kosong')->withInput();
        }

        $grand_total = DB::table('temp_detail_transaksi_bktl')->sum('total');

        $transaksi_bktl = new TransaksiBktl;
        $transaksi_bktl->kode_transaksi_bktl = $request->kode_tbtkl;
        $transaksi_bktl->grand_total = $grand_total;
        $transaksi_bktl->produksi_id = $request->id;
        $transaksi_bktl->save();


        $temp_det_bktl = DB::table('temp_detail_transaksi_bktl')->get();
        
        foreach ($temp_det_bktl as $item) {
            DB::table('detail_transaksi_bktl')->insert([
                'bktl' => $item->bktl,
                'harga' => $item->harga,
                'orang' => $item->orang,
                'total' => $item->total,
                'transaksi_bktl_id' => $transaksi_bktl->id
            ]);
        }

        DB::table('temp_detail_transaksi_bktl')->truncate();

        return redirect('transaksi-btkl');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $btkl = TransaksiBktl::findOrFail($id);
        return view('back.page.transaksi_btkl.detail', compact('btkl'));
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
        $transaksi = TransaksiBktl::findOrFail($id);
        $transaksi->delete();

        return redirect('transaksi-btkl');
    }

    public function kode_transaksi_btkl()
    {
        $data = TransaksiBktl::max('kode_transaksi_bktl');
        $nourut = (int)substr($data, 9, 5);
        $nourut++;
        $char = 'TTBKTL';
        $newID = $char.date('dmy').sprintf("%05s", $nourut);
        return $newID;
    }


    public function getbtkl(Request $request)
    {
        $btkl = Btkl::select('id','kode_btkl','btkl')->where('btkl', 'LIKE', '%'.$request->name_startsWith.'%')->get();
        $data = array();
        foreach ($btkl as $item) {
            $data[] = $item->id.'|'.$item->kode_btkl.'|'.$item->btkl;
        }
        return response()->json($data);
    }


    public function tambahkan_btkl(Request $request)
    {
        DB::table('temp_detail_transaksi_bktl')->insert([
            'bktl' => $request->btkl, 
            'harga' => $request->harga, 
            'orang' => $request->orang, 
            'total' => $request->total, 
        ]);

        return response()->json([
            'status' => 'succes' 
        ]);
    }

    public function hapus_temp_btkl(Request $request)
    {
        DB::table('temp_detail_transaksi_bahan')->where('id', $request->id)->delete();
        return response()->json([
            'status' => 'succes' 
        ]);
    }

    public function temp_tabel_btkl(Request $request)
    {
        $temp_btkl = DB::table('temp_detail_transaksi_bktl')->select('id','bktl', 'harga', 'orang', 'total')->get();
        return Datatables::of($temp_btkl)
                    ->addColumn('harga', function ($data) {
                        return Rupiah::Rupiah($data->harga);
                    })
                    ->addColumn('total', function ($data) {
                        return Rupiah::Rupiah($data->total);
                    })
                    ->addColumn('action', function ($data) {
                        return '<button type="button" class="btn btn-danger btn-xs" onclick="hapus_btkl('.$data->id.')"><i class="fa fa-trash"></i></button>';
                    })->make(true);
    }

}
