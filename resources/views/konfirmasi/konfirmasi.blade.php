@include('layouts.header')
    <!-- Page Header -->
	<section class="pages-header">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div class="page-header-inner">
						<div class="page-header-content">
							<h1>Konfirmasi</h1>
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
                    <div class="container">
                        <div class="card-body">
                            <form method="POST"  enctype="multipart/form-data" action="{{ url('/konfirmasi') }}" aria-label="{{ __('Konfirmasi') }}">
                                @csrf
        
                                <div class="form-group row">
                                    <label for="invoice" class="col-md-4 col-form-label text-md-right">{{ __('No.Invoice') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="invoice" type="text" class="form-control" name="invoice" value="{{$info->no_invoice}}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                        <label for="nama" class="col-md-4 col-form-label text-md-right">{{ __('Nama') }}</label>
            
                                        <div class="col-md-6">
                                            <input id="nama" type="text" class="form-control" name="nama" value="{{$info->name}}">
                                        </div>
                                    </div>    
                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{$info->email}}" required>
        
                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                 <div class="form-group row">
                                    <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="phone" type="text" class="form-control" name="phone" value="{{$info->phone}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="total" class="col-md-4 col-form-label text-md-right">{{ __('Total') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="total" type="text" class="form-control" name="total" value="Rp.{{number_format($info->harga_paket,0,",",".")}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="tanggal" class="col-md-4 col-form-label text-md-right">{{ __('Tanggal Pembayaran') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="tanggal" type="text" class="form-control" name="tanggal" value="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="banktujuan" class="col-md-4 col-form-label text-md-right">{{ __('Bank Tujuan') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="banktujuan" type="text" class="form-control" name="banktujuan" value="{{$info->provider}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="bankasal" class="col-md-4 col-form-label text-md-right">{{ __('Dari Bank') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="bankasal" type="text" class="form-control" name="bankasal" value="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="namarek" class="col-md-4 col-form-label text-md-right">{{ __('Nama Rekening') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="namarek" type="text" class="form-control" name="namarek" value="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                        <label for="norek" class="col-md-4 col-form-label text-md-right">{{ __('Nomor Rekening') }}</label>
            
                                        <div class="col-md-6">
                                            <input id="norek" type="text" class="form-control" name="norek" value="">
                                        </div>
                                    </div>
                                <div class="form-group row">
                                        <label for="photo" class="col-md-4 col-form-label text-md-right">{{ __('Bukti Pembayaran') }}</label>
                                    <div class="col-md-6">
                                    
                                    <input type="file" name="photo">
                                    {{-- @if(!empty($getuser->type=='Manual')) --}}
                                    {{-- <img src=" #" style="margin-top: 1%"> --}}
                                   
                                    <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                   <br>        
                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Kirim') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div><!-- Ends: .col-sm-6 -->
               
            </div>
        </div>
    </section><!-- Ends: .about-app -->

    @include('layouts.footer')
