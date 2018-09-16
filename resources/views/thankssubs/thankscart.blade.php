@include('layouts.header')
    <!-- Page Header -->
	<section class="pages-header">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div class="page-header-inner">
						<div class="page-header-content">
							<h1>Thanks For Order</h1>
						</div>
					</div>
				</div><!-- Ends: .col -->
			</div>
		</div>
	</section><!-- Ends: .pages-header -->
        <!-- About App -->
    <section class="about-app">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="app-info" style="margin-top:106px">
						<div align="center" style="font-size:28px;color:#ed5054;text-weight:bold;height:100px">Terima Kasih</div>
						<div align="center">
						Pesanan anda sudah kami terima dan lakukan pembayaran sesuai invoice berikut :
						<div style="font-size:24px">
							@php
							$info2 = DB::table('t_order')
										->where('no_invoice','=',Session::get('no_invoice'))
										->Join('users','users.id','=','t_order.id_user')
										->Join('t_payMethode','t_payMethode.id','=','t_order.payment_methode')
										->Join('t_paket','t_paket.id','=','t_order.tipe_paket')
										->first();
							@endphp
								
							No Invoice :  {{Session::get('no_invoice')}}
                            <br>
                            Nama Paket : {{$info2->nama_paket}}
                            <br>
							Total Pembayaran : Rp.{{number_format($info2->harga_paket,0,",",".")}}
							<br>
							<br>
							Silahkan anda membayar melalui rekening berikut:
							<br>
							{{$info2->provider}}
							<br>
							No Rek : {{$info2->no_rek}}
							<br>
							Atas Nama : {{$info2->nama_rek}}
							</div>
						</div>
                    </div>
                </div><!-- Ends: .col-sm-6 -->
               
            </div>
        </div>
    </section><!-- Ends: .about-app -->

    @include('layouts.footer')
