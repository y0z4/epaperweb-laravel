<!DOCTYPE html>
<html>

<head>

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script>

<link rel="stylesheet" type="text/css" href="{{$ecss}}flipbook.style.css">
<link rel="stylesheet" type="text/css" href="{{$ecss}}font-awesome.css">

<script src="{{$ejs}}flipbook.min.js"></script>
{{-- <object src="{{$epapercover->image}}" type='application/pdf'>
        <embed src="{{$epapercover->image}}" width="100%" height="100%" type='application/pdf'>
</object> --}}

<script type="text/javascript">

    $(document).ready(function () {
        $("#container").flipBook({
            pages:[
              
               
                {src:"{{$epapercover->image}}", thumb:"{{$epapercover->thumb}}", title:"{{$epapercover->title}}"},
                
                
                
                
                
                
            ]
        });

    })
</script>

</head>

<body>
    
<div id="container"/>
</body>

</html>
