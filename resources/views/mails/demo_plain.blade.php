Hello {{ $demo->receiver }},
Detail Pesanan Anda.
 
Demo object values:
 
No.Invoice: {{ $demo->invoice }}
Nama Paket: {{ $demo->paket }}
TOTAL PEMBAYARAN: Rp.{{number_format($demo->total,0,",",".")}}

Silahkan lakukan pembayaran melalui rekening berikut : 
{{$demo->bank}}
No.Rekening: {{ $demo->norek }}
Atas Nama: {{ $demo->namarek }}
 
Thank You,
Topskor.id