<!DOCTYPE html>
<html lang="en" class="scroll-smooth dark snap-none snap-align-none">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- Tab and Tailwinds --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Font Style --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        * {
            scrollbar-width: none;
        }

        @media print {
            body * {
                visibility: hidden;
            }

            #hs-ai-modal,
            #hs-ai-modal * {
                visibility: visible;
            }

            #hs-ai-modal {
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
                height: auto;
                background: white;
            }
        }
    </style>


    <title>TokoNew</title>
</head>

<body class="font-poppins dark:bg-neutral-800">
    @yield('content')
    <script src="{{ asset('js/transaksi.js') }}"></script>
</body>

</html>
