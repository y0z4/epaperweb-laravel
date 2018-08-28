@include('layouts.header')

    <!-- Page Header -->
	<section class="pages-header">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div class="page-header-inner">
						<div class="page-header-content">
							<h1>Blog</h1>
							<ul class="list-unstyled">
								<li><a href="">Home</a></li>
								<li class="active">Blog</li>
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
    				<div class="blog-content row">
                        @foreach ($blog as $blog)
                            
                        
    					<div class="col-sm-6">
    						<div class="blog-single">
    							<div class="blog-thumb">
    								<figure>
    									<img src="{{$blog->thumbnail}}" alt="" class="img-responsive">
    									<figcaption>
    										<div class="thumb-prefix">
    											{{--  <span><a href="">Marketing</a></span>  --}}
    											<span>{{date('d F Y H:i', strtotime($blog->tgl_pub))}}</span>
    										</div>
    									</figcaption>
    								</figure>
    							</div>
    							<div class="blog-single-contents">
    								<h3><a href="{{$url."blog/".$blog->id_artikel}}">{{$blog->judul_artikel}}</a></h3>
    								<ul class="list-unstyled clearfix">
    									<li>Posted By <a href="">{{$blog->nama}}</a></li>
    									 <li>{{$blog->nama_section}}</li> 
    								</ul>
    								<p>{!!$blog->gagasan_utama!!}</p>
    								<div class="rm-btn">
    									<a href="{{$url."blog/".$blog->id_artikel}}">Read More</a>
    								</div>
    							</div>
    						</div>
    					</div><!-- Ends: .col-sm-6 -->
    					@endforeach

    					<!-- Blog Pagination -->
    					<div class="col-sm-12">
    						<div class="blog-pagination">
    							<ul class="list-unstyled">
    								<li><a href=""><i class="fa fa-angle-left"></i></a></li>
    								<li><a href="">1</a></li>
    								<li><a href="">2</a></li>
    								<li class="active"><a href="">3</a></li>
    								<li><a href="">4</a></li>
    								<li><a href="">5</a></li>
    								<li><a href=""><i class="fa fa-angle-right"></i></a></li>
    							</ul>
    						</div>
    					</div>

    				</div><!-- Ends: .blog-content -->
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
