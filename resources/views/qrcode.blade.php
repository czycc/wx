<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1, maximum-scale=1,,user-scalable=no">
    <title></title>
    <style>
        *{
            margin: 0;
            padding: 0;
        }
        .page{
            width: 100%;
        }
        .page img{
            position: absolute;
            width: 74%;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            margin: auto;
        }
    </style>
</head>
<body>
<div class="page">
    <img class="img" src="{{ asset('qrcodes').'/'.$code.'.jpg' }}" alt="">
</div>
</body>
</html>
