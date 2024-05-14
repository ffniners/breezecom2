


<!-- layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @vite('resources/js/app.js')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
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
