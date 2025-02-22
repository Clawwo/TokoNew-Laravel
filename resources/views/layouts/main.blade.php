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
                background-color: white !important;
                color: black !important;
            }

            #hs-ai-modal button,
            #hs-ai-modal .close-button {
                display: none;
            }

            #hs-ai-modal .text-white,
            #hs-ai-modal .text-gray-300,
            #hs-ai-modal .text-gray-400 {
                color: black !important;
            }

            #hs-ai-modal .bg-gray-900 {
                background-color: white !important;
            }
        }
    </style>

    <title>TokoNew</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body class="font-poppins dark:bg-neutral-800">
    @yield('content')
</body>

</html>
