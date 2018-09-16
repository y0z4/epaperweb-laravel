Hello <i>{{ $demo->receiver }}</i>,
<p>Detail Pesanan Anda.</p>
 
<div>
<p><b>No.Invoice:</b>&nbsp;{{ $demo->invoice }}</p>
<p><b>Nama Paket:</b>&nbsp;{{ $demo->paket }}</p>
<p><b>TOTAL PEMBAYARAN:</b>&nbsp;Rp.{{number_format($demo->total,0,",",".")}}</p>
<p>Silahkan lakukan pembayaran melalui rekening berikut : </p>
<p><b>{{$demo->bank}}</b></p>
<p><b>No.Rekening:</b>&nbsp;{{ $demo->norek }}</p>
<p><b>Atas Nama:</b>&nbsp;{{ $demo->namarek }}</p>
</div>
<br>
Thank You,
<br/>
<i>Topskor.id</i>