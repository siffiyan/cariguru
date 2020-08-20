@extends('tentor.template.master')

@section('content')

<div class="col-md-12">

@if ($message = Session::get('msg'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>    
    <strong>{{ $message }}</strong>
</div>
@endif

<div class="card">
<div class="card-body">

<!-- Profile Settings Form -->
<form action="/tentor/profil" method="post">
@csrf
@method('PUT')
<div class="row form-row">

<div class="col-12 col-md-4">
<div class="form-group">
<label>Nama Lengkap</label>
<input type="text" class="form-control" name="nama" value="{{$user->nama}}">
</div>
</div>
<div class="col-12 col-md-4">
<div class="form-group">
<label>Email</label>
<input type="email" class="form-control" name="email"  value="{{$user->email}}">
</div>
</div>
<div class="col-12 col-md-4">
<div class="form-group">
<label>No Handphone</label>
<input type="text" class="form-control" name="no_hp"  value="{{$user->no_hp}}">
</div>
</div>
<div class="col-12 col-md-6">
<div class="form-group">
<label>Tempat Lahir</label>
<input type="text" class="form-control" name="tempat_lahir"  value="{{$user->tempat_lahir}}">
</div>
</div>
<div class="col-12 col-md-6">
<div class="form-group">
<label>Tanggal Lahir</label>
<div class="cal-icon">
<input type="text" class="form-control datetimepicker" name="tanggal_lahir"  value="{{$user->tanggal_lahir}}">
</div>
</div>
</div>
<div class="col-12 col-md-3">
<div class="form-group">
<label>Provinsi</label>
<select class="form-control select">

</select>
</div>
</div>
<div class="col-12 col-md-3">
<div class="form-group">
<label>Kota/Kab</label>
<select class="form-control select">

</select>
</div>
</div>
<div class="col-12 col-md-3">
<div class="form-group">
<label>Kecamatan</label>
<select class="form-control select">

</select>
</div>
</div>
<div class="col-12 col-md-3">
<div class="form-group">
<label>Kelurahan</label>
<select class="form-control select">

</select>
</div>
</div>

<div class="col-12 col-md-4">
<div class="form-group">
<label>Pendidikan Terakhir</label>
<select class="form-control select" name="pendidikan_terakhir">
@foreach($pendidikan as $r)
@if($r == $user->pendidikan_terakhir)
<option value="{{$r}}" selected="">{{$r}}</option>
@else
<option value="{{$r}}">{{$r}}</option>
@endif
@endforeach
</select>
</div>
</div>

<div class="col-12 col-md-4">
<div class="form-group">
<label>Nama Institusi/Kampus</label>
<input type="text" class="form-control" name="nama_institusi"  value="{{$user->nama_institusi}}">
</div>
</div>

<div class="col-12 col-md-4">
<div class="form-group">
<label>Prodi</label>
<input type="text" class="form-control" name="prodi" value="{{$user->prodi}}">
</div>
</div>

</div>
<div class="submit-section" style="float: right;">
<button type="submit" class="btn btn-primary">Save Changes</button>
</div>
</form>
<!-- /Profile Settings Form -->

</div>
</div>
</div>

<div class="col-md-12">
<div class="card">
<div class="card-body">
<a class="edit-link" href="#" id="button_tambah_pengalaman_mengajar"><i class="fa fa-plus-circle"></i> Tambah Pengalaman Mengajar</a>
<p></p>
@if($pengalaman->count()>0)
<div class="table-responsive">
<table class="datatable table table-stripped">
<thead>
<tr>
<th>No</th>
<th>Nama Institusi/Sekolah</th>
<th>Tahun Awal Mengajar</th>
<th>Tahun Akhir Mengajar</th>
<th>Aksi</th>
</tr>
</thead>
<tbody>
@foreach($pengalaman as $r)
<tr>
	<td>{{$loop->iteration}}</td>
	<td>{{$r->nama_sekolah}}</td>
	<td>{{$r->tahun_awal}}</td>
	<td>{{$r->tahun_akhir}}</td>
	<td>
	<button class="btn btn-success" onclick="edit_pengalaman({{$r->id}})"><i class="fe fe-pencil"></i></button>
    <button class="btn btn-danger" onclick="hapus_pengalman({{$r->id}})"><i class="fe fe-trash"></i></button>
	</td>
</tr>
@endforeach
</tbody>
</table>
</div>
@else
<div style="border:2px dashed black;padding: 25px;text-align: center;">
	Anda belum memiliki pengalaman mengajar
</div>
@endif
</div>
</div>
</div>

<div class="col-md-12">
<div class="card">
<div class="card-body">
<a class="edit-link" href="#" id="button_tambah_prestasi"><i class="fa fa-plus-circle"></i> Tambah Prestasi</a>
<p></p>
@if($prestasi->count()>0)
<div class="table-responsive">
<table class="datatable table table-stripped">
<thead>
<tr>
<th>No</th>
<th>Keterangan Prestasi</th>
<th>Tahun</th>
<th>Aksi</th>
</tr>
</thead>
<tbody>
@foreach($prestasi as $r)
<tr>
	<td>{{$loop->iteration}}</td>
	<td>{{$r->keterangan_prestasi}}</td>
	<td>{{$r->tahun}}</td>
	<td>
	<button class="btn btn-success" onclick="edit_prestasi({{$r->id}})"><i class="fe fe-pencil"></i></button>
    <button class="btn btn-danger" onclick="hapus_prestasi({{$r->id}})"><i class="fe fe-trash"></i></button>
	</td>
</tr>
@endforeach
</tbody>
</table>
</div>
@else
<div style="border:2px dashed black;padding: 25px;text-align: center;">
	Anda belum memiliki prestasi
</div>
@endif
</div>
</div>
</div>

<div class="col-md-12">
<div class="card">
<div class="card-body">
<a class="edit-link" href="#" id="button_tambah_pilihan_mengajar"><i class="fa fa-plus-circle"></i> Tambah Pilihan Mengajar</a>
<p></p>
@if($pilihan_mengajar->count()>0)
<div class="table-responsive">
<table class="datatable table table-stripped">
<thead>
<tr>
<th>No</th>
<th>Jenjang</th>
<th>Kurikulum</th>
<th>Mata Pelajaran</th>
<th>Aksi</th>
</tr>
</thead>
<tbody>
@foreach($pilihan_mengajar as $r)
<tr>
	<td>{{$loop->iteration}}</td>
	<td>{{$r->jenjang}}</td>
	<td>{{$r->kurikulum}}</td>
	<td>{{$r->mata_pelajaran}}</td>
	<td>
	<button class="btn btn-success" onclick="edit_prestasi({{$r->id}})"><i class="fe fe-pencil"></i></button>
    <button class="btn btn-danger" onclick="hapus_prestasi({{$r->id}})"><i class="fe fe-trash"></i></button>
	</td>
</tr>
@endforeach
</tbody>
</table>
</div>
@else
<div style="border:2px dashed black;padding: 25px;text-align: center;">
	Anda belum mengisi pilihan mengajar
</div>
@endif
</div>
</div>
</div>

@endsection

@section('js')

<script type="text/javascript">

$('#button_tambah_pengalaman_mengajar').click(function(e){
	e.preventDefault();
	$('#modal_tambah_pengalaman_mengajar').modal('show');
})

$('#button_tambah_prestasi').click(function(e){
	e.preventDefault();
	$('#modal_tambah_prestasi').modal('show');
})

$('#button_tambah_pilihan_mengajar').click(function(e){
	e.preventDefault();
	$('#modal_tambah_pilihan_mengajar').modal('show');
})
	
</script>

@endsection

<!--  Modal Tambah Pengalaman mengajar -->
<div class="modal fade custom-modal" id="modal_tambah_pengalaman_mengajar">
<div class="modal-dialog modal-dialog-centered">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title">Form Tambah Pengalaman Mengajar</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
<form action="/tentor/profil/pengalaman_mengajar_mitra" method="post">
@csrf

<div class="row">

<div class="col-12 col-md-12">
<div class="form-group">
<label>Nama Institusi/Sekolah</label>
<input type="text" class="form-control" name="nama_sekolah" required>
</div>
</div>

<div class="col-12 col-md-6">
<div class="form-group">
<label>Tahun Awal Mengajar</label>
<select class="form-control select" name="tahun_awal">
@foreach($tahun_awal as $r)
<option value="{{$r}}">{{$r}}</option>
@endforeach
</select>
</div>
</div>


<div class="col-12 col-md-6">
<div class="form-group">
<label>Tahun Akhir Mengajar</label>
<select class="form-control select" name="tahun_akhir">
@foreach($tahun_akhir as $r)
<option value="{{$r}}">{{$r}}</option>
@endforeach
</select>
</div>
</div>

</div>

<div  style="float: right;">
	<button class="btn btn-primary">Submit</button>
</div>

</form>
</div>
</div>
</div>
</div>
<!-- Modal Tambah Pengalaman mengajar -->

<!--  Modal Tambah Prestasi -->
<div class="modal fade custom-modal" id="modal_tambah_prestasi">
<div class="modal-dialog modal-dialog-centered">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title">Form Tambah Pengalaman Mengajar</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
<form action="/tentor/prestasi_mitra" method="post">
@csrf

<div class="row">

<div class="col-12 col-md-12">
<div class="form-group">
<label>Keterangan Prestasi</label>
<input type="text" class="form-control" name="keterangan_prestasi" required>
</div>
</div>

<div class="col-12 col-md-12">
<div class="form-group">
<label>Tahun</label>
<select class="form-control select" name="tahun">
@foreach($tahun_awal as $r)
<option value="{{$r}}">{{$r}}</option>
@endforeach
</select>
</div>
</div>

</div>

<div  style="float: right;">
	<button class="btn btn-primary">Submit</button>
</div>

</form>
</div>
</div>
</div>
</div>
<!-- Modal Tambah Prestasi -->

<!--  Modal Tambah Pilihan Mengajar -->
<div class="modal fade custom-modal" id="modal_tambah_pilihan_mengajar">
<div class="modal-dialog modal-dialog-centered">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title">Form Tambah Pengalaman Mengajar</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
<form action="/tentor/pilihan_mengajar_mitra" method="post">
@csrf

<div class="row">

<div class="col-12 col-md-6">
<div class="form-group">
<label>Jenjang</label>
<select class="form-control select" name="jenjang_id">
@foreach($jenjang as $r)
<option value="{{$r->id}}">{{$r->jenjang}}</option>
@endforeach
</select>
</div>
</div>

<div class="col-12 col-md-6">
<div class="form-group">
<label>Kurikulum</label>
<select class="form-control select" name="kurikulum_id">
@foreach($kurikulum as $r)
<option value="{{$r->id}}">{{$r->kurikulum}}</option>
@endforeach
</select>
</div>
</div>

<div class="col-12 col-md-12">
<div class="form-group">
<label>Mata Pelajaran</label>
<select class="form-control select" name="mapel_id">
@foreach($mapel as $r)
<option value="{{$r->id}}">{{$r->mata_pelajaran}}</option>
@endforeach
</select>
</div>
</div>

</div>

<div  style="float: right;">
	<button class="btn btn-primary">Submit</button>
</div>

</form>
</div>
</div>
</div>
</div>
<!--  Modal Tambah Pilihan Mengajar -->