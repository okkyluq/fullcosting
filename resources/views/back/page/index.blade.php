@extends('layouts.back')
@section('content')
<section class="content-header">
	<h1>
		Dashboard
		<small>Control panel</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Dashboard</li>
	</ol>
</section>
<section class="content">
	<div class="row">
		<div class="col-md-3 col-sm-6 col-xs-12">
			<div class="info-box">
				<span class="info-box-icon bg-aqua"><i class="fa fa-database"></i></span>
				<div class="info-box-content">
					<span class="info-box-text">Data Bahan Baku</span>
					<span class="info-box-number">{{ $bahan->count() }}</span>
				</div>
			</div>
		</div>
		<div class="col-md-3 col-sm-6 col-xs-12">
			<div class="info-box">
				<span class="info-box-icon bg-green"><i class="fa fa-database"></i></span>
				<div class="info-box-content">
					<span class="info-box-text">Data BTKL</span>
					<span class="info-box-number">{{ $btkl->count() }}</span>
				</div>
			</div>
		</div>
		<div class="col-md-3 col-sm-6 col-xs-12">
			<div class="info-box">
				<span class="info-box-icon bg-yellow"><i class="fa fa-database"></i></span>
				<div class="info-box-content">
					<span class="info-box-text">Data BOP</span>
					<span class="info-box-number">{{ $bop->count() }}</span>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection