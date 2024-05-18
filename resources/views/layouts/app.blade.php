


<!-- layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <title>@yield('title')</title>
    
    <!--
    <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet" type="text/css" />
    <script src="{{ secure_asset('js/app.js') }}" defer></script>
-->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!--
        
-->


</head>
<body>

    <header>
        <!-- Your header content goes here -->
        <h1>This is the header</h1>
        <nav>
            <ul>
                <li><a href="/">Home</a></li>
                <li><a href="/about">About</a></li>
                <li><a href="/contact">Contact</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <!-- This is where the content of each specific page will be inserted -->
        @yield('content')
    </main>

    <footer>
        <!-- Your footer content goes here -->
        <p>&copy; 2024 Your Website. All rights reserved.</p>
    </footer>

</body>
</html>
