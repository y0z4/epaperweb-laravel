<!DOCTYPE html>
<html>

<head>

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script>
<script type="text/javascript" src="{{$ejs}}jquery.ajax-cross-origin.min.js"></script>

<link rel="stylesheet" type="text/css" href="{{$ecss}}flipbook.style.css">
<link rel="stylesheet" type="text/css" href="{{$ecss}}font-awesome.css">


<script src="{{$ejs}}flipbook.min.js"></script>

<script type="text/javascript">
    crossorigin="anonymous"
    $(document).ready(function () {
       
        $("#container").flipBook({
            @php
                $path = date('Y/m/d/', strtotime($epapercover->postdate));
               
                
            @endphp
            
            
            pages:[
                @if (!empty($epapercover->image))
                @php
                $mystring = $epapercover->image;
                $findme = 'http';
                $pos = strpos($mystring,$findme);
                @endphp
                    @if ($pos === false)
                    {src:"{{$urlimg.$path.$epapercover->image}}", thumb:"https://static.topskor.id/epaper/artikel/2018/09/08/https://dev.topskor.id/epaper.topskor.id/public/assets/epaper/images/book2/thumb1.jpg", title:"{{$epapercover->position}}"},  
                    @else
                    {src:"{{$epapercover->image}}", thumb:"https://static.topskor.id/epaper/artikel/2018/09/08/https://dev.topskor.id/epaper.topskor.id/public/assets/epaper/images/book2/thumb1.jpg", title:"{{$epapercover->position}}"},  
                    @endif                    
                @else
                {src:"{{$urlimg.$path.$epapercover->image}}", thumb:"https://static.topskor.id/epaper/artikel/2018/09/08/https://dev.topskor.id/epaper.topskor.id/public/assets/epaper/images/book2/thumb1.jpg", title:"{{$epapercover->position}}"},
                @endif
                
                @foreach ($epaper as $epaper) 
                @php
                $path2 = date('Y/m/d/', strtotime($epaper->postdate));
                @endphp
                @if (!empty($epaper->image))
                @php
                $mystring = $epaper->image;
                $findme = 'http';
                $pos = strpos($mystring,$findme);
                @endphp
                    @if ($pos === false)
                    {src:"{{$urlimg.$path2.$epaper->image}}", thumb:"https://static.topskor.id/epaper/artikel/2018/09/08/https://dev.topskor.id/epaper.topskor.id/public/assets/epaper/images/book2/thumb1.jpg", title:"{{$epaper->position}}"},  
                    @else
                    {src:"{{$epaper->image}}", thumb:"https://static.topskor.id/epaper/artikel/2018/09/08/https://dev.topskor.id/epaper.topskor.id/public/assets/epaper/images/book2/thumb1.jpg", title:"{{$epaper->position}}"},  
                    @endif                    
                @else
                {src:"{{$urlimg.$path2.$epaper->image}}", thumb:"https://static.topskor.id/epaper/artikel/2018/09/08/https://dev.topskor.id/epaper.topskor.id/public/assets/epaper/images/book2/thumb1.jpg", title:"{{$epaper->position}}"},
                @endif
                @endforeach
            
                
                
                
            ]
            
        });

    })
</script>

</head>

<body>
    
    <div id="container">
</body>

</html>
