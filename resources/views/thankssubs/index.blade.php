@include('layouts.header')
<!-- Blog Content -->
<style>
html, body{
    overflow: hidden;
    overflow-x: hidden;
    overflow-y: hidden;
}
.thanks-display{
    display: table;
    height: 100vh;
    vertical-align: middle;
    width: 100%;
    text-align: center;
    padding: 50vh 0%;
    background-color: rgba(239,73,77,.95);

  }
  p{
      color:white;
      font-weight: bold;
      font-size: 50px;
  }
</style>
<section style="width: 100%; height: 100%; overflow: hidden;">
    <div class="thanks-display">
        <p>{{$msg}}</p>
    </div>
</section>
<!-- ===================================================
		Javascript Files
	===================================================== -->
	<!-- jQuery Library -->
    <script src="{{$js}}jquery-2.1.4.js"></script>
	<!-- Boostrap JS -->
    <script src="{{$js}}bootstrap.min.js"></script>
	<!-- Owl Carousel -->
    <script src="{{$js}}owl.carousel.min.js"></script>
	<!-- Sticky JS -->
    <script src="{{$js}}jquery.sticky.js"></script>
	<!-- Smooth Scroll -->
    <script src="{{$js}}smooth-scroll.js"></script>
	<!-- Magnific Popup -->
    <script src="{{$js}}jquery.magnific-popup.min.js"></script>
	<!-- Counter Up -->
    <script src="{{$js}}jquery.counterup.min.js"></script>
    <script src="{{$js}}waypoints.min.js"></script>
	<!-- SymoTimer -->
    <script src="{{$js}}jquery.syotimer.min.js"></script>
	<!-- WOW JS -->
    <script src="{{$js}}wow.min.js"></script>
	<!-- Mail JS -->
	<script src="{{$js}}mail.js"></script>
    <!-- Custom JS -->
    {{-- <script src="{{$js}}jquery-2.1.4.js"></script> --}}
    <script src="{{$js}}velocity.min.js"></script>
    <script src="{{$js}}main.js"></script>
    <script src="{{$js}}plugins.js"></script>
    <script src="{{$js}}custom.js"></script>




