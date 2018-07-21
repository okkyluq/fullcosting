<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TransaksiBop;
use App\Bop; 
use Yajra\Datatables\Facades\Datatables;
use DB;
use App\Helpers\Rupiah;

class TransaksiBopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $t_bop = TransaksiBop::orderBy('created_at', 'asc')->get();
        return view('back.page.transaksi_bop.index', compact('t_bop'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kode = $this->kode_transaksi_bop();
        return view('back.page.transaksi_bop.create', compact('kode'));
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

        if (DB::table('temp_detail_transaksi_bop')->count() == 0) {
            return redirect()->back()->with('alert', 'Tabel Detail BOP Masih Kosong')->withInput();
        }

        $grand_total = DB::table('temp_detail_transaksi_bop')->sum('total');
        $transaksi_bop = new TransaksiBop;
        $transaksi_bop->kode_transaksi_bop = $request->kode_tbop;
        $transaksi_bop->grand_total = $grand_total;
        $transaksi_bop->produksi_id = $request->id;
        $transaksi_bop->save();


        $temp_det_bop = DB::table('temp_detail_transaksi_bop')->get();
        
        foreach ($temp_det_bop as $item) {
            DB::table('detail_transaksi_bop')->insert([
                'bop' => $item->bop,
                'harga' => $item->harga,
                'jumlah' => $item->jumlah,
                'total' => $item->total,
                'transaksi_bop_id' => $transaksi_bop->id
            ]);
        }

        DB::table('temp_detail_transaksi_bop')->truncate();

        return redirect('transaksi-bop');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bop = TransaksiBop::findOrFail($id);
        return view('back.page.transaksi_bop.detail', compact('bop'));
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
        $transaksi = TransaksiBop::findOrFail($id);
        $transaksi->delete();

        return redirect('transaksi-bop');
    }

    public function kode_transaksi_bop()
    {
        $data = TransaksiBop::max('kode_transaksi_bop');
        $nourut = (int)substr($data, 9, 5);
        $nourut++;
        $char = 'TBOP';
        $newID = $char.date('dmy').sprintf("%05s", $nourut);
        return $newID;
    }


    public function getbop(Request $request)
    {
        $bop = Bop::select('id','kode_bop','bop')->where('bop', 'LIKE', '%'.$request->name_startsWith.'%')->get();
        $data = array();
        foreach ($bop as $item) {
            $data[] = $item->id.'|'.$item->kode_bop.'|'.$item->bop;
        }
        return response()->json($data);
    }


    public function tambahkan_bop(Request $request)
    {
        DB::table('temp_detail_transaksi_bop')->insert([
            'bop' => $request->bop, 
            'harga' => $request->harga, 
            'jumlah' => $request->jumlah, 
            'total' => $request->total, 
        ]);

        return response()->json([
            'status' => 'succes' 
        ]);
    }

    public function hapus_temp_bop(Request $request)
    {
        DB::table('temp_detail_transaksi_bop')->where('id', $request->id)->delete();
        return response()->json([
            'status' => 'succes' 
        ]);
    }

    public function temp_tabel_bop(Request $request)
    {
        $temp_bop = DB::table('temp_detail_transaksi_bop')->select('id','bop', 'harga', 'jumlah', 'total')->get();
        return Datatables::of($temp_bop)
                    ->addColumn('harga', function ($data) {
                        return Rupiah::Rupiah($data->harga);
                    })
                    ->addColumn('total', function ($data) {
                        return Rupiah::Rupiah($data->total);
                    })
                    ->addColumn('action', function ($data) {
                        return '<button type="button" class="btn btn-danger btn-xs" onclick="hapus_bop('.$data->id.')"><i class="fa fa-trash"></i></button>';
                    })->make(true);
    }
}
