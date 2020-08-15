@extends('admin.template.master')

@section('title', 'Blog')
    
@section('content')

<div class="col-md-12">

    <a href="{{route('blog.create')}}" class="btn btn-danger mb-3"><i class="fe fe-plus"></i> &nbsp; Tambah Blog</a>

    @if ($message = Session::get('msg'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


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
                            <th>Image</th>
                            <th>Judul Blog</th>
                            <th>Kategori</th>
                            <th>Konten</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Keterangan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($blog as $a)
                    
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td width="15%"> <a href="/berkas/blog/{{$a->image}}" target="_blank"><img src="{{asset('berkas/blog/'.$a->image)}}" class="make_bigger" width="100px" height="100px" alt=""></a></td>
                            <td>{{$a->judul}}</td>
                            <td>{{$a->kategori}}</td>
                            <td> {!! $a->content !!} </td>
                            <td class="text-center">
                                @if($a->isactive == '1')
                                    <button type="button" class="btn btn-success btn-sm" onclick="inactive({{$a->id}})"> <i class="fa fa-check"></i></button>
                                @elseif($a->isactive == '0')
                                    <button class="btn btn-danger btn-sm" onclick="active({{$a->id}})"> <i class="fa fa-times"></i></button>
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
                            <td>
                                <a href="{{route('blog.edit',$a->id)}}" class="btn btn-success"><i class="fe fe-pencil"></i></a>
                                <button class="btn btn-danger" onclick="hapus({{$a->id}})"><i class="fe fe-trash"></i></button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Delete Model -->
<form action="/admin/blog/blog" method="post">
    @method('delete');
    @csrf
    <div class="modal fade" id="delete_modal" role="dialog" style="display: none;" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="form-content p-2">
                        <h4 class="modal-title">Delete</h4>
                        <input type="hidden" name="id" id="id_delete">
                        <p class="mb-4">Are you sure want to delete?</p>
                        <button type="submit" class="btn btn-primary">Delete </button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- Delete Model -->

<!-- Active Model -->
<form action="/admin/blog/active" method="post">
    @method('put');
    @csrf
    <div class="modal fade" id="active_modal" role="dialog" style="display: none;" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="form-content p-2 text-center">
                        <h4 class="modal-title">Appoved</h4>
                        <input type="hidden" name="id" id="id_active">
                        <p class="mb-4">Are you sure want to activated this blog?</p>
                        <button type="submit" class="btn btn-primary">Approved </button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- Active Model -->

<!-- Active Model -->
<form action="/admin/blog/inactive" method="post">
    @method('put');
    @csrf
    <div class="modal fade" id="inactive_modal" role="dialog" style="display: none;" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="form-content p-2 text-center">
                        <h4 class="modal-title">Inactive</h4>
                        <input type="hidden" name="id" id="id_inactive">
                        <p class="mb-4">Are you sure want to inactive this blog?</p>
                        <button type="submit" class="btn btn-primary">Inactive </button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- Active Model -->


@endsection

@section('js')

<script>
    function hapus(id){
        $('#id_delete').val(id);
        $('#delete_modal').modal('show');
    }

    function active(id){
        $('#id_active').val(id);
        $('#active_modal').modal('show');
    }

    function inactive(id){
        $('#id_inactive').val(id);
        $('#inactive_modal').modal('show');
    }
</script>

@endsection