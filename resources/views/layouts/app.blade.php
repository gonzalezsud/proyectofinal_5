<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shoppingify</title>
    @vite('resources/css/app.css')

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <nav class="bg-gray-800 text-white px-4 py-2">
        <div class="container mx-auto flex items-center justify-between">
            {{-- <a href="{{ route('home') }}" class="text-white text-xl font-bold">Shoppingify</a> --}}
            <a href="{{ route('dashboard') }}" class="text-white text-xl font-bold">Shoppingify</a>

            <ul class="space-x-4">
                <li><a href="{{ route('categories.index') }}">Categories</a></li>
                <li><a href="{{ route('items.index') }}">Items</a></li>
                <li><a href="{{ route('listnames.index') }}">List Names</a></li>
                <li><a href="{{ route('itemlistnames.index') }}">Item List Names</a></li>
            </ul>
        </div>
    </nav>

    <div class="container mx-auto mt-4">
        @yield('content')
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
