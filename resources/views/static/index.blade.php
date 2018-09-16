@include('layouts.header')

    <!-- Page Header -->
	<section class="pages-header">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div class="page-header-inner">
						<div class="page-header-content">
							<h1>{{$laman->judul_hs}}</h1>
							<ul class="list-unstyled">
								<li><a href="{{url('/')}}">Home</a></li>
                                <li class="active">Laman</li>
                                <li class="active">{{$laman->judul_hs}}</li>
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
    						<img src="images/blog-details.jpg" alt="" class="img-responsive">
    					</div><!-- Ends: .post-thumb -->
    					<div class="article-meta">
    						<h2>{{$laman->judul_hs}}</h2>
    					</div><!-- Ends: .article-meta -->
    					<div class="article-content">
                            {!!$laman->konten_hs!!}
    					</div><!-- Ends: .article-content -->

    					
    			
    		</div>
    	</div>
    </section><!-- Ends: .blog-wrapper -->

    @include('layouts.footer')
