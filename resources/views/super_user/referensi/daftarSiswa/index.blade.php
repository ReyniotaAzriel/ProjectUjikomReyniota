@extends('layout.su')

@section('content')
    <div class="container">
        <h2>Daftar Siswa</h2>
        <a href="{{ route('superuser.siswa.create') }}" class="btn btn-primary">Tambah Siswa</a>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NISN</th>
                    <th>Nama</th>
                    <th>Jurusan</th>
                    <th>Kelas</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($siswa as $s)
                    <tr>
                        <td>{{ $s->siswa_id }}</td>
                        <td>{{ $s->nisn }}</td>
                        <td>{{ $s->nama_siswa }}</td>
                        <td>{{ $s->jurusan->nama_jurusan ?? 'Tidak Ada Jurusan' }}</td>
                        <td>{{ $s->kelas->nama_kelas ?? 'Tidak Ada Kelas' }}</td>
                        <td>
                            <a href="{{ route('superuser.siswa.edit', $s->siswa_id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('superuser.siswa.destroy', $s->siswa_id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
