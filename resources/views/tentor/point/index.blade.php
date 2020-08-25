@extends('tentor.template.master')

@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h5>History Point</h5>
            <h6 style="float:right">My Point @if($total_point->total_poin > 0){{$total_point->total_poin}} @else 0 @endif </h6>
        </div>
        <div class="card-body">
            @if(($point->count()>0))

            <table class="datatable table table-stripped" id="table">
                <thead>
                <tr>
                <th>No</th>
                <th>Point</th>
                <th>Keterangan</th>
                <th>Status</th>
                </tr>
                </thead>
                <tbody>
                @foreach($point as $r)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$r->poin}}</td>
                    <td>{{$r->keterangan}}</td>
                    <td>
                        <span class="badge badge-success">validate</span>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>

            @else
            <div style="border:2px dashed black;padding: 25px;text-align: center;">
                Anda belum memiliki Point segera dapatkan point anda!
            </div>

            @endif
        </div>
    </div>
</div>
@endsection

@section('js')
    <script>
        $('#table').dataTable();
    </script>    
@endsection