<!DOCTYPE html>
<html lang="zh_cn">
<head>
    <meta charset="UTF-8">
    <title></title>
    <style type="text/css">
        .img {
            margin-top: 20%;
            margin-left: 20%;
            margin-right: 20%;
        }
    </style>
</head>
<body>
<img class="img" src="{{ asset('qrcodes').'/'.$code.'.jpg' }}" alt="">
</body>
</html>