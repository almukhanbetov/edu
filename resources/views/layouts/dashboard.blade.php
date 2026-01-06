<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Личный кабинет')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- Vite / CSS --}}
    @vite(['resources/css/app.css', 'resources/js/app.jsx'])
</head>

<body class="bg-slate-900 text-white">

    <div class="min-h-screen flex">

        {{-- LEFT SIDEBAR --}}
        @include('includes.aside')

        {{-- RIGHT CONTENT --}}
        <div class="flex-1 flex flex-col">

            {{-- HEADER --}}
            @include('includes.header')

            {{-- MAIN WRAPPER --}}
            <main class="p-6">
                @yield('content')
            </main>

        </div>

    </div>

</body>

</html>
