@include('layouts.header')
<!-- Intro Section -->
        @php
        $path = date('Y/m/d/', strtotime($epaperz->postdate));
        @endphp
    <section class="intro intro-style2" style="background:url({{$urlimg.$path.$epaperz->image}});background-repeat: no-repeat;background-size: cover;background-position: top;position: relative;padding: 50px 0 0 0;min-height: 780px;">
        <div class="container">
            <div class="row">
                <div class="col-md-7 col-sm-7 intro-info wow fadeIn">
                    <div class="intro-info-content">
                        <h1>{{date('d F Y', strtotime($epaperz->tgl_edisi))}}<br/> {{$epaperz->judul}}</h1>
                        <p>{{$epaperz->gagasan_utama}}</p>
                        <ul class="list-unstyled">
                            @if (!Session::get('id'))
                            
                            <li><a href="{{$url."highlight/".$epaperz->epaper_id}}">Baca Sekarang Juga</a></li>
                            @else
                            <li><a target="_blank" href="{{$url."epaper/".$epaperz->epaper_id."/".$epaperz->urltitle}}">Baca Sekarang Juga</a></li> 
                            @endif
                            
                            @if (Session::get('id'))
                            <li><a href="{{$url."highlight/".$epaperz->epaper_id}}">Highlight</a></li>  
                            
                            @endif
                            
                        </ul>
                    </div>
                </div><!-- Ends: .intro-info -->

                <div class="col-md-5 col-sm-5 intro-image wow fadeIn">
                    <div class="intro-image-content">
                        @php
                            $path = date('Y/m/d/', strtotime($epaperz->postdate));

                        @endphp
                            
                        <img src="{{$urlimg.$path.$epaperz->image}}" height="400px" width="400px" alt="" class="img-responsive" style="margin-top:70px">
                    </div>
                </div><!-- Ends: .intro-image -->
            </div>
        </div>
    </section><!-- Ends: .intro -->




     <!-- Services -->
    <section class="services service-style2" id="services">
        <div class="container">
            <div class="row">
               <div class="col-sm-12 section-header">
                   <h2>Edisi Sebelumnya</h2>
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
                         
                         <h3 align="center">{{date('d F Y', strtotime($epaper->tgl_edisi))}}</a></h3>

                    </div>
                </div><!-- Ends: .col-sm-3 -->
                @endforeach
                

            </div>

            <div class="blog-btn wow bounceIn" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: bounceIn;">
                        <a href="">Edisi yang lain</a>
                    </div>

        </div>
    </section><!-- Ends: .services -->





    <!-- Price Table -->
    <section class="price-table price-table2" id="price-table">
        <div class="container">
            <div class="row">
               <div class="col-sm-12 section-header">
                   <h2>Paket Berlangganan</h2>
               </div>
               @php
                   $paket = DB::table('t_paket')
                            ->orderBy('id','ASC')
                            ->get();
                                    
                @endphp
                @foreach ($paket as $paket)

                    
               
                <div class="col-md-4 col-sm-6">
                    <div class="price-table-wrapper wow fadeIn" data-wow-delay="0.1s">
                        <div class="price-header">
                            <h3>{{$paket->nama_paket}}</h3>
                            <span class="price">Rp {{number_format($paket->harga_paket,0,",",".")}}</span>
                            <span>{{$paket->per}}</span>
                        </div>
                        <div class="price-content">
                            <ul class="list-unstyled">
                                
                                {{-- <li>Free Form to Signup</li>
                                <li>Premium Forum Support</li>
                                <li>Unlimited Access to Store</li>
                                <li class="ablock">Access to Premium Content</li>
                                <li class="ablock">Limitless Storage Utility</li>
                                <li class="ablock">24/7 Effective Live Support</li>
                                <li>Free Future Updates &amp; Fix</li> --}}
                            </ul>
                        </div>
                        <div class="price-btn">
                            @if (Session::get('id'))
                            <a href="{{ url('/dashboard/payment') }}">Berlangganan</a>
                            @else
                            <a href="{{ url('/login') }}">Berlangganan</a>
                            @endif
                            
                        </div>
                    </div>
                </div><!-- Ends: .col-sm-3 -->
                @endforeach
                
            </div>
        </div>
    </section><!-- Ends: .price-table -->

    <section class="testimonial" id="testimonial">
        <div class="container">
            <div class="row">
               <div class="col-sm-12 section-header">
                   <h2>Testimoni</h2>
               </div>
               
                <div class="col-sm-8 col-sm-offset-2">
                    <div class="testimonial-slider owl-carousel wow fadeInUp">
                        @foreach ($testi as $testi)
                    	<div class="slide-single">
                    		<div class="client-info">
								<ul class="list-unstyled">
									<li class="client-image">
										<img src="{{$testi->photo}}" alt="">
									</li>
									<li class="client-name">
										<h3>{{$testi->nama}}</h3>
										<h4>{{$testi->profesi}}</h4>
										<span>{{$testi->company}}</span>
									</li>
								</ul>
                    		</div>
                    		<div class="client-text">
                    			<p>{!!$testi->isi_testi!!}</p>
                    		</div>
                    	</div><!-- Ends: .slide-single -->
                        @endforeach
                    </div><!-- Ends: .testimonial-slider -->
                </div>
                
            </div>
        </div>
    </section><!-- Ends: .testimonial -->



    <!-- Newsletter -->
    <section class="newsletter">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 wow fadeInUp" data-wow-delay="0.1s">
                    <h3>Subscribe To Our Newsletter To Get Latest Updates &amp; News</h3>
                    <form method="POST" autocomplete="off" enctype="multipart/form-data" action="{{url('/subsemail')}}">
                        @csrf
                        <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" type="email" placeholder="Your Email" required>
                        @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                        <button type="submit">Subscribe</button>
                    </form>
                </div><!-- Ends: .col-sm-12 -->
            </div>
        </div>
    </section><!-- Ends: .newsletter -->

    <!-- Blog -->
    <section class="blog" id="blog">
        <div class="container">
            <div class="row">
				<div class="col-sm-12 section-header">
				   <h2>Berita Terpopuler</h2>
                </div>
                @foreach ($populer as $populer)
                <div class="col-sm-4">
                    <div class="blog-single wow fadeIn" data-wow-delay="0.1s">
                        <figure>
                           
                                
                            
                            <img src="{{$populer->thumbnail}}" alt="" class="img-responsive">
                            <figcaption>
                                <ul class="list-unstyled post-meta clearfix">
                                    <li>{{date('d F Y H:i', strtotime($populer->tgl_pub))}}</li>
                                    {{-- <li><a href="">{{$populer->nama}}</a></li> --}}
                                    <li><a href="">{{$populer->nama_section}}</a></li>
                                </ul>
                                <h3><a href="{{$url."blog/".$populer->id_artikel}}">{{$populer->judul_artikel}}</a></h3>
                                <p>{!!$populer->gagasan_utama!!}</p>
                                <ul class="list-unstyled post-bottom">
                                    <li><a href="{{$url."blog/".$populer->id_artikel}}">Selengkapnya</a></li>

                                </ul>
                            </figcaption>
                           
                        </figure>
                    </div>
                </div><!-- Ends: .col-sm-4 -->
                @endforeach
                
                <div class="col-sm-12">
                	<div class="blog-btn wow bounceIn" data-wow-delay="0.3s">
                		<a href="https://www.topskor.id/">Go to Topskor</a>
                	</div>
                </div>
            </div>
        </div>
    </section><!-- Ends: .blog -->



    <!-- Contact -->
    <section class="contact" id="contact">
        <div class="container">
            <div class="row">
               <div class="col-sm-12 section-header">
                   <h2>Pasang Iklan</h2>
               </div>
                <div class="col-md-8 col-sm-7">
                    <div class="contact-wrapper wow fadeInLeft" data-wow-delay="0.1s">
                        <form method="POST" action="{{url('/iklan')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <input type="text" placeholder="Name" name="name" required>
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" placeholder="Email" name="email" required>
                                </div>
                                <div class="col-sm-12">
                                    <textarea placeholder="Message" name="message" required></textarea>
                                </div>
                                <div class="col-sm-12">
                                    <button type="submit">Send Message</button>
                                </div>
                            </div>
							<div id="form-messages"></div>
                        </form>
                    </div>
                </div><!-- Ends: .col-sm-8 -->
                <div class="col-md-4 col-sm-5">
                    <div class="contact-details wow fadeInRight" data-wow-delay="0.3s">
                        <h3>Get In Touch</h3>
                        <p>{!!$info->keterangan!!}</p>
                        <ul class="list-unstyled contact-info-list">
                            <li><i class="fa fa-phone"></i> Phone: {{$info->phone}}</li>
                            <li><i class="fa fa-envelope"></i> Email: {{$info->email}}</li>
                            <li><i class="fa fa-globe"></i> Web: {{$info->website}}</li>
                        </ul>
                        <ul class="list-unstyled contact-social">
                            <li><a target="_blank" href="{{$info->facebook}}"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a target="_blank" href="{{$info->twitter}}"><i class="fab fa-twitter"></i></a></li>
                            <li><a target="_blank" href="{{$info->instagram}}"><i class="fab fa-instagram"></i></a></li>
                            <li><a target="_blank" href="{{$info->youtube}}"><i class="fab fa-youtube"></i></a></li>
                            <li><a target="_blank" href="{{$info->googleplus}}"><i class="fab fa-google-plus-g"></i></i></a></li>
                            </ul>
                    </div>
                </div><!-- Ends: .col-sm-4 -->
            </div>
        </div>
    </section><!-- Ends: .contact -->
    @include('layouts.footer')
