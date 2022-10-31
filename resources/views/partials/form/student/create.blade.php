@extends('layouts.dashboard')

@section('page-content')
    <form action="{{ route('table.student.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="name">Nama</label>
            <input type="text" id="name" name="name" class="form-control" placeholder="Nama Siswa" value="{{ old('name') }}" required autofocus>
        </div>

        <div class="form-group">
            <label for="age">Umur</label>
            <input type="number" id="age" name="age" class="form-control" placeholder="Umur Siswa" value="{{ old('age') }}" required autofocus>
        </div>

        <div class="form-group">
            <label for="gender">Jenis Kelamin</label>
            <select id="gender" name="gender" class="form-select" required autofocus>
                <option value="putra">Putra</option>
                <option value="putri">Putri</option>
            </select>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" class="form-control" placeholder="Email Siswa" value="{{ old('email') }}" required autofocus>
        </div>

        <div class="form-group">
            <label for="phome">Nomor Handphone</label>
            <input type="tel" id="phome" name="phome" class="form-control" placeholder="Nomor Handphone Siswa" value="{{ old('phome') }}" required autofocus>
        </div>

        <div class="form-group">
            <label for="address">Alamat</label>
            <textarea class="form-control" id="address" name="address" rows="3" placeholder="Alamat Siswa" required autofocus>{{ old('address') }}</textarea>
        </div>

        <div class="form-group">
            <label for="grade">Kelas</label>
            <div class="row" id="grade">
                <div class="col-md-2">
                    <select name="grade_type" class="form-select" required autofocus>
                        <option value="X">X</option>
                        <option value="XI">XI</option>
                        <option value="XII">XII</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <select name="grade_mayor" class="form-select" required autofocus>
                        <option value="RPL">RPL</option>
                        <option value="TJA">TJA</option>
                        <option value="TKJ">TKJ</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <select name="grade_number" class="form-select" required autofocus>
                        @for ($i = 1; $i < 10; $i++)
                            <option value="{{ $i }}">{{ $i }}</option>
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