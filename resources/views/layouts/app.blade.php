<!DOCTYPE HTML>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') | UMS Hospitality</title>
    <!-- Style | Icon -->
    @vite('resources/css/app.css')
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
    <script src="https://kit.fontawesome.com/4c39239a64.js" crossorigin="anonymous"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Favicon General -->
    <link rel="icon" href="images\favicon\favicon.ico" type="image/x-icon" />
    <link rel="icon" type="image/png" sizes="16x16" href="images\favicon\favicon-16x16.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="images\favicon\favicon-32x32.png" />
    <link rel="apple-touch-icon" sizes="180x180" href="images\favicon\apple-touch-icon.png" />
    <link rel="icon" type="image/png" sizes="192x192" href="images\favicon\android-chrome-192x192.png" />
    <link rel="icon" type="image/png" sizes="512x512" href="images\favicon\android-chrome-512x512.png" />

    <!-- Manifest -->
    <link rel="manifest" href="images\favicon\site.webmanifest" />
</head>

<body>
    <section class="bg-gray-50 dark:bg-gray-900">
        <div class="container flex items-center justify-center min-h-screen px-6 mx-auto">
            <div class="w-full max-w-md">
                @yield('content')
            </div>
        </div>
    </section>
</body>

</html>
