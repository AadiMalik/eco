<?php
$data=content();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$data['#logo']['heading']}}</title>
</head>

<body>
    <div dir="ltr">
    <h4>Hello {{$details['Name']}},&nbsp;<br></h4>
        <div style="width:90%;font-family:'Lucida Grande',Tahoma;font-size:12px; text-align:justify; margin-top:0.5em;color:rgb(102,102,102);letter-spacing:2px;border-left-width:2px;padding-top:3px;padding-left:10px;overflow:hidden">
            <b>Your Message&nbsp;<br></b>
            <p>{{$details['MessageFrom']}}<br></p>
        </div>
        <div style="width:90%;  text-align:justify; font-family:&quot;Lucida Grande&quot;,Tahoma;font-size:12px;margin-top:0.5em;color:#000;letter-spacing:2px;border-left:12px solid rgb(211,216,215);padding-top:3px;padding-left:10px;overflow:hidden">
            <h3>Reply From Admin<br></h3>
            <p>{{$details['Message']}}&nbsp;<br></p>
        </div>
    </div>
</body>

</html>