<!DOCTYPE html>
<html lang="en">
<head>
    <title>BEyG</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('css/home.css')}}">
    <!--===============================================================================================-->
    <script src="{{asset('js/org.js')}}"></script>
    <!--===============================================================================================-->
    <script src="https://use.fontawesome.com/releases/v5.11.2/js/all.js" data-auto-a11y="true"></script>
    <!--===============================================================================================-->

</head>
<body class="animsition">

    @include('includes.peticion-navbar')
    @yield('content')

</body>
</html>
