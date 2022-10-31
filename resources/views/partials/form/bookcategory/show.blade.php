@extends('layouts.dashboard')

@section('page-content')
    <form disabled>
        <div class="form-group">
            <label for="id">ID</label>
            <input type="text" id="id" class="form-control" value="{{ $bookCategory->id }}" disabled>
        </div>

        <div class="form-group">
            <label for="name">Nama</label>
            <input type="text" id="name" class="form-control" value="{{ $bookCategory->name }}" disabled>
        </div>

        <div class="row">
            <div class="col-md-12 mb-4">
                <a class="btn btn-primary btn-block btn-lg shadow-lg mt-5" href="{{ route('table.category.index') }}">Kembali</a>
            </div>
        </div>
    </form>
@endsection