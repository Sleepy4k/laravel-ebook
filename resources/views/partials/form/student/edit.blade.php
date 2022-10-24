@extends('layouts.dashboard', ['title' => 'Data Siswa'])

@section('page-content')
    <form action="{{ route('table.student.update', $student->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" id="nama" name="nama" class="form-control" placeholder="Nama Siswa" value="{{ old('nama', $student->nama) }}" required autofocus>
        </div>

        <div class="form-group">
            <label for="umur">Umur</label>
            <input type="number" id="umur" name="umur" class="form-control" placeholder="Umur Siswa" value="{{ old('umur', $student->umur) }}" required autofocus>
        </div>

        <div class="form-group">
            <label for="kelamin">Jenis Kelamin</label>
            <select id="kelamin" name="kelamin" class="form-select" required autofocus>
                <option value="putra" {{ ($student->kelamin == 'putra') ? 'selected' : ''}}>Putra</option>
                <option value="putri" {{ ($student->kelamin == 'putri') ? 'selected' : ''}}>Putri</option>
            </select>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" class="form-control" placeholder="Email Siswa" value="{{ old('email', $student->email) }}" required autofocus>
        </div>

        <div class="form-group">
            <label for="nomor_hp">Nomor Handphone</label>
            <input type="tel" id="nomor_hp" name="nomor_hp" class="form-control" placeholder="Nomor Handphone Siswa" value="{{ old('nomor_hp', $student->nomor_hp) }}" required autofocus>
        </div>

        <div class="form-group">
            <label for="alamat">Alamat</label>
            <textarea class="form-control" id="alamat" name="alamat" rows="3" placeholder="Alamat Siswa" required autofocus>{{ old('alamat', $student->alamat) }}</textarea>
        </div>

        <div class="form-group">
            <label for="kelas">Kelas</label>
            <div class="row" id="kelas">
                <div class="col-md-2">
                    <select name="kelas_tipe" class="form-select" required autofocus>
                        <option value="X" {{ (explode(" ", $student->kelas)[0] == 'X') ? 'selected' : ''}}>X</option>
                        <option value="XI" {{ (explode(" ", $student->kelas)[0] == 'XI') ? 'selected' : ''}}>XI</option>
                        <option value="XII" {{ (explode(" ", $student->kelas)[0] == 'XII') ? 'selected' : ''}}>XII</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <select name="kelas_jurusan" class="form-select" required autofocus>
                        <option value="RPL" {{ (explode(" ", $student->kelas)[1] == 'RPL') ? 'selected' : ''}}>RPL</option>
                        <option value="TJA" {{ (explode(" ", $student->kelas)[1] == 'TJA') ? 'selected' : ''}}>TJA</option>
                        <option value="TKJ" {{ (explode(" ", $student->kelas)[1] == 'TKJ') ? 'selected' : ''}}>TKJ</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <select name="kelas_nomer" class="form-select" required autofocus>
                        @for ($i = 1; $i < 10; $i++)
                            <option value="{{ $i }}" {{ (explode(" ", $student->kelas)[2] == $i) ? 'selected' : ''}}>{{ $i }}</option>
                        @endfor
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-4">
                <a class="btn btn-primary btn-block btn-lg shadow-lg mt-5" href="{{ route('table.student.index') }}">Kembali</a>
            </div>
            <div class="col-md-6 mb-4">
                <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Submit</button>
            </div>
        </div>
    </form>
@endsection

@once
    @push('addon-script')
        <script src="{{ asset('assets/js/pages/form-element-select.js') }}"></script>
    @endpush
@endonce