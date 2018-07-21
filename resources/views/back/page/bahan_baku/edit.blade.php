@extends('layouts.back')
@section('content')
    <section class="content">
        <div class="row">
    		<div class="col-sm-8 col-sm-offset-2">
    			<div class="box box-danger">
    			<div class="box-header">
    				<i class="fa fa-pencil"></i>
    				<h3 class="box-title">Edit Data Bahan Baku</h3>
    			</div>
    			<div class="box-body">
    				<form class="form-horizontal" method="POST" action="{{url('bahan/'.$bahan->id)}}" enctype="multipart/form-data">
                        <div class="form-group {{ $errors->has('kode_bahan_baku') ? ' has-error' : '' }}">
    	      				<label class="control-label col-sm-3" for="kode_bahan_baku">Kode Bahan Baku :</label>
    		      			<div class="col-sm-6">
    		        			<input type="text" class="form-control" id="kode_bahan_baku" name="kode_bahan_baku" readonly value="{{ Request::old('kode_bahan_baku', $bahan->kode_bahanbaku) }}"> 
                                @if ($errors->has('kode_bahan_baku'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('kode_bahan_baku') }}</strong>
                                    </span>
                                @endif
    		      			</div>
    	    			</div>
                        <div class="form-group {{ $errors->has('nama') ? ' has-error' : '' }}">
                            <label class="control-label col-sm-3" for="nama">Nama Bahan:</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="nama" name="nama" value="{{ Request::old('nama', $bahan->nama) }}">
                                @if ($errors->has('nama'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nama') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('satuan') ? ' has-error' : '' }}">
                            <label class="control-label col-sm-3" for="satuan">Satuan :</label>
                            <div class="col-sm-6">
                                <select name="satuan" id="satuan" class="form-control">
                                    <option value="">Pilih</option>
                                    <option value="G" {{ $bahan->satuan == 'G' ? 'selected' : '' }}>G (Gram)</option>
                                    <option value="Kg" {{ $bahan->satuan == 'Kg' ? 'selected' : '' }}>Kg (Kilogram)</option>
                                    <option value="Buah" {{ $bahan->satuan == 'Buah' ? 'selected' : '' }}>Buah</option>
                                    <option value="Bungkus" {{ $bahan->satuan == 'Bungkus' ? 'selected' : '' }}>Bungkus</option>
                                    <option value="Dos" {{ $bahan->satuan == 'Dos' ? 'selected' : '' }}>Dos</option>
                                    <option value="Biji" {{ $bahan->satuan == 'Biji' ? 'selected' : '' }}>Biji</option>
                                </select>
                                @if ($errors->has('satuan'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('satuan') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
    				    <div class="form-group">
    				      	<div class="col-sm-offset-3 col-sm-8">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <input type="hidden" name="_method" value="PUT">
                                <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-floppy-o"></i> Simpan</button>
                                <a href="{{url('bahan')}}" class="btn btn-sm btn-danger">Kembali</a>
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
