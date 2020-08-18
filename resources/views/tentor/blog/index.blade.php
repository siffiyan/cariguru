@extends('tentor.template.master')

@section('title', 'Blog')
    
@section('content')

<div class="row">
    <div class="col-sm-12">

        <a href="{{route('blog.create')}}" class="btn btn-danger mb-3"><i class="fa fa-plus"></i> &nbsp; Tambah Blog</a>

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
            <div class="card-body">

                <!-- Blog list -->
                <div class="row">
                    @foreach ($blog as $item)
                    <div class="col-12 col-md-6 col-xl-4">
                        <div class="course-box blog grid-blog">
                            <div class="blog-image mb-0">
                            <a href="{{route('blog.show',$item->id)}}"><img src="{{asset('berkas/blog/'.$item->image)}}" width="500px" height="250px" alt="Post Image"></a>
                            </div>
                            <div class="course-content">
                                
                                    @if($item->status == 'pending')
                                        <span class="badge badge-warning text-white">pending</span>    
                                    @elseif($item->status == 'approve')
                                        <span class="badge badge-success">approved</span>
                                    @else
                                        <span class="badge badge-danger">reject</span>
                                    @endif
                               
                                <span class="date">{{date('d F Y', strtotime($item->created_at))}}</span>
                                <span class="course-title">{{$item->judul}}</span>
                                {!! substr($item->content, 0, 50) . '...' !!}
                                <div class="row">
                                    <div class="col">
                                        <a href="{{route('blog.edit',$item->id)}}" class="text-success">
                                            <i class="fa fa-edit"></i> Edit
                                        </a>
                                    </div>
                                    <div class="col text-right">
                                        <a onclick="hapus({{$item->id}})" style="cursor: pointer" class="text-danger">
                                            <i class="fa fa-trash"></i> Delete
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <!-- /Blog list -->

            </div>
        </div>
    </div>			
</div>

<!-- Delete Model -->
<form action="/tentor/blog/delete" method="post">
    @method('delete')
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

@endsection

@section('js')
    
    <script>
        function hapus(id){
            $('#id_delete').val(id);
            $('#delete_modal').modal('show');
        }
    </script>

@endsection