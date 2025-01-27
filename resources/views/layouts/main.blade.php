<!DOCTYPE html>
<html lang="en">

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

    <title>TokoNew</title>
</head>

<body class="font-poppins dark:bg-neutral-800">
        @yield('content')
    <script src="./node_modules/preline/dist/preline.js"></script>
</body>

</html>
