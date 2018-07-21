@extends('layouts.back')
@section('content')
<section class="content">
    <div class="row">
		<div class="col-md-6 text-left" style="margin-bottom: 20px;">
            <a href="{{url('transaksi-bop/create')}}" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Tambah Data</a>
		</div>
	</div> 
	<div class="row" style="margin-bottom: 20px;">
		<div class="col-sm-12">
			<div class="box box-danger">
				<div class="box-header">
					<i class="fa fa-pencil"></i>
					<h3 class="box-title">Data Transaksi Biaya Overhead Perusahaan</h3>
				</div>
				<div class="box-body">
					@if (!empty($t_bop))
						<table class="table">
							<thead>
								<tr>
									<td width="80"><strong>No</strong></td>
									<td><strong>Kode Transaksi BOP</strong></td>
									<td><strong>Kode Produksi</strong></td>
									<td width="120" class="text-center"><strong>Total Biaya</strong></td>
									<td width="120" class="text-center"><strong>Detail Bahan</strong></td>
									<td width="100" class="text-center"><strong>Tgl Update</strong></td>
									<td width="120" class="text-center"><strong>Action</strong></td>
								</tr>
							</thead>
							<tbody>
								@php $no=1 @endphp
								@foreach ($t_bop as $isi)
								<tr>
									<td>{{$no++}}</td>
									<td class="text-left">{{$isi->kode_transaksi_bop}}</td>
									<td class="text-left">{{$isi->produksi->kode_produksi}}</td>
									<td class="text-center">{{ Rupiah::Rupiah($isi->grand_total) }}</td>
									<td class="text-center">
										<div class="box-button" style="display: inline-block;">
											<a href="{{ url('transaksi-bop/'.$isi->id) }}" class="btn btn-xs btn-primary"><i class="fa fa-eye"></i></a>
										</div>
									</td>
									<td class="text-center">{{date_format($isi->created_at, 'Y-m-d')}}</td>
									<td class="text-center">
										<div class="box-button" style="display: inline-block;">
											<form action="{{url('transaksi-bop/'.$isi->id)}}" method="POST">
												<input type="hidden" name="_token" value="{{csrf_token()}}">
												<input type="hidden" name="_method" value="delete">
												<button type="submit" class="btn btn-xs btn-danger"><i class="fa fa-trash-o"></i></button>
											</form>
										</div>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					@else
						<p>Tidak Ada Data</p>
					@endif
				</div>
				<div class="box-footer">

				</div>
			</div>
		</div>
	</div>
</section>
@endsection

