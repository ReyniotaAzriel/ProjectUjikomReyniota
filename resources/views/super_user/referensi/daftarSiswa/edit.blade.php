@extends('layout.su')

@section('content')
    <div class="container">
        <h2>Edit Siswa</h2>
        <form action="{{ route('superuser.siswa.update', $siswa->siswa_id) }}" method="POST">
            @csrf
            @method('PUT')

            <label>ID Siswa:</label>
            <input type="text" name="siswa_id" value="{{ $siswa->siswa_id }}" class="form-control" readonly>

            <label>NISN:</label>
            <input type="text" name="nisn" value="{{ $siswa->nisn }}" class="form-control" required>

            <label>Nama Siswa:</label>
            <input type="text" name="nama_siswa" value="{{ $siswa->nama_siswa }}" class="form-control" required>

            <label>Jurusan:</label>
            <select name="jurusan_id" class="form-control" required>
                <option value="" disabled>Pilih Jurusan</option>
                @foreach($jurusan as $j)
                    <option value="{{ $j->id }}" {{ $siswa->jurusan_id == $j->id ? 'selected' : '' }}>
                        {{ $j->nama_jurusan }}
                    </option>
                @endforeach
            </select>

            <label>Kelas:</label>
            <select name="kelas_id" class="form-control" required>
                <option value="" disabled>Pilih Kelas</option>
                @foreach($kelas as $k)
                    <option value="{{ $k->id }}" {{ $siswa->kelas_id == $k->id ? 'selected' : '' }}>
                        {{ $k->nama_kelas }}
                    </option>
                @endforeach
            </select>

            <label>No Siswa:</label>
            <input type="text" name="no_siswa" value="{{ $siswa->no_siswa }}" class="form-control" required>

            <button type="submit" class="btn btn-primary mt-3">Update</button>
        </form>
    </div>
@endsection
