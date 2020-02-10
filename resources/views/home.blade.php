<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="{{ asset('site/style.css') }}">
</head>
<body>
@include('includes/header')

@yield('content')

@include('includes/footer')

<script src="https://kit.fontawesome.com/e656fe6405.js" crossorigin="anonymous"></script>
<script src="{{ asset('site/jquery.js') }}"></script>
<script src="{{ asset('site/bootstrap.js') }}"></script>
<script src="{{ asset('site/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('site/defaults-pt_BR.js') }}"></script>
</body>
</html>
