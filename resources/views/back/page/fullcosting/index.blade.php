@extends('layouts.back')
@section('content')
    <section class="content">
        <div class="row">
    		<div class="col-sm-8 col-sm-offset-2">
    			<div class="box box-danger">
    			<div class="box-header">
    				<i class="fa fa-pencil"></i>
    				<h3 class="box-title">Pilih Data Produksi</h3>
    			</div>
    			<div class="box-body">
                    @include('back.partials.alert')
    				<form class="form-horizontal" method="POST" action="{{url('cek-fc')}}" enctype="multipart/form-data">
                        <div class="form-group {{ $errors->has('kode_produksi') ? ' has-error' : '' }}">
                            <label class="control-label col-sm-3" for="kode_produksi">Kode Produksi:</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="kode_produksi" name="kode_produksi" autocomplete="off" placeholder="Cari Kode Produksi" value="{{ Request::old('kode_produksi') }}">
                                <input type="hidden" id="id" name="id">
                                @if ($errors->has('kode_produksi'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('kode_produksi') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('jml_produksi') ? ' has-error' : '' }}">
                            <label class="control-label col-sm-3" for="jml_produksi">Jumlah Produksi:</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="jml_produksi" name="jml_produksi" placeholder="Jumlah Produksi" value="{{ Request::old('jml_produksi') }}">
                                @if ($errors->has('jml_produksi'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('jml_produksi') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('laba') ? ' has-error' : '' }}">
                            <label class="control-label col-sm-3" for="laba">Persentase Laba:</label>
							<div class="input-group col-sm-6">
								<input type="text" id="laba" name="laba" placeholder="Persentase Laba" class="form-control" style="margin-left: 15px;" value="{{ Request::old('laba') }}">
                                @if ($errors->has('laba'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('laba') }}</strong>
                                    </span>
                                @endif
								<span class="input-group-btn">
								<button type="submit" class="btn btn-success btn-flat">%</button>
								</span>
                                
							</div>
                        </div>
    				    <div class="form-group">
    				      	<div class="col-sm-offset-3 col-sm-8">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <button type="submit" class="btn btn-sm btn-flat btn-danger"><i class="fa fa-bar-chart"></i> Hitung</button>
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


@section('script')
<script>
	// autocomplete kode produksi
    $('#kode_produksi').autocomplete({
        source: function( request, response ) {
        var csrf_token = $('meta[name="csrf-token"]').attr("content");
        $.ajax({
            url : "{{ url('getkodeproduksi') }}",
            dataType: "json",
            method: 'post',
            data: {
               name_startsWith: request.term,
               _token : csrf_token
            },
             success: function( data ) {
                 response( $.map( data, function( item ) {
                    var code = item.split("|");
                    return {
                        label: code[1],
                        value: code[1],
                        data : item
                    }
                }));
            }
        });
        },
        autoFocus: true,            
        minLength: 0,
        select: function( event, ui ) {
            var names = ui.item.data.split("|");
            $('#id').val(names[0]);
        }               
    });
</script>
@endsection