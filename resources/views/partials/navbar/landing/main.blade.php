<h3 class="l-head-brand" style="padding:10px 5px; width:100%; text-align: left">
    {{ config('app.name') }}
    <span style="float:right; position:relative; top:8px; font-size:15px;">
        @auth
            <a href="{{ route('dashboard.index') }}" class="link" style="margin-right: 10px">
                Dashboard
            </a>
        @else
            <a href="{{ route('login.index') }}" class="link" style="margin-right: 10px">
                Masuk
            </a>
            <a href="{{ route('register.index') }}" class="link">
                Daftar
            </a>
        @endauth
    </span>
</h3>