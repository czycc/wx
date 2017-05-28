<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8"/>
    <meta name="description" content="安视优">
    <meta name="viewport"
          content="width=device-width,initial-scale=1.0, minimum-scale=1, maximum-scale=1,,user-scalable=no">
    <meta name="format-detection" content="telephone=no,email=no"/>
    <meta http-equiv="X-UA-Compatible" content="chrome=1"/>
    <title>安视优</title>
    <link rel="stylesheet" href="{{ asset('asy/css/eyeCommon.css') }}"/>
    <link rel="stylesheet" href="{{ asset('asy/css/eye.css') }}"/>
</head>

<body>
@yield('content')

</body>

<script src="{{ asset('asy/js/jquery-1.11.3..min.js') }}" type="text/javascript" charset="utf-8"></script>
@yield('javascript')

</html>