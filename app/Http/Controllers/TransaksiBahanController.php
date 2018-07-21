<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TransaksiBahan;
use App\BahanBaku; 
use Yajra\Datatables\Facades\Datatables;
use DB;
use App\Helpers\Rupiah;

class TransaksiBahanController extends Controller
{
    public function index()
    {
        $t_bahan = TransaksiBahan::orderBy('created_at', 'asc')->get();
        return view('back.page.transaksi_baku.index', compact('t_bahan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kode = $this->kode_transaksi_bahan();
        return view('back.page.transaksi_baku.create', compact('kode'));
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

        if (DB::table('temp_detail_transaksi_bahan')->count() == 0) {
            return redirect()->back()->with('alert', 'Tabel Detail Bahan Baku Masih Kosong')->withInput();
        }

        $grand_total = DB::table('temp_detail_transaksi_bahan')->sum('total');
        $transaksi_bahan = new TransaksiBahan;
        $transaksi_bahan->kode_transaksi_bahan = $request->kode_tbb;
        $transaksi_bahan->grand_total = $grand_total;
        $transaksi_bahan->produksi_id = $request->id;
        $transaksi_bahan->save();


        $temp_det_bahan = DB::table('temp_detail_transaksi_bahan')->get();
        
        foreach ($temp_det_bahan as $item) {
            DB::table('detail_transaksi_bahan')->insert([
                'nama_bahan' => $item->nama_bahan,
                'satuan' => $item->satuan,
                'harga' => $item->harga,
                'jumlah' => $item->jumlah,
                'total' => $item->total,
                'transaksi_bahan_id' => $transaksi_bahan->id
            ]);
        }

        DB::table('temp_detail_transaksi_bahan')->truncate();

        return redirect('transaksi-bahan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $transaksi = TransaksiBahan::findOrFail($id);
        return view('back.page.transaksi_baku.detail', compact('transaksi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $bop = Bop::findOrFail($id);
        // return view('back.page.bop.edit', compact('bop'));
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

        return redirect('transaksi-bahan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transaksi = TransaksiBahan::findOrFail($id);
        $transaksi->delete();

        return redirect('transaksi-bahan');

    }

    public function kode_transaksi_bahan()
    {
        $data = TransaksiBahan::max('kode_transaksi_bahan');
        $nourut = (int)substr($data, 9, 5);
        $nourut++;
        $char = 'TBB';
        $newID = $char.date('dmy').sprintf("%05s", $nourut);
        return $newID;
    }

    public function getbahan(Request $request)
    {
        $bahan = BahanBaku::select('id','kode_bahanbaku','nama', 'satuan')->where('nama', 'LIKE', '%'.$request->name_startsWith.'%')->get();
        $data = array();
        foreach ($bahan as $item) {
            $data[] = $item->id.'|'.$item->kode_bahanbaku.'|'.$item->nama.'|'.$item->satuan;
        }
        return response()->json($data);
    }


    public function tambahkan_bahan(Request $request)
    {
        DB::table('temp_detail_transaksi_bahan')->insert([
            'nama_bahan' => $request->nama, 
            'satuan' => $request->satuan, 
            'harga' => $request->harga, 
            'jumlah' => $request->jumlah, 
            'total' => $request->total, 
        ]);

        return response()->json([
            'status' => 'succes' 
        ]);
    }

    public function hapus_temp_bahan(Request $request)
    {
        DB::table('temp_detail_transaksi_bahan')->where('id', $request->id)->delete();
        return response()->json([
            'status' => 'succes' 
        ]);
    }

    public function temp_tabel_bahan(Request $request)
    {
        $temp_bahan = DB::table('temp_detail_transaksi_bahan')->select('id','nama_bahan', 'satuan', 'harga', 'jumlah', 'total')->get();
        return Datatables::of($temp_bahan)
                    ->addColumn('harga', function ($data) {
                        return Rupiah::Rupiah($data->harga);
                    })
                    ->addColumn('total', function ($data) {
                        return Rupiah::Rupiah($data->total);
                    })
                    ->addColumn('action', function ($data) {
                        return '<button type="button" class="btn btn-danger btn-xs" onclick="hapus_bahan('.$data->id.')"><i class="fa fa-trash"></i></button>';
                    })->make(true);
    }
}
