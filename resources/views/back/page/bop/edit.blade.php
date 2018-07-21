@extends('layouts.back')
@section('content')
    <section class="content">
        <div class="row">
    		<div class="col-sm-8 col-sm-offset-2">
    			<div class="box box-danger">
    			<div class="box-header">
    				<i class="fa fa-pencil"></i>
    				<h3 class="box-title">Input Data Overhead Produksi</h3>
    			</div>
    			<div class="box-body">
    				<form class="form-horizontal" method="POST" action="{{url('bop/'.$bop->id)}}" enctype="multipart/form-data">
                        <div class="form-group {{ $errors->has('kode_bop') ? ' has-error' : '' }}">
    	      				<label class="control-label col-sm-3" for="kode_bop">Kode BOP :</label>
    		      			<div class="col-sm-6">
    		        			<input type="text" class="form-control" id="kode_bop" name="kode_bop" readonly value="{{ Request::old('kode_bop', $bop->kode_bop) }}">
                                @if ($errors->has('kode_bop'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('kode_bop') }}</strong>
                                    </span>
                                @endif
    		      			</div>
    	    			</div>
                        <div class="form-group {{ $errors->has('bop') ? ' has-error' : '' }}">
                            <label class="control-label col-sm-3" for="bop">BOP:</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="bop" name="bop" value="{{ Request::old('bop', $bop->bop) }}">
                                @if ($errors->has('bop'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('bop') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
    				    <div class="form-group">
    				      	<div class="col-sm-offset-3 col-sm-8">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <input type="hidden" name="_method" value="PUT">
                                <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-floppy-o"></i> Update</button>
                                <a href="{{url('bop')}}" class="btn btn-sm btn-danger">Kembali</a>
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
