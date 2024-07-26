@extends('template-admin.layout')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Makanan /</span> Create</h4>

        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Create Makanan</h5>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('makanan.store') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama:</label>
                                <input type="text" id="nama" name="nama" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="kategori_makanan_id" class="form-label">Kategori:</label>
                                <select id="kategori_makanan_id" name="kategori_makanan_id" class="form-control" required>
                                    @foreach($kategoriMakanans as $kategori)
                                        <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="komposisi_gizi" class="form-label">Komposisi Gizi:</label>
                                <textarea id="komposisi_gizi" name="komposisi_gizi" class="form-control" rows="4" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="ukuran_porsi" class="form-label">Ukuran Porsi:</label>
                                <input type="text" id="ukuran_porsi" name="ukuran_porsi" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
