@extends('layouts.dashboard')

@section('page-content')
    <form disabled>
        <div class="form-group">
            <label for="name">Nama</label>
            <input type="text" id="name" class="form-control" value="{{ $student->name }}" disabled>
        </div>

        <div class="form-group">
            <label for="age">Umur</label>
            <input type="text" id="age" class="form-control" value="{{ $student->age }} Tahun" disabled>
        </div>

        <div class="form-group">
            <label for="gender">Jenis Kelamin</label>
            <input type="text" id="gender" class="form-control" value="{{ ucfirst($student->gender) }}" disabled>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" id="email" class="form-control" value="{{ $student->email }}" disabled>
        </div>

        <div class="form-group">
            <label for="phone">Nomor Handphone</label>
            <input type="tel" id="phone" class="form-control" value="{{ $student->phone }}" disabled>
        </div>

        <div class="form-group">
            <label for="address">Alamat</label>
            <textarea class="form-control" id="address" rows="3" disabled>{{ $student->address }}</textarea>
        </div>

        <div class="form-group">
            <label for="grade">Kelas</label>
            <input type="text" id="grade" class="form-control" value="{{ $student->grade }}" disabled>
        </div>

        <div class="row">
            <div class="col-md-12 mb-4">
                <a class="btn btn-primary btn-block btn-lg shadow-lg mt-5" href="{{ route('table.student.index') }}">Kembali</a>
            </div>
        </div>
    </form>
@endsection