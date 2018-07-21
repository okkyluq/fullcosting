@extends('layouts.back')
@section('content')
    <section class="content">
        <div class="row">
    		<div class="col-sm-8 col-sm-offset-2">
    			<div class="box box-danger">
    			<div class="box-header">
    				<i class="fa fa-pencil"></i>
    				<h3 class="box-title">Edit Data Biaya Tenaga Kerja Langsung</h3>
    			</div>
    			<div class="box-body">
    				<form class="form-horizontal" method="POST" action="{{url('btkl/'.$btkl->id)}}" enctype="multipart/form-data">
                        <div class="form-group {{ $errors->has('kode_btkl') ? ' has-error' : '' }}">
    	      				<label class="control-label col-sm-3" for="kode_btkl">Kode BTKL :</label>
    		      			<div class="col-sm-6">
    		        			<input type="text" class="form-control" id="kode_btkl" name="kode_btkl" readonly value="{{ Request::old('kode_btkl', $btkl->kode_btkl) }}">
                                @if ($errors->has('kode_btkl'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('kode_btkl') }}</strong>
                                    </span>
                                @endif
    		      			</div>
    	    			</div>
                        <div class="form-group {{ $errors->has('btkl') ? ' has-error' : '' }}">
                            <label class="control-label col-sm-3" for="btkl">BTKL:</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="btkl" name="btkl" value="{{ Request::old('btkl', $btkl->btkl) }}">
                                @if ($errors->has('btkl'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('btkl') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
    				    <div class="form-group">
    				      	<div class="col-sm-offset-3 col-sm-8">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <input type="hidden" name="_method" value="PUT">
                                <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-floppy-o"></i> Update</button>
                                <a href="{{url('btkl')}}" class="btn btn-sm btn-danger">Kembali</a>
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
