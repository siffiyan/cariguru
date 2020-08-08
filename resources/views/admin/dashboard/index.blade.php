@extends('admin.template.master')

@section('title','Dashboard')

@section('content')

<div class="col-xl-3 col-sm-6 col-12">
<div class="card">
<div class="card-body">
<div class="dash-widget-header">
<span class="dash-widget-icon text-primary border-primary">
<i class="fe fe-users"></i>
</span>
<div class="dash-count">
<h3>168</h3>
</div>
</div>
<div class="dash-widget-info">
<h6 class="text-muted">Admin</h6>
<div class="progress progress-sm">
<div class="progress-bar bg-primary w-50"></div>
</div>
</div>
</div>
</div>
</div>

<div class="col-xl-3 col-sm-6 col-12">
<div class="card">
<div class="card-body">
<div class="dash-widget-header">
<span class="dash-widget-icon text-success">
<i class="fe fe-credit-card"></i>
</span>
<div class="dash-count">
<h3>487</h3>
</div>
</div>
<div class="dash-widget-info">

<h6 class="text-muted">Siswa</h6>
<div class="progress progress-sm">
<div class="progress-bar bg-success w-50"></div>
</div>
</div>
</div>
</div>
</div>

<div class="col-xl-3 col-sm-6 col-12">
<div class="card">
<div class="card-body">
<div class="dash-widget-header">
<span class="dash-widget-icon text-danger border-danger">
<i class="fe fe-star-o"></i>
</span>
<div class="dash-count">
<h3>485</h3>
</div>
</div>
<div class="dash-widget-info">

<h6 class="text-muted">Tentor</h6>
<div class="progress progress-sm">
<div class="progress-bar bg-danger w-50"></div>
</div>
</div>
</div>
</div>
</div>

<div class="col-xl-3 col-sm-6 col-12">
<div class="card">
<div class="card-body">
<div class="dash-widget-header">
<span class="dash-widget-icon text-warning border-warning">
<i class="fe fe-folder"></i>
</span>
<div class="dash-count">
<h3>$62523</h3>
</div>
</div>
<div class="dash-widget-info">

<h6 class="text-muted">Transaksi</h6>
<div class="progress progress-sm">
<div class="progress-bar bg-warning w-50"></div>
</div>
</div>
</div>
</div>
</div>
</div>				

@endsection