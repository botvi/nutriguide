@extends('template-admin.layout')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> Data Ibu Balita</h4>

        <div class="mb-3">
            <a href="/data-ibu/create" class="btn btn-sm btn-primary">Tambah Data Ibu Balita</a>
        </div>

        <div class="card">
            <h5 class="card-header">Data Ibu Balita</h5>
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

                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach($dataIbu as $dataIbu)
                            <tr>
                                <td>
                                    @if ($dataIbu->foto)
                                        <img alt="{{ $dataIbu->nama }}" class="img-fluid rounded" height="30px" width="auto"
                                            src="{{ asset($dataIbu->foto) }}">
                                    @else
                                        <img alt="{{ $dataIbu->nama }}" class="img-fluid rounded" height="30px" width="auto"
                                            src="https://thumbs.dreamstime.com/b/default-avatar-profile-image-vector-social-media-user-icon-potrait-182347582.jpg">
                                    @endif
                                </td>
                                
                                <td>{{ $dataIbu->nama }}</td>
                                <td>{{ $dataIbu->user->email }}</td>
                                <td>{{ $dataIbu->nip }}</td>
                                <td>{{ $dataIbu->tanggal_lahir }}</td>
                                <td>{{ $dataIbu->alamat }}</td>

                                <td>
                                    <a href="/data-ibu/{{ $dataIbu->id }}/edit" class="btn btn-sm btn-warning">Edit</a>
                                    <form action="/data-ibu/{{ $dataIbu->id }}" method="POST" class="d-inline delete-form">
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