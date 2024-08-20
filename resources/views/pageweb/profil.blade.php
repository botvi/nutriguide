@extends('template-web.layout')

@section('content')
<section class="hero-section d-flex justify-content-center align-items-center" id="section_1">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-12 mx-auto">
                <h1 class="text-white text-center">Profil</h1>
            </div>
        </div>
    </div>
</section>

<section class="featured-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12 col-12">
                @if($ibu)
                    <div class="card mb-3">
                        <div class="card-header">
                            <h3>Profil Ibu</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered">
                                    <tr>
                                        <th>Nama</th>
                                        <td>{{ $ibu->nama }}</td>
                                    </tr>
                                    <tr>
                                        <th>NIP</th>
                                        <td>{{ $ibu->nip }}</td>
                                    </tr>
                                    <tr>
                                        <th>Tanggal Lahir</th>
                                        <td>{{ $ibu->tanggal_lahir }}</td>
                                    </tr>
                                    <tr>
                                        <th>Alamat</th>
                                        <td>{{ $ibu->alamat }}</td>
                                    </tr>
                                    @if($ibu->foto)
                                    <tr>
                                        <th>Foto</th>
                                        <td><img src="{{ asset($ibu->foto) }}" alt="Foto Profil" width="150"></td>
                                    </tr>
                                    @endif
                                </table>
                            </div>
                        </div>
                        
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h3>Data Balita</h3>
                            <a href="/profil/tambah-data" class="btn btn-sm btn-success">Tambah Anak</a>
                        </div>
                        <div class="card-body">
                            @if($dataBalita->isEmpty())
                                <p>Tidak ada data balita yang tersedia.</p>
                            @else
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Nama Lengkap</th>
                                                <th>Tanggal Lahir</th>
                                                <th>Jenis Kelamin</th>
                                                <th>Nomor Identitas Anak</th>
                                                <th>Rentang Umur</th>
                                                <th>Detail Umur</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($dataBalita as $balita)
                                                <tr>
                                                    <td>{{ $balita->nama_lengkap }}</td>
                                                    <td>{{ $balita->tanggal_lahir }}</td>
                                                    <td>{{ $balita->jenis_kelamin }}</td>
                                                    <td>{{ $balita->nomor_identitas_anak }}</td>
                                                    <td>{{ $balita->rentang_umur }}</td>
                                                    <td>{{ $balita->detail_umur }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @endif
                        </div>
                    </div>
                @else
                    <p>Tidak ada data profil yang tersedia.</p>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection
