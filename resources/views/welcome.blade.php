<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    {{-- Font --}}
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

</head>
<body>
    <img class="wave" src="img/bg.svg" style="width: 100%">
    <div class="container">
        <div class="img">
        </div>
        <div class="login-content">
            <h1 class="card-title" style="color:white;margin-left:10%">Selamat Datang di Sistem Informasi Penilaian Karyawan
                <br>
                Silahkan
                @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/home') }}" class="text-sm text-gray-700">Home</a>
                        <a class="text-sm text-gray-700" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                        </a> Atau
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700">Log in</a>
                        Atau
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
            </h1>
        </div>
    </div>
    <script type="text/javascript" src="js/main.js"></script>
</body>

</html>