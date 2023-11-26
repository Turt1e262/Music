<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
<link rel="stylesheet" href="{{ asset('css/music.css') }}">
    </head>
    <body>




        <header>
            <div class="header-container">
                <h1>Music World</h1>
                <nav>
                    <ul>
                       



                        @if (Route::has('login'))
                        
                            @auth
                            <li>
                                <a href="{{ url('/dashboard') }}" class="">List music</a>
                            </li>
                                @else
                            <li>
                                <a href="{{ route('login') }}" class="">Log in</a>
                            </li>
                                @if (Route::has('register'))
                                <li>
                                    <a href="{{ route('register') }}" class="">Register</a>
                                </li>
                                    @endif
                            @endauth
                        
                    @endif



                    </ul>
                </nav>
            </div>
        </header>



    <footer>
        <p>&copy; 2023 Music World</p>
    </footer>
    </body>
</html>