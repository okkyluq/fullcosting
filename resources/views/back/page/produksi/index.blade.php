@extends('layouts.back')
@section('content')
<section class="content">
    <div class="row">
		<div class="col-md-6 text-left" style="margin-bottom: 20px;">
            <a href="{{url('produksi/create')}}" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Tambah Data</a>
		</div>
	</div>
	<div class="row" style="margin-bottom: 20px;">
		<div class="col-sm-12">
			<div class="box box-danger">
				<div class="box-header">
					<i class="fa fa-pencil"></i>
					<h3 class="box-title">Data Produksi</h3>
				</div>
				<div class="box-body">
					@if (!empty($produksi))
						<table class="table">
							<thead>
								<tr>
									<td width="80"><strong>No</strong></td>
									<td><strong>Kode Produksi</strong></td>
									<td><strong>Nama Produksi</strong></td>
									<td width="100"><strong>Tgl Update</strong></td>
									<td width="120" class="text-center"><strong>Action</strong></td>
								</tr>
							</thead>
							<tbody>
								@php $no=1 @endphp
								@foreach ($produksi as $isi)
								<tr>
									<td>{{$no++}}</td>
									<td>{{$isi->kode_produksi}}</td>
									<td>{{ $isi->nama_produksi }}</td>
									<td>{{date_format($isi->created_at, 'Y-m-d')}}</td>
									<td class="text-center">
										<div class="box-button" style="display: inline-block;">
											<a href="{{url('produksi/'.$isi->id.'/edit')}}" class="btn btn-xs btn-success"><i class="fa fa-edit"></i></a>
										</div>
										<div class="box-button" style="display: inline-block;">
											<form action="{{url('produksi/'.$isi->id)}}" method="POST">
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