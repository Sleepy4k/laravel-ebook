@extends('layouts.dashboard')

@once
    @push('addon-css')
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jq-3.6.0/jszip-2.5.0/dt-1.12.1/af-2.4.0/b-2.2.3/b-colvis-2.2.3/b-html5-2.2.3/b-print-2.2.3/fc-4.1.0/fh-3.2.4/r-2.3.0/rg-1.2.0/sc-2.0.7/datatables.min.css"/>
    @endpush
@endonce

@section('page-content')
    {{
        html()->element('div')->class('card')->children([
            html()->element('div')->class('card-body')->child($dataTable->table())
        ])
    }}
@endsection

@once
    @push('addon-script')
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.6.0/jszip-2.5.0/dt-1.12.1/af-2.4.0/b-2.2.3/b-colvis-2.2.3/b-html5-2.2.3/b-print-2.2.3/fc-4.1.0/fh-3.2.4/r-2.3.0/rg-1.2.0/sc-2.0.7/datatables.min.js"></script>
    
        <script src="{{ asset('vendor/datatables/buttons.server-side.js') }}"></script>

        {!! $dataTable->scripts() !!}
    @endpush
@endonce