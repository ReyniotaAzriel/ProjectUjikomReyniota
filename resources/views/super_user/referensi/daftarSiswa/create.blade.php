@extends('layout.su')

@section('content')
    <div class="container">
        <h2>Tambah Siswa</h2>
        <form action="{{ route('superuser.siswa.store') }}" method="POST">
            @csrf

            <label>NISN:</label>
            <input type="text" name="nisn" class="form-control" required>

            <label>Nama Siswa:</label>
            <input type="text" name="nama_siswa" class="form-control" required>

            <label>Jurusan:</label>
            <select name="jurusan_id" class="form-control" required>
                <option value="" disabled selected>Pilih Jurusan</option>
                @foreach($jurusan as $j)
                    <option value="{{ $j->id }}">{{ $j->nama_jurusan }}</option>
                @endforeach
            </select>

            <label>Kelas:</label>
            <select name="kelas_id" class="form-control" required>
                <option value="" disabled selected>Pilih Kelas</option>
                @foreach($kelas as $k)
                    <option value="{{ $k->id }}">{{ $k->nama_kelas }}</option>
                @endforeach
            </select>

            <label>No Siswa:</label>
            <input type="text" name="no_siswa" class="form-control" required>

            <button type="submit" class="btn btn-success mt-3">Simpan</button>
        </form>
    </div>
@endsection
