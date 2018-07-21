@extends('layouts.back')
@section('content')
    <section class="content">
        <div class="row">
    		<div class="col-sm-12">
    			<div class="box box-danger">
    			<div class="box-header">
    				<i class="fa fa-pencil"></i>
    				<h3 class="box-title">Input Transaksi Data BTKL</h3>
    			</div>
    			<div class="box-body">
                    @include('back.partials.alert')
                    
    				<form class="form-horizontal" method="POST" action="{{url('transaksi-btkl')}}" enctype="multipart/form-data">
                        <div style="margin-bottom: 10px;">
                            <a class="btn btn-block btn-social btn-github">
                                <i class="fa fa-info"></i> Informasi Transaksi
                            </a>    
                        </div>
                        

                        <div class="form-group {{ $errors->has('kode_tbtkl') ? ' has-error' : '' }}">
    	      				<label class="control-label col-sm-2" for="kode_tbtkl">Kode Transaksi BTKL :</label>
    		      			<div class="col-sm-3">
    		        			<input type="text" class="form-control" id="kode_tbtkl" name="kode_tbtkl" readonly value="{{ Request::old('kode_tbtkl', $kode) }}">
                                @if ($errors->has('kode_tbtkl'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('kode_tbtkl') }}</strong>
                                    </span>
                                @endif
    		      			</div>
                            <label class="control-label col-sm-1" for="kode_produksi">Kode Produksi</label>
                            <div class="col-sm-2 {{ $errors->has('kode_produksi') ? ' has-error' : '' }}">
                                <input type="text" class="form-control" id="kode_produksi" name="kode_produksi" value="{{ Request::old('kode_produksi') }}" autocomplete="false">
                                @if ($errors->has('kode_produksi'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('kode_produksi') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <label class="control-label col-sm-1" for="nama_produksi">Nama Produksi</label>
                            <div class="col-sm-3 {{ $errors->has('nama_produksi') ? ' has-error' : '' }}">
                                <input type="hidden" class="form-control" id="id" name="id" value="{{ Request::old('id') }}">
                                <input type="text" class="form-control" id="nama_produksi" name="nama_produksi" readonly value="{{ Request::old('nama_produksi') }}">
                                @if ($errors->has('nama_produksi'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nama_produksi') }}</strong>
                                    </span>
                                @endif
                            </div>
    	    			</div>
                        
                        <div style="margin-bottom: 10px;">
                            <a class="btn btn-block btn-social btn-github">
                                <i class="fa fa-info"></i> Detail BTKL
                            </a>    
                        </div>

                        <div class="col-sm-12" id="isi-alert"></div>
                        
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="bop">BTKL :</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" id="btkl" name="btkl" placeholder="Cari BTKL">
                            </div>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" id="kode_btkl" name="kode_btkl" placeholder="Kode BTKL" readonly>
                            </div> 
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-3">
                                <input type="text" class="form-control" id="harga" name="harga" placeholder="Biaya">
                            </div>
                            <div class="col-sm-3 ">
                                <input type="number" class="form-control" id="orang" name="orang" placeholder="Orang" onchange="kalkulasi(this.value)">
                            </div>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" id="total" name="total" placeholder="Total" readonly>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-2">
                                <button class="btn btn-sm btn-primary" type="button" onclick="tambahkan_btkl();"><i class="fa fa-plus"></i> Tambahkan</button>
                            </div>
                        </div>
                            
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <hr>
                                <table class="table table-striped" id="table-btkl">
                                    <thead>
                                        <tr>
                                            <th>BTKL</th>
                                            <th>Harga</th>
                                            <th>Orang</th>
                                            <th>Total</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>

    				    <div class="form-group">
    				      	<div class="col-sm-offset-2 col-sm-8">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-floppy-o"></i> Simpan</button>
                                <a href="{{url('transaksi-btkl')}}" class="btn btn-sm btn-danger">Kembali</a>
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
    //datatable bahan
    $('#table-btkl').DataTable({
            searching: false,
            info: false,
            paging: false,
            lengthChange: false,
            processing: true,
            serverSide: true,
            ajax: "{{ url('temp-tabel-btkl') }}",
            columns: [
                {data: 'bktl', name: 'bktl', orderable: false},
                {data: 'harga', name: 'harga', orderable: false},
                {data: 'orang', name: 'orang', orderable: false},
                {data: 'total', name: 'total', orderable: false},
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ]
    });


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
            $('#nama_produksi').val(names[2]);
            $('#id').val(names[0]);
        }               
    });


    $('#btkl').autocomplete({
        source: function( request, response ) {
        var csrf_token = $('meta[name="csrf-token"]').attr("content");
        $.ajax({
            url : '/getbtkl',
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
                        label: code[2],
                        value: code[2],
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
            $('#btkl').val(names[1]);
            $('#kode_btkl').val(names[1]);
        }               
    });

    function kalkulasi(jumlah){
        harga = $('#harga').val();

        if(harga == 0){
            alert('Biaya Masih Kosong');
            $('#harga').focus();
            $('#jumlah').val('');
            return false;
        }
        total = jumlah * harga;
        $('#total').val(total);
    }


    function tambahkan_btkl(){
        if ($('#btkl').val() == '') {
            $('#isi-alert').append('<div class="alert alert-danger alert-dismissible"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> <p><i class="icon fa fa-ban"></i>Inputan Masih Kosong</p> </div>');
            $('#nama_bahan').focus();
            return false;
        }
        var csrf_token = $('meta[name="csrf-token"]').attr("content");
        var btkl = $('#btkl').val();
        var kode_btkl = $('#kode_btkl').val();
        var harga = $('#harga').val();
        var orang = $('#orang').val();
        var total = $('#total').val();

        var isi = {_token : csrf_token, btkl : btkl, kode_btkl : kode_btkl, harga : harga, orang : orang, total : total };

        console.log(isi);

        $.ajax({
            url : '/tambahkan-btkl',
            data : isi,
            type : 'POST',
            success : function(result){
                clear();
            }
        });


    }


    function clear(){
        $('#btkl').val('');
        $('#kode_btkl').val('');
        $('#harga').val('');
        $('#orang').val('');
        $('#total').val('');
        $('#table-btkl').DataTable().ajax.reload();
    }

</script>
@endsection