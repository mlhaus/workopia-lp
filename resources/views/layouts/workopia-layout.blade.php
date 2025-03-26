<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="{{ asset('js/scripts.js') }}" defer></script>
    <title>{{ $title }}</title>
</head>

<body class="bg-gray-100">
<x-workopia-header />
@if(request()->is('/'))
    <x-workopia-hero />
    <x-workopia-top-banner />
@endif
<main class="container mx-auto mt-6 max-w-screen-xl px-4">
    {{ $slot }}
</main>
<x-workopia-bottom-banner />
</body>
</html>
