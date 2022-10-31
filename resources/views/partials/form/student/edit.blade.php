@extends('layouts.dashboard')

@section('page-content')
    <form action="{{ route('table.student.update', $student->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Nama</label>
            <input type="text" id="name" name="name" class="form-control" placeholder="Nama Siswa" value="{{ old('name', $student->name) }}" required autofocus>
        </div>

        <div class="form-group">
            <label for="age">Umur</label>
            <input type="number" id="age" name="age" class="form-control" placeholder="Umur Siswa" value="{{ old('age', $student->age) }}" required autofocus>
        </div>

        <div class="form-group">
            <label for="gender">Jenis Kelamin</label>
            <select id="gender" name="gender" class="form-select" required autofocus>
                <option value="putra" {{ ($student->gender == 'putra') ? 'selected' : ''}}>Putra</option>
                <option value="putri" {{ ($student->gender == 'putri') ? 'selected' : ''}}>Putri</option>
            </select>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" class="form-control" placeholder="Email Siswa" value="{{ old('email', $student->email) }}" required autofocus>
        </div>

        <div class="form-group">
            <label for="phone">Nomor Handphone</label>
            <input type="tel" id="phone" name="phone" class="form-control" placeholder="Nomor Handphone Siswa" value="{{ old('phone', $student->phone) }}" required autofocus>
        </div>

        <div class="form-group">
            <label for="address">Alamat</label>
            <textarea class="form-control" id="address" name="address" rows="3" placeholder="Alamat Siswa" required autofocus>{{ old('address', $student->address) }}</textarea>
        </div>

        <div class="form-group">
            <label for="kelas">Kelas</label>
            <div class="row" id="kelas">
                <div class="col-md-2">
                    <select name="grade_type" class="form-select" required autofocus>
                        <option value="X" {{ (explode(" ", $student->grade)[0] == 'X') ? 'selected' : ''}}>X</option>
                        <option value="XI" {{ (explode(" ", $student->grade)[0] == 'XI') ? 'selected' : ''}}>XI</option>
                        <option value="XII" {{ (explode(" ", $student->grade)[0] == 'XII') ? 'selected' : ''}}>XII</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <select name="grade_mayor" class="form-select" required autofocus>
                        <option value="RPL" {{ (explode(" ", $student->grade)[1] == 'RPL') ? 'selected' : ''}}>RPL</option>
                        <option value="TJA" {{ (explode(" ", $student->grade)[1] == 'TJA') ? 'selected' : ''}}>TJA</option>
                        <option value="TKJ" {{ (explode(" ", $student->grade)[1] == 'TKJ') ? 'selected' : ''}}>TKJ</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <select name="grade_number" class="form-select" required autofocus>
                        @for ($i = 1; $i < 10; $i++)
                            <option value="{{ $i }}" {{ (explode(" ", $student->grade)[2] == $i) ? 'selected' : ''}}>{{ $i }}</option>
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