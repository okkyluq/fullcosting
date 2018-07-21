@if (session('alert'))
<div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <p><i class="icon fa fa-ban"></i> {{ session('alert') }}</p>
</div>
@endif