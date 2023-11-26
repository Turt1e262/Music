<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>

/* Create the spinning animation */
@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

/* Apply the spinning animation with a slow duration */
.animate-spin-slow {
    animation: spin 4s linear infinite;
}


        </style>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-pink-100 dark:bg-gray-900">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-pink dark:bg-pink-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script type="text/javascript" src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#ListTable').DataTable();
            });
        </script>
        <script>document.addEventListener('DOMContentLoaded', function () {
            const audioElements = document.querySelectorAll('audio');
        
            audioElements.forEach((audio) => {
                audio.addEventListener('play', function () {
                    // Find the corresponding record image
                    const audioId = audio.getAttribute('data-audio-id');
                    const recordImage = document.querySelector(`[data-audio-id="${audioId}"] + .record-image`);
        
                    if (recordImage) {
                        recordImage.classList.add('animate-spin-slow');
                    }
                });
        
                audio.addEventListener('pause', function () {
                    // Find the corresponding record image
                    const audioId = audio.getAttribute('data-audio-id');
                    const recordImage = document.querySelector(`[data-audio-id="${audioId}"] + .record-image`);
        
                    if (recordImage) {
                        recordImage.classList.remove('animate-spin-slow');
                    }
                });
            });
        });
            </script>
    </body>
</html>
