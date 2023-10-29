<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>@yield('title') - {{ config('app.name') }}</title>
</head>
<body>
    <div  class="container px-4 mx-auto py-4">
    <header class="sm:flex sm:items-center sm:justify-between">
        @yield('header')
    </header>
    <div id="content">
        <x-messages />
        @yield('content')
    </div>
    <footer>
        @yield('footer')
    </footer>
    </div>
</body>
</html>
