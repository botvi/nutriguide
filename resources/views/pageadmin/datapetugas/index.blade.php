@extends('template-admin.layout')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> Data Petugas</h4>

        <div class="mb-3">
            <a href="/data-petugas/create" class="btn btn-sm btn-primary">Tambah Data Petugas</a>
        </div>

        <div class="card">
            <h5 class="card-header">Data Petugas</h5>
            <div class="table-responsive text-nowrap p-4">
                <table id="example" class="display compact nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>Foto</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>NIP</th>
                            <th>Tanggal Lahir</th>
                            <th>Alamat</th>
                            <th>Jabatan</th>
                            <th>Pendidikan Terakhir</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach($dataPetugas as $dataPetugas)
                            <tr>
                                <td>
                                    @if ($dataPetugas->foto)
                                        <img alt="{{ $dataPetugas->nama }}" class="img-fluid rounded" height="30px" width="auto"
                                            src="{{ asset($dataPetugas->foto) }}">
                                    @else
                                        <img alt="{{ $dataPetugas->nama }}" class="img-fluid rounded" height="30px" width="auto"
                                            src="https://thumbs.dreamstime.com/b/default-avatar-profile-image-vector-social-media-user-icon-potrait-182347582.jpg">
                                    @endif
                                </td>
                                
                                <td>{{ $dataPetugas->nama }}</td>
                                <td>{{ $dataPetugas->user->email }}</td>
                                <td>{{ $dataPetugas->nip }}</td>
                                <td>{{ $dataPetugas->tanggal_lahir }}</td>
                                <td>{{ $dataPetugas->alamat }}</td>
                                <td>{{ $dataPetugas->jabatan }}</td>
                                <td>{{ $dataPetugas->pendidikan_terakhir }}</td>
                                <td>
                                    <a href="/data-petugas/{{ $dataPetugas->id }}/edit" class="btn btn-sm btn-warning">Edit</a>
                                    <form action="/data-petugas/{{ $dataPetugas->id }}" method="POST" class="d-inline delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const deleteForms = document.querySelectorAll('.delete-form');

            deleteForms.forEach(form => {
                form.addEventListener('submit', function(event) {
                    event.preventDefault();

                    Swal.fire({
                        title: 'Apakah Anda yakin?',
                        text: "Anda tidak akan dapat mengembalikan ini!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ya, hapus!',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });
        });
    </script>
@endsection