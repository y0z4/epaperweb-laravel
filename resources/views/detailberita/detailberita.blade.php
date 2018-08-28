
@include('layouts.header')
	<section class="pages-header">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div class="page-header-inner">
						<div class="page-header-content">
							<h1>Berita</h1>
							<ul class="list-unstyled">
								<li><a href="{{url('/')}}">Home</a></li>
								<li><a href="{{url('/blog/')}}">Blog</a></li>
								<li class="active">{{$getberita->nama_section}}</li>
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
    						<img src="{{$getberita->thumbnail}}" alt="" class="img-responsive">
    					</div><!-- Ends: .post-thumb -->
    					<div class="article-meta">
							<h2>{{$getberita->judul_artikel}}</h2>					
    						<ul class="list-unstyled">
								<li><i class="fa fa-calendar"></i> {{date('d F Y H:i', strtotime($getberita->tgl_pub))}}</li>
								<li><i class="fa fa-user"></i> By <a href="">{{$getberita->nama}}</a></li>
								{{-- {{@print_r($getberita)}} --}}
    							{{-- <li><i class="fa fa-tag"></i> <a href="">Business</a></li>
    							<li><i class="fa fa-comment"></i> Comments (11)</li> --}}
    						</ul>
    					</div><!-- Ends: .article-meta -->
    					<div class="article-content">
    						<p>{!!$getberita->isi_artikel!!}</p>

    						<ul class="list-unstyled blog-post-pagination clearfix">
    							<li><a href=""><i class="fa fa-long-arrow-left"></i> Previous Post</a></li>
    							<li><a href="">Next Post <i class="fa fa-long-arrow-right"></i></a></li>
    						</ul>
    					</div><!-- Ends: .article-content -->

    					

    					
    				</div><!-- Ends: .post-details -->
    			</div><!-- Ends: .col -->

    			<div class="col-sm-3">
    				<div class="blog-sidebar">
    					<div class="sidebar-widget search-widget">
    						<h3 class="widget-title">Search</h3>
    						<div class="widget-content">
    							<form action="#">
    								<input type="text" placeholder="Type Here">
    								<button type="submit"><i class="fa fa-search"></i></button>
    							</form>
    						</div>
    					</div><!-- Ends: .sidebar-widget -->

    					<div class="sidebar-widget recent-post">
    						<h3 class="widget-title">Recent Posts</h3>
    						<div class="widget-content">
    							<ul class="list-unstyled">
    								<li><a href="">All about Space travel</a></li>
    								<li><a href="">Lorem ipsum dolor sit amet, consectetur.</a></li>
    								<li><a href="">Learn JavaScript & React JS</a></li>
    								<li><a href="">Top Business Marketing strategy</a></li>
    								<li><a href="">All you need to know about TF</a></li>
    							</ul>
    						</div>
    					</div><!-- Ends: .sidebar-widget -->
    					<div class="sidebar-widget archieve-widget">
    						<h3 class="widget-title">Archieves</h3>
    						<div class="widget-content">
    							<ul class="list-unstyled">
    								<li><a href="">April, 2018</a></li>
    								<li><a href="">January, 2018</a></li>
    								<li><a href="">December, 2016</a></li>
    								<li><a href="">August, 2016</a></li>
    								<li><a href="">March, 2016</a></li>
    								<li><a href="">February, 2016</a></li>
    								<li><a href="">January, 2016</a></li>
    							</ul>
    						</div>
    					</div><!-- Ends: .sidebar-widget -->
    					<div class="sidebar-widget tags-widget">
    						<h3 class="widget-title">Tags</h3>
    						<div class="widget-content">
    							<ul class="list-unstyled">
    								<li><a href="">CSS</a></li>
    								<li><a href="">Photoshop</a></li>
    								<li><a href="">Wordpress</a></li>
    								<li><a href="">jQuery</a></li>
    								<li><a href="">Marketing</a></li>
    								<li><a href="">Apps</a></li>
    								<li><a href="">Development</a></li>
    								<li><a href="">Bootstrap</a></li>
    								<li><a href="">HTML</a></li>
    								<li><a href="">SASS</a></li>
    							</ul>
    						</div>
    					</div><!-- Ends: .sidebar-widget -->
    				</div><!-- Ends: .blog-sidebar -->
    			</div><!-- Ends: .col -->
    		</div>
    	</div>
    </section><!-- Ends: .blog-wrapper -->

    <!-- Newsletter -->
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
    </section><!-- Ends: .newsletter -->

    @include('layouts.footer')
