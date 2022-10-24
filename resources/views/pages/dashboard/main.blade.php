@extends('layouts.dashboard', ['title' => 'Dashboard'])

@section('page-content')
    <div class="col-12 col-lg-9">
        @includeIf('partials.body.main.box')
        @includeIf('partials.body.main.category')
    </div>
    <div class="col-12 col-lg-3">
        @includeIf('partials.body.main.profile')
        @includeIf('partials.body.main.newest')
    </div>
@endsection