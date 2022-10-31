<!DOCTYPE html>
<html lang="en">
    <head>
        @includeIf('partials.head.meta')

        <title>{{ basename(request()->path()) ? ucfirst(basename(request()->path())) . ' |' : '' }} {{ config('app.name') }}</title>

        @includeIf('partials.head.icon')
        @includeIf('partials.head.landing.css')
    </head>
    <body>
        <div class="site-wrapper">
            <div class="site-wrapper-inner">
                <div class="cover-container">
                    @yield('page-content')
                </div>
            </div>
        </div>

        @includeIf('partials.script.landing')
    </body>
</html>