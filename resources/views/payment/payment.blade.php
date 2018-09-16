@include('layouts.header')
<section class="pages-header">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-header-inner">
                    <div class="page-header-content">
                        <h1>Payment</h1>
                        
                    </div>
                </div>
            </div><!-- Ends: .col -->
        </div>
    </div>
</section><!-- Ends: .pages-container -->
<div class="row">
        <div class="col-75">
          <div class="container">
            <form action="{{url('/dashboard/payment')}}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="row">
                <div class="col-50">
                  <br>
                  <h3>Detail Pelanggan</h3><br>
                  @php
                use App\User;
                $user2 = User::where('id','=',Session::get('id'))
                        ->first();
                    
                @endphp
                  <label for="fname"><i class="fa fa-user"></i> Nama</label>
                  <input type="text" name="email" class="form-control" readonly value="{{$user->name}}">
                  <label for="email"><i class="fa fa-envelope"></i> Email</label>
                  <input type="text" name="email" class="form-control" readonly value="{{$user->email}}">
                  <label for="adr"><i class="fa fa-address-card-o"></i> Phone</label>
                  <input type="text" name="email" class="form-control" readonly value="{{$user->phone}}">
                  <label for="paket"><i class="fa"></i> Jenis Paket</label>
                  <select required name="paket" id="paket" class="form-control">
                      <option value="">===Pilih Paket Berlangganan===</option>
                    @foreach ($paket as $paket)
                    <option value="{{$paket->id}}">{{$paket->nama_paket}} - Rp.{{number_format($paket->harga_paket,0,",",".")}}/{{$paket->per}}</option>   
                    @endforeach
                  </select>
                  <br>
                <div class="panel-headding">
                  <h3>Metode Pembayaran</h3>
                                 
                  <br>
                  <label for="bank"><i class="fa"></i>Transfer Bank</label>
                  @php
                  $paymethodez = DB::table('t_payMethode')
                                    ->orderBy('id','ASC')
                                    ->get();   
                  @endphp
                  @foreach ($paymethodez as $paymethodez)
                  <input type="radio" style="margin-bottom:10px;" onclick="javascript:yesnoCheck();" name="bank" value="{{$paymethodez->id}}" id="{{$paymethodez->id}}">{{$paymethodez->provider}} No.rek {{$paymethodez->no_rek}} {{$paymethodez->nama_rek}}<br>
                  @endforeach
                  
                  {{--  <select name="bank" id="bank" class="form-control">
                      @foreach ($paymethode as $paymethode)
                      <option value="{{$paymethode->id}}">{{$paymethode->provider}}</option>   
                      @endforeach
                  </select>  --}}
      
                 
                </div>
      
              </div>
              
              <input type="submit" value="Continue to checkout" class="btn">
            </form>
          </div>
        </div>
      
        
      </div> 
        
    </div>
    <script type="text/javascript">

      function yesnoCheck() {
          if (document.getElementById('1').checked) {
              document.getElementById('ifYes').style.display = 'block';
          }
          else document.getElementById('ifYes').style.display = 'none';
      
      }
      
      </script>
  @include('layouts.footer')