@extends('template-admin.layout')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms /</span> Tambah Balita</h4>

        <div class="card mb-4">
            <h5 class="card-header">Tambah Balita</h5>
            <div class="card-body">
                <form action="{{ route('anak.store') }}" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="ibu_id">Ibu Balita</label>
                        <select class="form-control @error('ibu_id') is-invalid @enderror" id="ibu_id"
                            name="ibu_id" required>
                            <option value="">Pilih Ibu Balita</option>
                            @foreach ($orangTuas as $orangTua)
                                <option {{ old('ibu_id') == $orangTua->id ? 'selected' : '' }}
                                    value="{{ $orangTua->id }}">{{ $orangTua->nama }}</option>
                            @endforeach
                        </select>
                        @error('ibu_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="nama_lengkap">Nama Lengkap</label>
                        <input class="form-control @error('nama_lengkap') is-invalid @enderror" id="nama_lengkap"
                            name="nama_lengkap" required type="text" value="{{ old('nama_lengkap') }}">
                        @error('nama_lengkap')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="tanggal_lahir">Tanggal Lahir</label>
                        <input class="form-control @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir"
                            name="tanggal_lahir" required type="date" value="{{ old('tanggal_lahir') }}">
                        @error('tanggal_lahir')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select class="form-control @error('jenis_kelamin') is-invalid @enderror" id="jenis_kelamin"
                            name="jenis_kelamin" required>
                            <option value="">Pilih Jenis Kelamin</option>
                            <option {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }} value="Laki-laki">Laki-laki
                            </option>
                            <option {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }} value="Perempuan">Perempuan
                            </option>
                        </select>
                        @error('jenis_kelamin')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="nomor_identitas_anak">Nomor Identitas Anak</label>
                        <input class="form-control @error('nomor_identitas_anak') is-invalid @enderror"
                            id="nomor_identitas_anak" name="nomor_identitas_anak" required type="text"
                            value="{{ old('nomor_identitas_anak') }}">
                        @error('nomor_identitas_anak')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="rentang_umur" class="form-label">Rentang Umur:</label>
                        <select id="rentang_umur" name="rentang_umur" class="form-control" required>
                            <option value="6-11 bulan">6-11 bulan</option>
                            <option value="1-3 tahun">1-3 tahun</option>
                            <option value="4-6 tahun">4-6 tahun</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="detail_umur" class="form-label">Detail Umur</label>
                        <input type="text" class="form-control" name="detail_umur" id="detail_umur" placeholder="Contoh 1,5 Tahun" required>
                    </div>
                    <button class="btn  btn-sm btn-primary mt-3" type="submit">Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection