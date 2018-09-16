
@include('layouts.header')
<section class="pages-header">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-header-inner">
                    <div class="page-header-content">
                        <h1>Dashboard</h1>
                        <ul class="list-unstyled">
                            
                            @php
                            $user = DB::table('users')
                                ->where('id','=',Session::get('id'))
                                ->first();
                            @endphp
                        <p><font color="white"><strong>{{$user->name}}</strong></font></p><br>
                            @if (!empty(Session::get('image')))
                        <center><img src="{{$user->image}}" height="100" width="100"></center><br>
                        @else
                        <center><img src="{{$images}}default.png" height="100" width="100"></center><br>
                        @endif
                        <center><a href="#modalEdit" class="btn btn-primary" data-toggle="modal">
                                <i class="fa fa-cog fa-fw"></i> Edit Profile </a></center>
                        </ul>
                    </div>
                </div>
            </div><!-- Ends: .col -->
        </div>
    </div>
</section><!-- Ends: .pages-container -->

<!-- Blog Content -->
<section class="blog-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-sm-9">
                <div class="post-details">
                    <div class="post-thumb">
                        <div class="col-sm-12 section-header">
                            <h2>Edisi EPAPER</h2>
                        </div>
                        @foreach ($epaper as $epaper)
                   
               @php
                $path = date('Y/m/d/', strtotime($epaper->postdate));
                @endphp
                <div class="col-md-3 col-sm-6 mb-3">
                    <div class="service-box wow fadeIn" data-wow-delay="0.1s">

                            @if (!Session::get('id'))
                            <div><a href="{{$url."highlight/".$epaper->epaper_id}}">
                                @if (!empty($epaper->image))
                                    @php
                                    $mystring = $epaper->image;
                                    $findme = 'http';
                                    $pos = strpos($mystring,$findme);
                                    @endphp
                                    @if($pos === false)
                                    <img src="{{$urlimg.$path.$epaper->image}}" alt="" class="img-responsive"></div>
                                    @else
                                    <img src="{{$epaper->image}}" alt="" class="img-responsive"></div>
                                    @endif
                                @else
                                <img src="{{$urlimg.$path.$epaper->image}}" alt="" class="img-responsive"></div> 
                                @endif
                                
                            @else
                            <div><a target="_blank" href="{{$url."epaper/".$epaper->epaper_id}}">
                                @if (!empty($epaper->image))
                                    @php
                                    $mystring = $epaper->image;
                                    $findme = 'http';
                                    $pos = strpos($mystring,$findme);
                                    @endphp
                                    @if($pos === false)
                                    <img src="{{$urlimg.$path.$epaper->image}}" alt="" class="img-responsive"></div>
                                    @else
                                    <img src="{{$epaper->image}}" alt="" class="img-responsive"></div>
                                    @endif
                                @else
                                <img src="{{$urlimg.$path.$epaper->image}}" alt="" class="img-responsive"></div> 
                                @endif 
                            @endif
                         
                         <h4 align="center">{{date('d F Y', strtotime($epaper->tgl_edisi))}}</a></h3>

                    </div>
                </div><!-- Ends: .col-sm-3 -->
                @endforeach
                <div class="blog-btn wow bounceIn col-sm-12" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: bounceIn;">
                    <a href="">Edisi yang lain</a>
                </div>
                    </div><!-- Ends: .article-content -->
                    
                    

                    
                </div><!-- Ends: .post-details -->
            </div><!-- Ends: .col -->

            <div class="col-sm-3">
                <div class="blog-sidebar">

                    <div class="sidebar-widget recent-post">
                        <h3 class="widget-title">Paket User</h3>
                        <div class="widget-content">
                        <ul class="list-unstyled">
                            <li>PAKET GOLD</li>
                        
                           Start : 01 September 2018 <br>
                           End : 30 September 2018
                        </ul>
                        </div>
                        
                        
                    </div><!-- Ends: .sidebar-widget -->
                    <div class="blog-btn wow bounceIn" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: bounceIn;">
                    @if (!Session::get('id'))
                    <a href="#">Upgrade Paket</a>
                    @else
                    <a target="_blank" href="#">Upgrade Paket</a>
                    @endif
                    </div>
                 </div><!-- Ends: .blog-sidebar -->
            </div><!-- Ends: .col -->
        </div>
    </div>
</section><!-- Ends: .blog-wrapper -->

{{--  <!-- Newsletter -->
<section class="newsletter">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h3>Subscribe To Our Newsletter To Get Latest Updates &amp; News</h3>
                <form action="#">
                    <input type="text" placeholder="Your Email" required>
                    <button type="submit">Subscribe</button>
                </form>
            </div><!-- Ends: .col-sm-12 -->
        </div>
    </div>
</section><!-- Ends: .newsletter -->  --}}
<!--Modal-->
<div class="modal fade" id="modalEdit" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Profile</h4>
                @php
                use App\User;
                $user = User::where('id','=',Session::get('id'))
                        ->first();
                    
                @endphp
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="{{url('/edit/editaction')}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="messages" style="padding-top: 2%"></div>
        <div class="row">
            <div class="col-md-10 col-sm-10 col-xs-10" style="margin-left: 1%">
                <div class="form-group">
                    <label for="form_name">Nama</label>
                    <input type="text" name="name" class="form-control" value="{{$user->name}}">
                    
                    <div class="help-block with-errors"></div>
                </div>
            </div>
        </div>
        <input type="hidden" name="id" value="{{session('id')}}">
        <div class="row">
            <div class="col-md-10 col-sm-10 col-xs-10" style="margin-left: 1%">
                <div class="form-group">
                    <label for="form_name">Email</label>
                    <input type="text" name="email" class="form-control" readonly value="{{$user->email}}">
                    <div class="help-block with-errors"></div>
                </div>
            </div>

            <div class="col-md-10 col-sm-10 col-xs-10" style="margin-left: 1%">
                <div class="form-group">
                    <label for="form_name">Phone</label>
                    <input type="number" name="phone" class="form-control" value="{{$user->phone}}">
                    <div class="help-block with-errors"></div>
                </div>
            </div>

            <div class="col-md-10 col-sm-10 col-xs-10" style="margin-left: 1%">
                <div class="form-group">
                    <label for="form_name">Jenis Kelamin</label>
                    <select name="gender" id="gender" class="form-control">
                        <option value="">{{$user->gender}}</option>
                        <option value="Pria">Pria</option>
                        <option value="Wanita">Wanita</option>
                    </select>
                </div>
            </div>

            {{--  <div class="col-md-10 col-sm-10 col-xs-10" style="margin-left: 1%">
                <div class="form-group">
                    <label for="form_name">Jenis Kelamin</label>
                    <input type="text" name="gender" class="form-control" value="{{Session::get('gender')}}">
                    <div class="help-block with-errors"></div>
                </div>
            </div>  --}}
            <div class="col-md-10 col-sm-10 col-xs-10" style="margin-left: 1%">
                    <div class="form-group">
                        <label for="prov">Provinsi</label>
                        <select name="prov" id="prov" class="form-control">
                            
                            @php
                            use App\City;
                            use App\Province;
                            use Illuminate\Support\Facades\Input;
                            $prov = Province::orderBy("provinsi.id","ASC")
                                    ->pluck("name","id"); 
                            $prov_id=Input::get('id_provinsi');
                            $city=City::where('id_provinsi','=',$prov)->get();
                            $prov_name=Province::where('id','=',$user->provinsi_id)
                                        ->pluck("name");
                            $name = str_replace(array('[',']','"'), "", $prov_name);
                                                                                        
                            @endphp

                            <option value="">{{$name}}</option>  
                            {{-- <option value="">{{$prov->name}}</option> --}}
                            @foreach ($prov as $key=>$value)
                                        
                                    <option value="{{$key}}">{{$value}}</option>
                                    
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-10 col-sm-10 col-xs-10" style="margin-left: 1%">
                        <div class="form-group">
                            <label for="city">Kota</label>
                            <select name="cities" class="form-control"> 
                            @php
                            
                            $city_name=City::where('id','=',$user->city_id)
                                                ->pluck("city_name");
                            $name = str_replace(array('[',']','"'), "", $city_name);   
                            @endphp
                            <option value="">{{$name}}</option>
                            </select>
                        </div>
                    </div>
            


             <div class="col-md-10 col-sm-10 col-xs-10" style="margin-left: 1%">
                <div class="form-group">
                    <label for="form_name">Alamat</label>
                    <input type="text" name="address" class="form-control" value="{{$user->address}}">
                    <div class="help-block with-errors"></div>
                </div>
            </div>

            <div class="col-md-6 col-sm-6 col-xs-6" style="margin-left: 1%">
                <div class="form-group">
                    <label for="form_email">Foto</label>
                    <input type="file" name="photo">
                    <img src="{{$user->image}}" height="100" width="100">
                    <div class="help-block with-errors"></div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-success" style="margin-left: 1%">Submit</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

@include('layouts.footer')
<script type="text/javascript">
    $(document).ready(function()
    {
        $('select[name="prov"]').on('change', function() {
            var provID = $(this).val();
            if(provID) {
                $.ajax({
                    url: 'https://dev.topskor.id/epaper.topskor.id/dashboard/cities/'+provID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {                      
                        $('select[name="cities"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="cities"]').append('<option value="'+ key +'">'+ value +'</option>');
                        console.log(data);
                          });
                        
                    }
                });
                
            }else{
                $('select[name="cities"]').empty();
            }
        });
    });
  
  </script>