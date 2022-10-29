<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
</head>
<body>

    <div id="wrapper">
        <div id="header">
            @yield('header')
        </div>

        <div id="content">
            @yield('content')
        </div>

        <div id="sidebar">
            @yield('sidebar')
        </div>

        <div id="footer">
            @yield('footer')
        </div>
    </div>
    
</body>
</html>