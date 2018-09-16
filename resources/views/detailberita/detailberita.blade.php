
@include('layouts.header')
	<section class="pages-header">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div class="page-header-inner">
						<div class="page-header-content">
							<h1>Highlight</h1>
							<ul class="list-unstyled">
								<li><a href="{{url('/')}}">Home</a></li>
								<li><a href="{{url('/blog/')}}">Highlight</a></li>
								<li class="active">{{$epapercover->judul_inti}}</li>
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
								@php
								$path = date('Y/m/d/', strtotime($epapercover->postdate));
								@endphp
								@if (!empty($epapercover->image))
								@php
								$mystring = $epapercover->image;
								$findme = 'http';
								$pos = strpos($mystring,$findme);
								@endphp
								@if($pos === false)
								<img src="{{$urlimg.$path.$epapercover->image}}" alt="" class="img-responsive">
								@else
								<img src="{{$epapercover->image}}" alt="" class="img-responsive">
								@endif
							@else
							<img src="{{$urlimg.$path.$epaper->image}}" alt="" class="img-responsive"> 
							@endif 
    					</div><!-- Ends: .post-thumb -->
    					<div class="article-meta">
							<h2>{{$epapercover->judul_artikel}}</h2>					
    						<ul class="list-unstyled">
								{{-- <li><i class="fa fa-calendar"></i> {{date('d F Y H:i', strtotime($getberita->tgl_pub))}}</li> --}}
								{{-- <li><i class="fa fa-user"></i> By <a href="">{{$getberita->nama}}</a></li> --}}
								{{-- {{@print_r($getberita)}} --}}
    							{{-- <li><i class="fa fa-tag"></i> <a href="">Business</a></li>
    							<li><i class="fa fa-comment"></i> Comments (11)</li> --}}
    						</ul>
    					</div><!-- Ends: .article-meta -->
    					<div class="article-content">
    						{{-- <p>{!!$getberita->isi_artikel!!}</p> --}}

    						{{-- <ul class="list-unstyled blog-post-pagination clearfix">
    							<li><a href=""><i class="fa fa-long-arrow-left"></i> Previous Post</a></li>
    							<li><a href="">Next Post <i class="fa fa-long-arrow-right"></i></a></li>
    						</ul> --}}
    					</div><!-- Ends: .article-content -->

    					

    					
    				</div><!-- Ends: .post-details -->
    			</div><!-- Ends: .col -->

    			<div class="col-sm-3">
    				<div class="blog-sidebar">

    					<div class="sidebar-widget recent-post">
    						<h3 class="widget-title">Highlight</h3>
    						<div class="widget-content">
    							<ul class="list-unstyled">
									<li><font size='3px'> {{$epapercover->judul_inti}}</font></li>
									@foreach ($epapercover2 as $epapercover2)
									<li><font size='3px'> {{$epapercover2->judul_inti}}</font></li>
									@endforeach															
    								
								</ul>
								
							
							</div>
							
						</div><!-- Ends: .sidebar-widget -->
						<div class="blog-btn wow bounceIn" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: bounceIn;">
						@if (!Session::get('id'))
						<a href="{{url('/login')}}">Baca Sekarang Juga</a>
						@else
						<a target="_blank" href="{{$url."epaper/".$epaperz->epaper_id."/".$epaperz->urltitle}}">Baca Sekarang Juga</a>
						@endif
    					</div>
    				</div><!-- Ends: .blog-sidebar -->
    			</div><!-- Ends: .col -->
    		</div>
    	</div>
    </section><!-- Ends: .blog-wrapper -->

    <!-- Newsletter -->
    {{--  <section class="newsletter">
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
	</section>  --}}
	<!-- Ends: .newsletter -->

    @include('layouts.footer')
