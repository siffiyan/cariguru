@extends('admin.template.master')

@section('title', 'Blog')
    
@section('content')

<div class="col-md-12">

    <a href="/admin/blog/add" class="btn btn-danger mb-3"><i class="fe fe-plus"></i> &nbsp; Tambah Blog</a>

    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Data Blog</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="datatable table table-stripped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul Blog</th>
                            <th>Konten</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($blog as $a)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$a->judul}}</td>
                            <td>{{$a->content}}</td>
                            <td class="text-center">
                                @if($a->isactive == '1')
                                    <button class="btn btn-success btn-sm"> <i class="fa fa-check"></i></button>
                                @elseif($a->isactive == '0')
                                    <button class="btn btn-danger btn-sm"> <i class="fa fa-times"></i></button>
                                @endif
                            </td>
                            <td class="text-center">
                                @if($a->status == 'pending')
                                    <a class="badge badge-pill bg-warning inv-badge text-white" style="cursor:pointer">pending</a>
                                    @elseif($a->status == 'approve')
                                    <a class="badge badge-pill bg-success inv-badge text-white" style="cursor:pointer">approve</a>
                                    @else
                                    <a class="badge badge-pill bg-danger inv-badge text-white" style="cursor:pointer">reject</a>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')

@endsection