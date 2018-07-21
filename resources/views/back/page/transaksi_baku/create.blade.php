@extends('layouts.back')
@section('content')
    <section class="content">
        <div class="row">
    		<div class="col-sm-12">
    			<div class="box box-danger">
    			<div class="box-header">
    				<i class="fa fa-pencil"></i>
    				<h3 class="box-title">Input Data Overhead Produksi</h3>
    			</div>
    			<div class="box-body"> 
                    @include('back.partials.alert')
    				<form class="form-horizontal" method="POST" action="{{url('transaksi-bahan')}}" enctype="multipart/form-data">
                        <div style="margin-bottom: 10px;">
                            <a class="btn btn-block btn-social btn-github">
                                <i class="fa fa-info"></i> Informasi Transaksi
                            </a>    
                        </div>
                        
                        <div class="form-group">
    	      				<label class="control-label col-sm-2" for="kode_tbb">Kode Transaksi Bahan Baku</label>
    		      			<div class="col-sm-2">
    		        			<input type="text" class="form-control" id="kode_tbb" name="kode_tbb" readonly value="{{ Request::old('kode_tbb', $kode) }}">
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
                                <i class="fa fa-info"></i> Detail Bahan Baku
                            </a>    
                        </div>
                        <div class="col-sm-12" id="isi-alert">
                            
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="bop">Nama Bahan:</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" id="nama_bahan" name="nama_bahan" placeholder="Cari Nama Bahan">
                            </div>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" id="kode_bahan" name="kode_bahan" placeholder="Kode bahan" readonly>
                            </div>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" id="satuan" name="satuan" placeholder="Satuan" readonly>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-3">
                                <input type="text" class="form-control" id="harga" name="harga" placeholder="Harga">
                            </div>
                            <div class="col-sm-3 ">
                                <input type="number" class="form-control" id="jumlah" name="jumlah" placeholder="Jumlah" onchange="kalkulasi(this.value);">
                            </div>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" id="total" name="total" placeholder="Total" readonly>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-2">
                                <button class="btn btn-sm btn-primary" type="button" onclick="tambahkan_bahan();"><i class="fa fa-plus"></i> Tambahkan</button>
                            </div>
                        </div>
                            
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <hr>
                                <table class="table table-striped" id="table-bahan">
                                    <thead>
                                        <tr>
                                            <th>Nama Bahan</th>
                                            <th>Satuan</th>
                                            <th>Harga</th>
                                            <th>Jumlah</th>
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
                                <a href="{{url('transaksi-bahan')}}" class="btn btn-sm btn-danger">Kembali</a>
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

    $('#table-bahan').DataTable({
            searching: false,
            info: false,
            paging: false,
            lengthChange: false,
            processing: true,
            serverSide: true,
            columnDefs: [
            {
              targets: 1,
              className: 'text-center'
            },
            {
              targets: 2,
              className: 'text-center'
            },
            {
              targets: 3,
              className: 'text-center'
            },
            {
              targets: 5,
              className: 'text-center'
            },
            {
              targets: 4,
              className: 'text-center'
            }],
            ajax: "{{ url('temp-tabel-bahan') }}",
            columns: [
                {data: 'nama_bahan', name: 'nama_bahan', orderable: false},
                {data: 'satuan', name: 'satuan' , orderable: false},
                {data: 'harga', name: 'harga', orderable: false},
                {data: 'jumlah', name: 'jumlah', orderable: false},
                {data: 'total', name: 'total', orderable: false},
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ]
    });


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


    $('#nama_bahan').autocomplete({
        source: function( request, response ) {
        var csrf_token = $('meta[name="csrf-token"]').attr("content");
        $.ajax({
            url : '/getbahan',
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
            $('#kode_bahan').val(names[1]);
            $('#satuan').val(names[3]);
        }               
    });

    function kalkulasi(jumlah){
        harga = $('#harga').val();

        if(harga == 0){
            alert('Harga Masih Kosong');
            $('#harga').focus();
            $('#jumlah').val('');
            return false;
        }

        
        total = jumlah * harga;
        $('#total').val(total);
    }

    function tambahkan_bahan(){

        if ($('#nama_bahan').val() == '') {
            $('#isi-alert').append('<div class="alert alert-danger alert-dismissible"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> <p><i class="icon fa fa-ban"></i>Inputan Masih Kosong</p> </div>');
            $('#nama_bahan').focus();
            return false;
        }


        var csrf_token = $('meta[name="csrf-token"]').attr("content");
        var nama = $('#nama_bahan').val();
        var kode = $('#kode_bahan').val();
        var satuan = $('#satuan').val();
        var harga = $('#harga').val();
        var jumlah = $('#jumlah').val();
        var total = $('#total').val();

        var isi = {_token : csrf_token, nama : nama, kode : kode, satuan : satuan, harga : harga, jumlah : jumlah, total : total };

        $.ajax({
            url : '/tambahkan-bahan',
            data : isi,
            type : 'POST',
            success : function(result){
                clear();
            }
        });


    }

    function hapus_bahan(id) {
        var csrf_token = $('meta[name="csrf-token"]').attr("content");
        $.ajax({
            url: "{{ url('hapus-temp-bahan') }}",
            data: {id: id, _token: csrf_token },
            type: "POST",
            success: function(respon){
                console.log(respon);
                clear();
            }
        });
    }



    function clear(){
        $('#nama_bahan').val('');
        $('#kode_bahan').val('');
        $('#satuan').val('');
        $('#harga').val('');
        $('#jumlah').val('');
        $('#total').val('');
        $('#table-bahan').DataTable().ajax.reload();
    }

    
</script>
@endsection