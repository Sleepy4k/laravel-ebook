<!DOCTYPE html>
<html lang="en">
    <head>
        @includeIf('partials.head.meta')

        <title>{{ $title ? $title . ' |' : ' |' }} {{ config('app.name') }}</title>

        @includeIf('partials.head.icon')
        @includeIf('partials.head.auth.css')
    </head>
    <body>
        <div id="auth">
            <div class="row h-100">
                <div class="col-lg-5 col-12">
                    <div id="auth-left">
                        <div class="auth-logo">
                            <a href="{{ route('landing') }}">
                                <img src="{{ asset('assets/images/logo/logo.svg') }}" alt="Logo">
                            </a>
                        </div>
                        <h1 class="auth-title">@yield('page-title')</h1>
                        <p class="auth-subtitle mb-5">@yield('page-description')</p>
                        @yield('page-content')
                    </div>
                </div>
                <div class="col-lg-7 d-none d-lg-block">
                    <div id="auth-right"></div>
                </div>
            </div>
        </div>
    </body>
</html>