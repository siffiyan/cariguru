@extends('siswa.template.master')

@section('content')

<!-- Breadcrumb -->
<div class="breadcrumb-bar">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-8 col-12">
                <nav aria-label="breadcrumb" class="page-breadcrumb">
                    {{-- <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Search</li>
                    </ol> --}}
                </nav>
                {{-- <h2 class="breadcrumb-title">2245 matches found for : Mentors In  Florida</h2> --}}
            </div>
            <div class="col-md-4 col-12 d-md-block d-none">
                <div class="sort-by">
                    <span class="sort-title">Sort by</span>
                    <span class="sortby-fliter">
                        <select class="select">
                            <option>Select</option>
                            <option class="sorting">Rating</option>
                            <option class="sorting">Popular</option>
                            <option class="sorting">Latest</option>
                            <option class="sorting">Free</option>
                        </select>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Breadcrumb -->
<br>

<div class="row">
    <div class="col-md-12 col-lg-4 col-xl-3 theiaStickySidebar">
    
        <!-- Search Filter -->
        <div class="card search-filter">
            <div class="card-header">
                <h4 class="card-title mb-0">Pencarian Guru</h4>
            </div>
            <div class="card-body">
            <div class="filter-widget">
                <h4>Pilih Jenjang</h4>
                <select name="jenjang" id="jenjang_list" class="form-control">
                    @foreach ($jenjang as $item)
                        <option value="{{$item->id}}">{{$item->jenjang}}</option>
                    @endforeach
                    
                </select>
            </div>
            <div class="filter-widget">
                <h4>Pilih Kurikulum</h4>
                <select name="kurikulum" id="kurikulum_list" class="form-control">
                    @foreach ($kurikulum as $item)
                        <option value="{{$item->id}}">{{$item->kurikulum}}</option>
                    @endforeach
                </select>
            </div>
            <div class="filter-widget">
                <h4>Mata Pelajaran</h4>
                <select name="mapel" id="mapel_list" class="form-control">
                    <option value="" selected disabled>Pilih Mata Pelajaran</option>
                </select>		
            </div>
                <div class="btn-search">
                    <button type="button" class="btn btn-block" id="search">Search</button>
                </div>	
            </div>
        </div>
        <!-- /Search Filter -->
        
    </div>
    
    <div class="col-md-12 col-lg-8 col-xl-9">

        <!-- Mentor Widget -->
        <div id="card-guru">
            @foreach ($guru as $item)
                <div class="card">
                    <div class="card-body">
                        <div class="mentor-widget">
                            <div class="user-info-left">
                                <div class="mentor-img">
                                    <a href="profile.html">
                                        <img src="{{asset('/template/mentoring/html/assets/img/guru.png')}}" class="img-fluid" alt="User Image">
                                    </a>
                                </div>
                                <div class="user-info-cont">
                                    <h4 class="usr-name"><a href="profile.html">{{$item->nama}}</a></h4>
                                    <p class="mentor-type">Digital Marketer</p>
                                    <div class="rating">
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star"></i>
                                        <span class="d-inline-block average-rating">(17)</span>
                                    </div>
                                    <div class="mentor-details">
                                        <p class="user-location"><i class="fas fa-map-marker-alt"></i> Florida, USA</p>
                                    </div>
                                </div>
                            </div>
                            <div class="user-info-right">
                                <div class="user-infos">
                                    <ul>
                                        <li><i class="far fa-comment"></i> 17 Feedback</li>
                                        <li><i class="fas fa-map-marker-alt"></i> Florida, USA</li>
                                        <li><i class="far fa-money-bill-alt"></i> $300 - $1000 <i class="fas fa-info-circle" data-toggle="tooltip" title="Lorem Ipsum"></i> </li>
                                    </ul>
                                </div>
                                <div class="mentor-booking">
                                    <a class="apt-btn" href="/siswa/checkout/{{$item->id}}">Book Appointment</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        
        <!-- /Mentor Widget -->

        <div class="load-more text-center">
            {{-- <a class="btn btn-primary btn-sm" href="javascript:void(0);">Load More</a>	 --}}
        </div>	
    </div>
</div>
@endsection

@section('js')

    <script>
        $(document).ready(function(){
            mapel_list('1','2');
            $('#kurikulum_list').val(2);
        })

        $('#jenjang_list').change(function(){
            var jenjang = $('#jenjang_list').val();
            var kurikulum = $('#kurikulum_list').val();
            mapel_list(jenjang,kurikulum);
        });

        $('#kurikulum_list').change(function(){
            var jenjang = $('#jenjang_list').val();
            var kurikulum = $('#kurikulum_list').val();
            mapel_list(jenjang,kurikulum);
        });

        function mapel_list(jenjang,kurikulum){
            $.ajax({
                url: '/siswa/cariguru/filter/' + jenjang + '/' + kurikulum,
                type: "GET",
                dataType: 'JSON',
                success: function( data, textStatus, jQxhr ){
                    $('#mapel_list').empty();
                    $.each(data.mapel,function(i,value){
                        $('#mapel_list').append(`<option value="`+value.id+`">`+value.mata_pelajaran+`</option>`);
                    });
                },
                error: function( jqXhr, textStatus, errorThrown ){
                    console.log( errorThrown );
                    console.warn(jqXhr.responseText);
                },
            })
        }

        $('#search').click(function(){
            var jenjang = $('#jenjang_list').val();
            var kurikulum = $('#kurikulum_list').val();
            var mapel = $('#mapel_list').val();
            $.ajax({
                url: '/siswa/cariguru/action_filter/' + jenjang + '/' + kurikulum + '/' + mapel,
                type: "GET",
                dataType: 'JSON',
                success: function( data, textStatus, jQxhr ){
                    $('#card-guru').empty();
                    if (!$.trim(data.guru)){   
                            $('#card-guru').html(`
                                <div style="border:2px dashed black;padding: 25px;text-align: center;">
                                    Tidak dapat menemukan guru
                                </div>
                            `);
                        }else{
                         $.each(data.guru,function(i,value){
                            $('#card-guru').append(`
                                <div class="card">
                                    <div class="card-body">
                                        <div class="mentor-widget">
                                            <div class="user-info-left">
                                                <div class="mentor-img">
                                                    <a href="profile.html">
                                                        <img src="{{asset('/template/mentoring/html/assets/img/guru.png')}}" class="img-fluid" alt="User Image">
                                                    </a>
                                                </div>
                                                <div class="user-info-cont">
                                                    <h4 class="usr-name"><a href="profile.html">`+value.nama+`</a></h4>
                                                    <p class="mentor-type">Digital Marketer</p>
                                                    <div class="rating">
                                                        <i class="fas fa-star filled"></i>
                                                        <i class="fas fa-star filled"></i>
                                                        <i class="fas fa-star filled"></i>
                                                        <i class="fas fa-star filled"></i>
                                                        <i class="fas fa-star"></i>
                                                        <span class="d-inline-block average-rating">(17)</span>
                                                    </div>
                                                    <div class="mentor-details">
                                                        <p class="user-location"><i class="fas fa-map-marker-alt"></i> Florida, USA</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="user-info-right">
                                                <div class="user-infos">
                                                    <ul>
                                                        <li><i class="far fa-comment"></i> 17 Feedback</li>
                                                        <li><i class="fas fa-map-marker-alt"></i> Florida, USA</li>
                                                        <li><i class="far fa-money-bill-alt"></i> $300 - $1000 <i class="fas fa-info-circle" data-toggle="tooltip" title="Lorem Ipsum"></i> </li>
                                                    </ul>
                                                </div>
                                                <div class="mentor-booking">
                                                    <a class="apt-btn" href="booking.html">Book Appointment</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            `);
                       
                        });
                    }
                },
                error: function( jqXhr, textStatus, errorThrown ){
                    console.log( errorThrown );
                    console.warn(jqXhr.responseText);
                },
            })
        });

    </script>
@endsection