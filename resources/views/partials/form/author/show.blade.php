@extends('layouts.dashboard', ['title' => 'Data Penulis'])

@section('page-content')
    <form disabled>
        <div class="form-group">
            <label for="id">ID</label>
            <input type="text" id="id" class="form-control" value="{{ $author->id }}" disabled>
        </div>

        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" id="nama" class="form-control" value="{{ $author->nama }}" disabled>
        </div>

        <div class="row">
            <div class="col-md-12 mb-4">
                <a class="btn btn-primary btn-block btn-lg shadow-lg mt-5" href="{{ route('table.author.index') }}">Kembali</a>
            </div>
        </div>
    </form>
@endsection