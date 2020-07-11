<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body>
    <div id="app">

        <nav class="navbar navbar-expand-md navbar-light fixed-top bg-light shadow-sm">
            <div class="container">
                <a class="navbar-brand d-flex align-items-center my-2" @guest
                    href="/" @else href="{{ url('/notes') }}" @endguest>
                    <img src="/img/note-brand.svg" height="30" alt="">
                    <p class="mb-0 ml-2 font-weight-bold text-muted brand-text">{{ config('app.name', 'Laravel') }}</p>
                </a>
                <button class="navbar-toggler navbar-toggle-customize" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">

                        {{-- <li class="nav-item">
                            <a class="nav-link" href="/#faq">FAQ</a>
                        </li> --}}
                        
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="/#about">About</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            {{-- @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif --}}
                        @else

                            <li class="nav-item">
                                <a class="nav-link" href="/notes/create">New Note</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="/view">Users Notes</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="/users">Users</a>
                            </li>

                            <li class="nav-item">
                                <div>
                                    <a class="nav-link" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main>
            @yield('content')
        </main>
        
    </div>

    {{-- <script src="http://unpkg.com/turbolinks" data-turbolinks-suppress-warning></script> --}}
    <script src="{{ asset('node_modules/tinymce/tinymce.js') }}"></script>
    <script>
        tinymce.init({
            selector:'#textareanote',
            height: 700,
            plugins: 'print preview paste importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap quickbars emoticons',
            toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl',
        });
        tinymce.init({
            selector:'#unsaveable',
            height: 700,
            plugins: 'print preview paste importcss searchreplace autolink directionality code visualblocks visualchars fullscreen link template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap quickbars emoticons',
            toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview print | insertfile template link anchor codesample | ltr rtl',
        });

    </script>

</body>
</html>
