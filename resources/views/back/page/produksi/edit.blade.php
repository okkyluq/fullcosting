@extends('layouts.back')
@section('content')
    <section class="content">
        <div class="row">
    		<div class="col-sm-8 col-sm-offset-2">
    			<div class="box box-danger">
    			<div class="box-header">
    				<i class="fa fa-pencil"></i>
    				<h3 class="box-title">Edit Data Produksi</h3>
    			</div>
    			<div class="box-body">
    				<form class="form-horizontal" method="POST" action="{{url('produksi/'.$produksi->id)}}" enctype="multipart/form-data">
                        <div class="form-group {{ $errors->has('kode_produksi') ? ' has-error' : '' }}">
    	      				<label class="control-label col-sm-3" for="kode_produksi">Kode Produksi :</label>
    		      			<div class="col-sm-6">
    		        			<input type="text" class="form-control" id="kode_produksi" name="kode_produksi" readonly value="{{ Request::old('kode_produksi', $produksi->kode_produksi) }}">
                                @if ($errors->has('kode_produksi'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('kode_produksi') }}</strong>
                                    </span>
                                @endif
    		      			</div>
    	    			</div>
                        <div class="form-group {{ $errors->has('nama_produksi') ? ' has-error' : '' }}">
                            <label class="control-label col-sm-3" for="nama_produksi">Nama Produksi:</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="nama_produksi" name="nama_produksi" value="{{ Request::old('nama_produksi', $produksi->nama_produksi) }}">
                                @if ($errors->has('nama_produksi'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nama_produksi') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
    				    <div class="form-group">
    				      	<div class="col-sm-offset-3 col-sm-8">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <input type="hidden" name="_method" value="PUT">
                                <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-floppy-o"></i> Update</button>
                                <a href="{{url('produksi')}}" class="btn btn-sm btn-danger">Kembali</a>
    				      	</div>
    				    </div>
    	  			</form>
    			</div>
    			<div class="box-footer"></div>
    			</div>
    		</div>
    	</div>
    </section>
@endsection
