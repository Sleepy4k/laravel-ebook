@extends('layouts.dashboard')

@once
    @push('addon-css')
        <link rel="stylesheet" href="{{ asset('assets/extensions/choices.js/public/assets/styles/choices.css') }}">
    @endpush
@endonce

@section('page-content')
    <form action="{{ route('book.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="title">Judul</label>
            <input type="text" id="title" name="title" class="form-control" placeholder="Judul Buku" value="{{ old('title') }}" required autofocus>
        </div>

        <div class="form-group">
            <label for="description">Deskripsi</label>
            <textarea class="form-control" id="description" name="description" rows="3" placeholder="Deskripsi Buku" required autofocus>{{ old('description') }}</textarea>
        </div>

        <div class="form-group">
            <label for="author_id">Penulis</label>
            <select id="author_id" class="choices form-select" name="author_id" required autofocus>
                @foreach ($authors as $author)
                    <option value="{{ $author->id }}">{{ $author->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="publisher_id">Penerbit</label>
            <select id="publisher_id" class="choices form-select" name="publisher_id" required autofocus>
                @foreach ($publishers as $publisher)
                    <option value="{{ $publisher->id }}">{{ $publisher->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="category_id">Kategori</label>
            <select id="category_id" class="choices form-select" name="category_id" required autofocus>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="date_of_issue">Tanggal Terbit Buku</label>
            <input type="date" id="date_of_issue" name="date_of_issue" class="form-control" required autofocus>
            <p><small class="text-muted">Format harus berupa Bulan/Tanggal/Tahun</small></p>
        </div>

        <div class="row">
            <div class="col-md-6 mb-4">
                <a class="btn btn-primary btn-block btn-lg shadow-lg mt-5" href="{{ route('book.index') }}">Kembali</a>
            </div>
            <div class="col-md-6 mb-4">
                <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Submit</button>
            </div>
        </div>
    </form>
@endsection

@once
    @push('addon-script')
        <script src="{{ asset('assets/extensions/choices.js/public/assets/scripts/choices.js') }}"></script>
        <script src="{{ asset('assets/js/pages/form-element-select.js') }}"></script>
    @endpush
@endonce