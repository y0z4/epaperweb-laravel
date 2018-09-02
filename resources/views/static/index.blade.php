@include('layouts.header')
<section class="pages-header">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div class="page-header-inner">
						<div class="page-header-content">
							<h1>About</h1>
							<ul class="list-unstyled">
								<li><a href="{{url('/')}}">Home</a></li>
                                <li class="active">Laman</li>
                                <li class="active">{{$laman->judul}}</li>
							</ul>
						</div>
					</div>
				</div><!-- Ends: .col -->
			</div>
		</div>
	</section><!-- Ends: .pages-header -->

    <!-- Services -->
    <section class="services" id="services">
        <div class="container">
            <div class="row">
               <div class="col-sm-12 section-header">
                   <h2>{{$laman->judul}}</h2>
               </div>
               <div class="article-content">
                    <div class="service-box">
                
                        <p>{{$laman->isi_artikel}}</p>
                        
                    </div>
                </div><!-- Ends: .col-sm-3 -->
                
            </div>
        </div>
    </section><!-- Ends: .services -->




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