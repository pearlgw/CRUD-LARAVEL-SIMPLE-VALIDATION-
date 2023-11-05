@extends('layout.main')

@section('content')
    <div class="card">
        <div class="card-header">
            <h6>Data Pelajar</h6>
            <button type="button" class="btn btn-sm btn-success" onclick="window.location='{{ url('pelajar/formadd') }}'"><i
                    class="fas fa-plus-circle"></i> Tambah Data</button>
        </div>
        <div class="card-body">
            @if (session('msg'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Berhasil: </strong> {{ session('msg') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <table class="table table-bordered">
                <tr>
                    <th>No</th>
                    <th>Id Pelajar</th>
                    <th>Nama Lengkap</th>
                    <th>Jenis Kelamin</th>
                    <th>Alamat</th>
                    <th>Email</th>
                    <th>No Hp</th>
                    <th>#</th>
                </tr>
                @foreach ($pelajars as $row)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $row->idPelajar }}</td>
                        <td>{{ $row->nama_lengkap }}</td>
                        <td>{{ $row->jenis_kelamin == 'M' ? 'Pria' : 'Wanita' }}</td>
                        <td>{{ $row->alamat }}</td>
                        <td>{{ $row->email }}</td>
                        <td>{{ $row->no_hp }}</td>
                        <td>
                            <button onclick="window.location='{{ url('pelajar/' . $row->idPelajar) }}'" type="button"
                                class="btn btn-sm btn-info" title="Edit Data"><i class="fas fa-edit"></i></button>
                            <form onsubmit="return DeleteData('{{ $row->nama_lengkap }}')" style="display: inline" action="{{ url('pelajar/' . $row->idPelajar) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" title="hapus data" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>

    <script>
        function DeleteData(name){
            pesan = confirm(`Yakin ingin menghapus data ${name} ? `)
            if(pesan) return true;
            else return false;
        }
    </script>
@endsection
