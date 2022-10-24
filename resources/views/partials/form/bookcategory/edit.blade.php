@extends('layouts.dashboard', ['title' => 'Data Kategori Buku'])

@section('page-content')
    <form action="{{ route('table.category.update', $bookCategory->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" id="nama" name="nama" class="form-control" placeholder="Nama Kategori Buku" value="{{ old('nama', $bookCategory->nama) }}" required autofocus>
        </div>

        <div class="row">
            <div class="col-md-6 mb-4">
                <a class="btn btn-primary btn-block btn-lg shadow-lg mt-5" href="{{ route('table.category.index') }}">Kembali</a>
            </div>
            <div class="col-md-6 mb-4">
                <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Submit</button>
            </div>
        </div>
    </form>
@endsection