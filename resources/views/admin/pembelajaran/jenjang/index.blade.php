@extends('admin.template.master')

@section('title','Jenjang')

@section('content')

<div class="col-md-12">
    <button id="button_tambah_jenjang" class="btn btn-danger mb-3"><i class="fe fe-plus"></i> &nbsp; Tambah Jenjang</button>
    
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Data Jenjang</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="datatable table table-stripped">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Jenjang</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($jenjang as $a)
                        <tr>
                            <td class="text-center">{{$loop->iteration}}</td>
                            <td class="text-center">{{$a->jenjang}}</td>
                            <td class="text-center">
                                <button class="btn btn-success" id="button_edit_jenjang"><i class="fe fe-pencil"></i></button>
                                <button class="btn btn-danger" id="button_delete_jenjang"><i class="fe fe-trash"></i></button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="add_jenjang" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Tambah Data Jenjang</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-12 col-sm-12">
                    <div class="form-group">
                        <label>Tambah Jenjang</label>
                        <input type="text" class="form-control" name="nama" required>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary">Save changes</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
</div>

<div class="modal" id="edit_jenjang" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit Data Jenjang</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-12 col-sm-12">
                    <div class="form-group">
                        <label>Edit Jenjang</label>
                        <input type="text" class="form-control" name="nama" required>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary">Save changes</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
</div>

<!-- Delete Model -->
<form action="" method="post">
    <input type="hidden" name="_method" value="delete">
    {{csrf_field()}}
    <div class="modal fade" id="delete_modal" role="dialog" style="display: none;" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="form-content p-2">
                        <h4 class="modal-title">Delete</h4>
                        <input type="hidden" name="id" id="id">
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


@endsection

@section('js')

<script type="text/javascript">
    $('#button_tambah_jenjang').click(function(){
        $('#add_jenjang').modal('show');
    })

    $('#button_edit_jenjang').click(function(){
        $('#edit_jenjang').modal('show');
    })

    $('#button_delete_jenjang').click(function(){
        $('#delete_modal').modal('show');
    })

</script>

@endsection