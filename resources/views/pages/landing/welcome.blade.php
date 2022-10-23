@extends('layouts.landing')

@section('page-content')
    <div class="l-head clearfix">
        <div class="inner">
            @includeIf('partials.navbar.landing.main')
        </div>
    </div>

    <div class="inner cover">
        @includeIf('partials.body.landing.quotes')
    </div>

    <div class="l-foot">
        <div class="inner">
            @includeIf('partials.footer.landing')
        </div>
    </div>
@endsection