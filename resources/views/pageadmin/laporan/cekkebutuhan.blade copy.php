@extends('template-web.layout')

@section('content')
<section class="section-padding py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-12 mt-4">
                <div class="custom-block custom-block-topics-listing bg-white shadow-lg rounded p-4">
                    <h3 class="mb-4">Data Cek Kebutuhan Balita</h3>
                    
                    @if($cekData->isEmpty())
                        <div class="alert alert-info">Tidak ada data cek yang ditemukan.</div>
                    @else
                        <table class="table table-bordered mt-3">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Nama Lengkap Balita</th>
                                    <th>Rentang Umur</th>
                                    <th>Waktu Makan</th>
                                    <th>Menu</th>
                                    <th>Bahan Makanan</th>
                                    <th>Berat</th>
                                    <th>URT</th>
                                    <th>Energi (kcal)</th>
                                    <th>Karb. Hidrat (g)</th>
                                    <th>Protein (g)</th>
                                    <th>Lemak (g)</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cekData as $cek)
                                    @php
                                        $bahanCount = count($cek->bahan_makanan);
                                    @endphp
                                    @foreach($cek->bahan_makanan as $index => $bahan)
                                        <tr>
                                            <!-- Display only once for the first item in the group -->
                                            @if($index === 0)
                                                <td rowspan="{{ $bahanCount }}">{{ $cek->dataBalita->nama_lengkap }}</td>
                                                <td rowspan="{{ $bahanCount }}">{{ $cek->rentang_umur }}</td>
                                                <td rowspan="{{ $bahanCount }}">{{ $cek->waktu_makan }}</td>
                                                <td rowspan="{{ $bahanCount }}">{{ $cek->menu }}</td>
                                            @endif
                                            <td>{{ $bahan['nama'] }}</td>
                                            <td>{{ $bahan['berat'] }}</td>
                                            <td>{{ $bahan['urt'] }}</td>
                                            <td>{{ $bahan['gizi']['e'] }}</td>
                                            <td>{{ $bahan['gizi']['kh'] }}</td>
                                            <td>{{ $bahan['gizi']['p'] }}</td>
                                            <td>{{ $bahan['gizi']['l'] }}</td>
                                            <td>{{ $bahan['keterangan'] }}</td>
                                        </tr>
                                    @endforeach
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
