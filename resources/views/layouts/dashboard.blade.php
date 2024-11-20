<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') | Hospitality</title>

    <!-- Style | Icon -->
    @vite('./resources/css/app.css')
    <script src="https://kit.fontawesome.com/4c39239a64.js" crossorigin="anonymous"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Favicon -->
    <link rel="icon" href="/images/favicon/favicon.ico" type="image/x-icon" />
    <link rel="icon" type="image/png" sizes="16x16" href="/images/favicon/favicon-16x16.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="/images/favicon/favicon-32x32.png" />
    <link rel="apple-touch-icon" sizes="180x180" href="/images/favicon/apple-touch-icon.png" />
    <link rel="icon" type="image/png" sizes="192x192" href="/images/favicon/android-chrome-192x192.png" />
    <link rel="icon" type="image/png" sizes="512x512" href="/images/favicon/android-chrome-512x512.png" />
    <link rel="manifest" href="/images/favicon/site.webmanifest" />
</head>

<body class="bg-white dark:bg-gray-900">
    <div class="flex h-screen">
        <!-- Sidebar: fixed on the left -->
        @include('components.sidebar')

        <!-- Main Content Area -->
        <div class="flex-1 ml-56 flex flex-col overflow-hidden">
            <!-- Header Section -->
            <div
                class="text-2xl font-semibold text-gray-800 dark:text-white bg-gray-100 p-6 flex items-center justify-between space-x-3">
                <div>
                    @yield('dashboard-title')
                </div>
                <div class="font-normal text-sm uppercase flex flex-col justify-center items-center">
                    <span>{{ date('d-M-Y') }}</span>
                    <span>{{ date('H:i') }}</span>
                </div>
                <div class="flex items-center space-x-3">
                    <a class="inline-block px-4 py-3 text-sm font-medium text-black hover:text-gray-500 focus:outline-none focus:ring active:bg-red-500"
                        href="#">
                        <i class="fa-solid fa-bell text-[20px]"></i>
                    </a>
                </div>
            </div>

            <!-- Main Content -->
            <div class="flex-1 overflow-y-auto px-3 py-3">
                @yield('content')
            </div>
        </div>
    </div>
</body>

</html>
