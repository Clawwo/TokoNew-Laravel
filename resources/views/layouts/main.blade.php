<!DOCTYPE html>
<html lang="en" class="scroll-smooth dark snap-none snap-align-none">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- Tab and Tailwinds --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Font Style --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <style>
        * {
            scrollbar-width: none;
        }


    </style>

    <title>TokoNew</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body class="font-poppins dark:bg-neutral-800">
    @yield('content')
</body>
<script src="./node_modules/preline/dist/preline.js"></script>
<script src="/resources/js/app.js"></script>

</html>
