<!DOCTYPE html>
<html lang="en">
    <head>
        @includeIf('partials.head.meta')

        <title>{{ basename(request()->path()) ? ucfirst(basename(request()->path())) . ' |' : '' }} {{ config('app.name') }}</title>

        @includeIf('partials.head.icon')
        @includeIf('partials.head.dashboard.css')
    </head>
    <body>
        <div id="app">
            <div id="main" class="layout-horizontal">
                <header class="mb-5">
                    @includeIf('partials.navbar.dashboard.main')
                    @includeIf('partials.navbar.dashboard.menu')
                </header>
                <div class="content-wrapper container">
                    <div class="page-heading">
                        @includeIf('partials.navbar.dashboard.breadcrumb')
                    </div>
                    <div class="page-content">
                        <section class="row">
                            @yield('page-content')
                        </section>
                    </div>
                </div>
                @includeIf('partials.footer.dashboard')
            </div>
        </div>

        @includeIf('partials.script.dashboard')
    </body>
</html>