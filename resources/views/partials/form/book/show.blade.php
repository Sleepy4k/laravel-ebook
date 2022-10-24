@extends('layouts.dashboard', ['title' => 'Data Buku'])

@section('page-content')
    <form disabled>
        <div class="form-group">
            <label for="judul">Judul</label>
            <input type="text" id="judul" class="form-control" value="{{ $book->judul }}" disabled>
        </div>

        <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <textarea class="form-control" id="deskripsi" rows="3" disabled>{{ $book->deskripsi }}</textarea>
        </div>

        <div class="form-group">
            <label for="author_id">Penulis</label>
            <input type="text" id="author_id" class="form-control" value="{{ $book->author['nama'] }}" disabled>
        </div>

        <div class="form-group">
            <label for="publisher_id">Penerbit</label>
            <input type="text" id="publisher_id" class="form-control" value="{{ $book->publisher['nama'] }}" disabled>
        </div>

        <div class="form-group">
            <label for="category_id">Kategori</label>
            <input type="text" id="category_id" class="form-control" value="{{ $book->category['nama'] }}" disabled>
        </div>

        <div class="form-group">
            <label for="tanggal_terbit">Tanggal Terbit Buku</label>
            <input type="date" id="tanggal_terbit" class="form-control" value="{{ $book->tanggal_terbit->format('Y-m-d') }}" disabled>
        </div>

        <div class="row">
            <div class="col-md-12 mb-4">
                <a class="btn btn-primary btn-block btn-lg shadow-lg mt-5" href="{{ route('book.index') }}">Kembali</a>
            </div>
        </div>
    </form>
@endsection