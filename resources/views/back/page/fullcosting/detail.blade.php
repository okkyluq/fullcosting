@extends('layouts.back')
@section('content')
<section class="content">
	<div class="row" style="margin-bottom: 20px;">
		<div class="col-sm-12">
			<div class="box box-danger">
				<div class="box-header">
					<i class="fa fa-pencil"></i>
					<h3 class="box-title">Data Full Costing & Sell Price </h3>
				</div>
				<div class="box-body">
					
            		<p class="lead">Kode Produksi : {{ $produksi->kode_produksi }} - {{ $produksi->nama_produksi }} </p>
					
					<div style="margin-bottom: 10px;">
						<a class="btn btn-block btn-social btn-github">
							<i class="fa fa-info"></i> Informasi Detail Transaksi Bahan Baku
						</a>    
					</div>
					
					<table class="table table-bordered">
						<thead>
							<tr>
								<th style="width: 10px">No</th>
								<th class="text-center">Nama Bahan</th>
								<th class="text-center">Satuan</th>
								<th class="text-center">Harga</th>
								<th class="text-center">Jumlah</th>
								<th class="text-center" width="250">Total</th>
							</tr>
						</thead>
						<tbody>
							@php
								$no =1
							@endphp
							@foreach ($produksi->transaksi_bahan->detail_tranksaksi_bahan as $isi)
							<tr>
								<td style="width: 10px">{{ $no++ }}</td>
								<td class="text-center">{{ $isi->nama_bahan }}</td>
								<td class="text-center">{{ $isi->satuan }}</td>
								<td class="text-center">{{ Rupiah::Rupiah($isi->harga) }}</td>
								<td class="text-center">{{ $isi->jumlah }}</td>
								<td class="text-center" width="250">{{ Rupiah::Rupiah($isi->total) }}</td>
							</tr>
							@endforeach
						</tbody>
						<tfoot>
							<tr>
								<td colspan="5" class="text-center"><strong>Total :</strong></td>
								<td class="text-center"><strong>{{ Rupiah::Rupiah($produksi->transaksi_bahan->detail_tranksaksi_bahan->sum('total')) }}</strong></td>
							</tr>
						</tfoot>
					</table>
					<hr>
					<div style="margin-bottom: 10px;">
						<a class="btn btn-block btn-social btn-github">
							<i class="fa fa-info"></i> Informasi Detail Transaksi Biaya Tenaga Kerja Langsung
						</a>    
					</div>
					
					<table class="table table-bordered">
						<thead>
							<tr>
								<th style="width: 10px">No</th>
								<th class="text-center">BTKL</th>
								<th class="text-center">Biaya</th>
								<th class="text-center">Orang</th>
								<th class="text-center" width="250">Total</th>
							</tr>
						</thead>
						<tbody>
							@php
								$no =1
							@endphp
							@foreach ($produksi->transaksi_bktl->detail_tranksaksi_bktl as $isi)
							<tr>
								<td style="width: 10px">{{ $no++ }}</td>
								<td class="text-center">{{ $isi->bktl }}</td>
								<td class="text-center">{{ Rupiah::Rupiah($isi->harga) }}</td>
								<td class="text-center">{{ $isi->orang }}</td>
								<td class="text-center" width="250">{{ Rupiah::Rupiah($isi->total) }}</td>
							</tr>
							@endforeach
						</tbody>
						<tfoot>
							<tr>
								<td colspan="4" class="text-center"><strong>Total :</strong></td>
								<td class="text-center"><strong>{{ Rupiah::Rupiah($produksi->transaksi_bktl->detail_tranksaksi_bktl->sum('total')) }}</strong></td>
							</tr>
						</tfoot>
					</table>
					<hr>
					<div style="margin-bottom: 10px;">
						<a class="btn btn-block btn-social btn-github">
							<i class="fa fa-info"></i> Informasi Detail Transaksi Overhead Perusahaan
						</a>    
					</div>
					
					<table class="table table-bordered">
						<thead>
							<tr>
								<th style="width: 10px">No</th>
								<th class="text-center">BOP</th>
								<th class="text-center">Harga</th>
								<th class="text-center">Jumlah</th>
								<th class="text-center" width="250">Total</th>
							</tr>
						</thead>
						<tbody>
							@php
								$no =1
							@endphp
							@foreach ($produksi->transaksi_bop->detail_tranksaksi_bop as $isi)
							<tr>
								<td style="width: 10px">{{ $no++ }}</td>
								<td class="text-center">{{ $isi->bop }}</td>
								<td class="text-center">{{ Rupiah::Rupiah($isi->harga) }}</td>
								<td class="text-center">{{ $isi->jumlah }}</td>
								<td class="text-center">{{ Rupiah::Rupiah($isi->total) }}</td>
							</tr>
							@endforeach
						</tbody>
						<tfoot>
							<tr>
								<td colspan="4" class="text-center"><strong>Total :</strong></td>
								<td class="text-center"><strong>{{ Rupiah::Rupiah($produksi->transaksi_bop->detail_tranksaksi_bop->sum('total')) }}</strong></td>
							</tr>
						</tfoot>
					</table>
					
					<hr>
					<div style="margin-bottom: 10px;">
						<a class="btn btn-block btn-social btn-github">
							<i class="fa fa-info"></i> Informasi Harga Pokok Produk
						</a>    
					</div>

					<table class="table table-bordered">
						<tbody>
							<tr>
								<th class="text-center">Total Pengeluaran Produksi </th>
								<th class="text-center text-red" width="250">
									@php
										$jumlah = $produksi->transaksi_bahan->detail_tranksaksi_bahan->sum('total') +
										$produksi->transaksi_bktl->detail_tranksaksi_bktl->sum('total') +
										$produksi->transaksi_bop->detail_tranksaksi_bop->sum('total')
									@endphp
									{{ Rupiah::Rupiah($jumlah) }}
								</th>
							</tr>
							<tr>
								<th class="text-center">Jumlah Produksi </th>
								<th class="text-center text-red" width="250">{{ $jml_produksi }}</th>
							</tr>
							<tr>
								<th class="text-center">Harga Pokok Produk </th>
								<th class="text-center text-red" width="250">
									{{
										Rupiah::Rupiah($jumlah / $jml_produksi)
									}}
								</th>
							</tr>
						</tbody>
					</table>

					<hr>
					<div style="margin-bottom: 10px;">
						<a class="btn btn-block btn-social btn-github">
							<i class="fa fa-info"></i> Informasi Harga Jual Produk
						</a>    
					</div>


					<table class="table table-bordered">
						<tbody>
							<tr>
								<th class="text-center">Persentase Laba </th>
								<th class="text-center text-red" width="250">{{ $laba }}%</th>
							</tr>
							<tr>
								<th class="text-center">Total Harga Jual Pasaran</th>
								<th class="text-center text-red" width="250">
									@php
										$harga_total_jual = $jumlah + ($jumlah * ($laba / 100))
									@endphp
									{{ Rupiah::Rupiah($harga_total_jual) }}
								</th>
							</tr>
							<tr>
								<th class="text-center">Harga Jual Perunit Produk Pasaran </th>
								<th class="text-center text-red" width="250" >
									{{ Rupiah::Rupiah($harga_total_jual / $jml_produksi) }}
								</th>
							</tr>
						</tbody>
					</table>
					<hr>
					<a href="{{ url('fc') }}" class="btn btn-danger btn-lg btn-block"><i class="fa fa-arrow-left"></i> Back</a>

				</div>
				<div class="box-footer">

				</div>
			</div>
		</div>
	</div>
</section>
@endsection