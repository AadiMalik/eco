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
    <h3>Hello Admin,&nbsp;<br></h3>
        <div style="width:90%;  text-align:justify; font-family:&quot;Lucida Grande&quot;,Tahoma;font-size:12px;margin-top:0.5em;color:#000;letter-spacing:2px;border-left:12px solid rgb(211,216,215);padding-top:3px;padding-left:10px;overflow:hidden">
            <span style="font-size: 18px;">Contact Message From <b>{{$details['Name']}}</b></span><br><br>
            <b>Subject: {{$details['Subject']}}</b><br>
            <b>Email: {{$details['Email']}}</b><br>
            <b>Phone No: {{$details['Phone']}}</b><br>
            <b>User Name: @if($details['User_ID']!=null) {{$details['User_ID']}} @else Without Login @endif</b>
            <p>{{$details['Message']}}&nbsp;<br></p>
        </div>
    </div>
</body>

</html>