<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <style>
        body { font-family: sans-serif; margin: 0; display: flex; flex-direction: column; min-height: 100vh; }
        .content { flex: 1; padding: 20px; }
        header, footer { background-color: #333; color: white; padding: 10px 20px; text-align: center; }
        nav a { color: white; text-decoration: none; margin: 0 15px; }
    </style>
</head>
<body>
    @include('components.navbar')

    <div class="content">
        @yield('content')
    </div>
    
    @include('components.footer')

</body>
</html>
