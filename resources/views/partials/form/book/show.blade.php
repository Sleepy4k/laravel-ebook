@extends('layouts.dashboard')

@section('page-content')
    <form disabled>
        <div class="form-group">
            <label for="title">Judul</label>
            <input type="text" id="title" class="form-control" value="{{ $book->title }}" disabled>
        </div>

        <div class="form-group">
            <label for="description">Deskripsi</label>
            <textarea class="form-control" id="description" rows="3" disabled>{{ $book->description }}</textarea>
        </div>

        <div class="form-group">
            <label for="author_id">Penulis</label>
            <input type="text" id="author_id" class="form-control" value="{{ $book->author['name'] }}" disabled>
        </div>

        <div class="form-group">
            <label for="publisher_id">Penerbit</label>
            <input type="text" id="publisher_id" class="form-control" value="{{ $book->publisher['name'] }}" disabled>
        </div>

        <div class="form-group">
            <label for="category_id">Kategori</label>
            <input type="text" id="category_id" class="form-control" value="{{ $book->category['name'] }}" disabled>
        </div>

        <div class="form-group">
            <label for="date_of_issue">Tanggal Terbit Buku</label>
            <input type="date" id="date_of_issue" class="form-control" value="{{ $book->date_of_issue->format('Y-m-d') }}" disabled>
        </div>

        <div class="row">
            <div class="col-md-12 mb-4">
                <a class="btn btn-primary btn-block btn-lg shadow-lg mt-5" href="{{ route('book.index') }}">Kembali</a>
            </div>
        </div>
    </form>
@endsection