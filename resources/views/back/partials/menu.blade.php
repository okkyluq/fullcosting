<li class="header">MAIN NAVIGATION</li>
<li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
<li><a href="{{ url('produksi') }}"><i class="fa fa-database"></i> <span>Data Produksi</span></a></li>
<li><a href="{{ url('transaksi-bahan') }}"><i class="fa fa-database"></i> <span>Transaksi Bahan Baku</span></a></li>
<li><a href="{{ url('transaksi-btkl') }}"><i class="fa fa-database"></i> <span>Transaksi BTKL</span></a></li>
<li><a href="{{ url('transaksi-bop') }}"><i class="fa fa-database"></i> <span>Transaksi BOP</span></a></li>
<li><a href="{{ url('fc') }}"><i class="	fa fa-bar-chart"></i> <span>Full Costing & Sell Price</span></a></li>
<li class="treeview">
	<a href="#">
		<i class="fa fa-table"></i> <span>Data Master</span>
		<span class="pull-right-container">
			<i class="fa fa-angle-left pull-right"></i>
		</span>
	</a>
	<ul class="treeview-menu">
		<li><a href="{{ url('bahan') }}"><i class="fa fa-circle-o"></i> Data Bahan Baku</a></li>
		<li><a href="{{ url('btkl') }}"><i class="fa fa-circle-o"></i> Data BTKL</a></li>
		<li><a href="{{ url('bop') }}"><i class="fa fa-circle-o"></i> Data BOP</a></li>
	</ul>
</li>
<li>
	<a href="{{ route('logout') }}"
        onclick="event.preventDefault();
                 document.getElementById('logout-form').submit();">
        <i class="fa fa-power-off"></i> <span>Logout</span>
    </a>
	<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
		{{ csrf_field() }}
	</form>
</li>
 