@extends('siswa.template.master')

@section('content')
<div class="row">
    <div class="col-md-7 col-lg-8">
        <div class="card">
            <div class="card-body">
            
                <!-- Checkout Form -->
                <form action="booking-success.html">

                    <!-- Personal Information -->
                    <div class="info-widget">
                        <h4 class="card-title">Jadwal</h4>
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group card-label">
                                    <label>Jumlah Pertemuan</label>
                                    <input class="form-control" type="text" id="jumlah_pertemuan">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12" style="margin-top:20px">
                                <button class="btn btn-info btn-sm" id="btn-submit">Submit Jadwal</button>
                            </div>
                            <hr>
                        </div>
                        <div class="row" id="append-pertemuan"></div>
                    </div>
                    <!-- /Personal Information -->
                
                    <!-- Personal Information -->
                    <div class="info-widget">
                        <h4 class="card-title">Personal Information</h4>
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group card-label">
                                    <label>First Name</label>
                                    <input class="form-control" type="text">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group card-label">
                                    <label>Last Name</label>
                                    <input class="form-control" type="text">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group card-label">
                                    <label>Email</label>
                                    <input class="form-control" type="email">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group card-label">
                                    <label>Phone</label>
                                    <input class="form-control" type="text">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Personal Information -->
                    
                    <div class="payment-widget">
                        <h4 class="card-title">Payment Method</h4>
                        
                        <!-- Credit Card Payment -->
                        <div class="payment-list">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group card-label">
                                        <label for="card_name">Bank</label>
                                        <input class="form-control" id="card_name" value="BANK MANDIRI" type="text">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group card-label">
                                        <label for="card_number">No Rekening</label>
                                        <input class="form-control" id="card_number" value="1234567889" type="text">
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group card-label">
                                        <label for="card_number">Atas Nama</label>
                                        <input class="form-control" id="card_number" value="PT. CARI GURU Tbk" type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group card-label">
                                        <label for="card_name">Bank</label>
                                        <input class="form-control" id="card_name" value="BANK BNI" type="text">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group card-label">
                                        <label for="card_number">No Rekening</label>
                                        <input class="form-control" id="card_number" value="1234567889" type="text">
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group card-label">
                                        <label for="card_number">Atas Nama</label>
                                        <input class="form-control" id="card_number" value="PT. CARI GURU Tbk" type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group card-label">
                                        <label for="card_name">Bank</label>
                                        <input class="form-control" id="card_name" value="BANK BRI" type="text">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group card-label">
                                        <label for="card_number">No Rekening</label>
                                        <input class="form-control" id="card_number" value="1234567889" type="text">
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group card-label">
                                        <label for="card_number">Atas Nama</label>
                                        <input class="form-control" id="card_number" value="PT. CARI GURU Tbk" type="text">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Credit Card Payment -->
                        
                        <!-- Terms Accept -->
                        <div class="terms-accept">
                            <div class="custom-checkbox">
                               <input type="checkbox" id="terms_accept">
                               <label for="terms_accept">I have read and accepted <a href="#">Terms &amp; Conditions</a></label>
                            </div>
                        </div>
                        <!-- /Terms Accept -->
                        
                        <!-- Submit Section -->
                        <div class="submit-section mt-4">
                            <button type="submit" class="btn btn-primary submit-btn">Confirm and Pay Later</button>
                        </div>
                        <!-- /Submit Section -->
                        
                    </div>
                </form>
                <!-- /Checkout Form -->
                
            </div>
        </div>
        
    </div>
    
    <div class="col-md-5 col-lg-4 theiaStickySidebar">
    
        <!-- Booking Summary -->
        <div class="card booking-card">
            <div class="card-header">
                <h4 class="card-title">Booking Summary</h4>
            </div>
            <div class="card-body">
            
                <!-- Booking Mentee Info -->
                <div class="booking-user-info">
                    <a href="payment-mentee.html" class="booking-user-img">
                        <img src="{{asset('/template/mentoring/html/assets/img/guru.png')}}" alt="User Image">
                    </a>
                    <div class="booking-info">
                        <h4><a href="payment-mentee.html">Darren Elder</a></h4>
                        <div class="rating">
                            <i class="fas fa-star filled"></i>
                            <i class="fas fa-star filled"></i>
                            <i class="fas fa-star filled"></i>
                            <i class="fas fa-star filled"></i>
                            <i class="fas fa-star"></i>
                            <span class="d-inline-block average-rating">35</span>
                        </div>
                        <div class="mentor-details">
                            <p class="user-location"><i class="fas fa-map-marker-alt"></i> Newyork, USA</p>
                        </div>
                    </div>
                </div>
                <!-- Booking Mentee Info -->
                
                <div class="booking-summary">
                    <div class="booking-item-wrap">
                        <ul class="booking-date">
                            <li>Jenjang <span>SMP</span></li>
                            <li>Kurikulum <span>NASIONAL</span></li>
                            <li>Mata Pelajaran <span>MATEMATIKA SMP</span></li>
                        </ul>
                        <hr>
                        <ul class="booking-fee">
                            <li>Jumlah Pertemuan<span id="total_pertemuan">Unidentified</span></li>
                            <li>Harga Per Pertemuan <span>Rp.100.000</span></li>
                            <li>Kode Promo <input type="text" class="form-control" id="promo"><span><button class="btn btn-danger btn-sm mt-2" style="background-color: #E51856" id="btn-promo" disabled>Gunakan</button></span><small id="keterangan_diskon"></small></li>
                        </ul>
                        <br>
                        <div class="booking-total">
                            <ul class="booking-total-list">
                                <li>
                                    <span>Total</span>
                                    <span class="total-cost" id="total_harga">Unidentified</span>
                                    <input type="hidden" id="total_harga_hidden">
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Booking Summary -->
        
    </div>
</div>
@endsection

@section('js')
    <script>
        $('#btn-submit').click(function(e){
            e.preventDefault();
            var pertemuan = $('#jumlah_pertemuan').val();
            document.getElementById("btn-promo").disabled = false;
            $('#append-pertemuan').empty();
            $('#total_pertemuan').html(pertemuan + ' Pertemuan');
            $('#total_harga').html('Rp.' + rubah(pertemuan * 100000));
            $('#total_harga_hidden').val(pertemuan * 100000);
            for(i = 1; i <= pertemuan; i ++){
                $('#append-pertemuan').append(`
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group card-label">
                            <label>Tanggal Pertemuan `+i+`</label>
                            <input class="form-control" type="text" id="jumlah_pertemuan">
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12">
                        <div class="form-group card-label">
                            <label>Waktu Mulai `+i+`</label>
                            <input class="form-control" type="text" id="jumlah_pertemuan">
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12">
                        <div class="form-group card-label">
                            <label>Waktu Selesai `+i+`</label>
                            <input class="form-control" type="text" id="jumlah_pertemuan">
                        </div>
                    </div>
                `);
            }
        })

        $('#btn-promo').click(function(){
            var promo = $('#promo').val();
            var total_harga = $('#total_harga_hidden').val();
            $.ajax({
                url: '/siswa/checkout/promo/' + promo,
                type: "GET",
                dataType: 'JSON',
                success: function( data, textStatus, jQxhr ){
                    console.log(data.promo)
                    if (data.promo == 'Kosong'){
                        $('#keterangan_diskon').html('Kode tidak valid');
                        $('#total_harga').html('Rp.' + rubah(total_harga));
                    }else{
                        $('#keterangan_diskon').html('Kode valid');
                        $('#total_harga').html('Rp.' + rubah(data.promo / 100 * total_harga - total_harga));
                    }
                },
                error: function( jqXhr, textStatus, errorThrown ){
                    console.log( errorThrown );
                    console.warn(jqXhr.responseText);
                },
            })
        });

        function rubah(angka){
            var reverse = angka.toString().split('').reverse().join(''),
            ribuan = reverse.match(/\d{1,3}/g);
            ribuan = ribuan.join('.').split('').reverse().join('');
            return ribuan;
        }
    </script>
@endsection