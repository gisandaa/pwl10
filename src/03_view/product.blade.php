<html>

<head>
    <title> Product @yield('title')</title>
</head>

<body>
    @section('sidebar')
    Ini adalah Halaman product.
    @show
    <div class="container">
        @yield('content')
        <h1>Hello, i'm {{ $name }}</h1>
    <p >My occupation is {{$occupation}}</p>
    </div>
    
</body>

</html>