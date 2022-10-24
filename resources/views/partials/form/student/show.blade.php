@extends('layouts.dashboard', ['title' => 'Data Siswa'])

@section('page-content')
    <form disabled>
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" id="nama" class="form-control" value="{{ $student->nama }}" disabled>
        </div>

        <div class="form-group">
            <label for="umur">Umur</label>
            <input type="text" id="umur" class="form-control" value="{{ $student->umur }} Tahun" disabled>
        </div>

        <div class="form-group">
            <label for="kelamin">Jenis Kelamin</label>
            <input type="text" id="kelamin" class="form-control" value="{{ ucfirst($student->kelamin) }}" disabled>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" id="email" class="form-control" value="{{ $student->email }}" disabled>
        </div>

        <div class="form-group">
            <label for="nomor_hp">Nomor Handphone</label>
            <input type="tel" id="nomor_hp" class="form-control" value="{{ $student->nomor_hp }}" disabled>
        </div>

        <div class="form-group">
            <label for="alamat">Alamat</label>
            <textarea class="form-control" id="alamat" rows="3" disabled>{{ $student->alamat }}</textarea>
        </div>

        <div class="form-group">
            <label for="kelas">Kelas</label>
            <input type="text" id="kelas" class="form-control" value="{{ $student->kelas }}" disabled>
        </div>

        <div class="row">
            <div class="col-md-12 mb-4">
                <a class="btn btn-primary btn-block btn-lg shadow-lg mt-5" href="{{ route('table.student.index') }}">Kembali</a>
            </div>
        </div>
    </form>
@endsection