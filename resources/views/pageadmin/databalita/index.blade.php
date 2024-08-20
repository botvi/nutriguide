@extends('template-admin.layout')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> Anak</h4>

        <div class="mb-3">
            <a href="{{ route('anak.tambah') }}" class="btn btn-primary">Tambah Data</a>
        </div>

        <div class="card">
            <h5 class="card-header">Anak</h5>
            <div class="table-responsive text-nowrap p-4">
                <table id="example" class="display compact nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>Nama Lengkap</th>
                            <th>Tanggal Lahir</th>
                            <th>Jenis Kelamin</th>
                            <th>Nomor Identitas Anak</th>
                            <th>Nama Ibu Balita</th>
                            <th>Rentang Umur</th>
                            <th>Detail Umur</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($anaks as $anak)
                            <tr>
                                <td>{{ $anak->nama_lengkap }}</td>
                                <td>{{ $anak->tanggal_lahir }}</td>
                                <td>{{ $anak->jenis_kelamin }}</td>
                                <td>{{ $anak->nomor_identitas_anak }}</td>
                                <td>{{ $anak->rentang_umur }}</td>
                                <td>{{ $anak->detail_umur }}</td>
                                <td>{{ $anak->ibu->nama }}</td>
                                <td>
                                    <a href="{{ route('anak.edit', $anak->id) }}" class="btn  btn-sm btn-warning">Edit</a>
                                    <button class="btn btn-sm btn-danger" onclick="confirmDelete({{ $anak->id }})">Delete</button>
                                    <form id="delete-form-{{ $anak->id }}" action="{{ route('anak.destroy', $anak->id) }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        function confirmDelete(id) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Data ini tidak dapat dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + id).submit();
                }
            })
        }
    </script>
@endsection