@extends('layouts.back')
@section('content')
<section class="content">
    <div class="row">
		<div class="col-md-6 text-left" style="margin-bottom: 20px;">
            <a href="{{url('transaksi-bop')}}" class="btn btn-sm btn-warning"><i class="fa fa-arrow-left"></i> Kembali</a>
		</div>
	</div>
	<div class="row" style="margin-bottom: 20px;">
		<div class="col-sm-12">
			<div class="box box-danger">
				<div class="box-header">
					<i class="fa fa-pencil"></i>
					<h3 class="box-title">Detail Transaksi BOP - {{ $bop->kode_transaksi_bop }}</h3>
				</div>
				<div class="box-body">
					<table class="table">
						<thead>
							<tr>
								<td width="80"><strong>No</strong></td>
								<td><strong>BOP</strong></td>
								<td width="120" class="text-center"><strong>Harga</strong></td>
								<td class="text-center"><strong>Jumlah</strong></td>
								<td width="120" class="text-center"><strong>Total</strong></td>
							</tr>
						</thead>
						<tbody>
							@php $no=1 @endphp
							@foreach ($bop->detail_tranksaksi_bop as $isi)
							<tr>
								<td>{{$no++}}</td>
								<td class="text-left">{{$isi->bop}}</td>
								<td class="text-center">{{ Rupiah::Rupiah($isi->harga) }}</td>
								<td class="text-center">{{$isi->jumlah}}</td>
								<td class="text-center">{{Rupiah::Rupiah($isi->jumlah * $isi->harga)}}</td>
							</tr>
							@endforeach
						</tbody>
						<tfoot>
							<tr>
								<td colspan="4" class="text-center"><strong>Grand Total :</strong> </td>
								<td class="text-center"><strong>{{ Rupiah::Rupiah($bop->grand_total) }}</strong></td>
							</tr>
						</tfoot>
					</table>
				</div>
				<div class="box-footer">

				</div>
			</div>
		</div>
	</div>
</section>
@endsection

