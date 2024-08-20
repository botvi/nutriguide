@extends('template-web.layout')

@section('content')
<header class="site-header d-flex flex-column justify-content-center align-items-center">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5 col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Homepage</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Cek Kebutuhan Balita Anda</li>
                    </ol>
                </nav>
                <h2 class="text-white">Cek Kebutuhan Balita Anda</h2>
            </div>
        </div>
    </div>
</header>

<section class="section-padding py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-12 mt-4">
                <div class="custom-block custom-block-topics-listing bg-white shadow-lg rounded p-4">
                    <!-- Check if there are any balita data -->
                    @if($dataBalita->isEmpty())
                        <div class="alert alert-info">
                            Anda tidak mendaftarkan balita Anda. Silakan tambahkan data balita terlebih dahulu.
                        </div>
                        <a href="/profil/tambah-data" class="btn btn-sm btn-success">Tambah Anak</a>
                    @else
                        <!-- Filter Form -->
                        <form method="GET" action="{{ route('cek.index') }}" class="mb-4">
                            <div class="form-group">
                                <label for="dataBalita">Pilih Balita:</label>
                                <select name="data_balita_id" id="dataBalita" class="form-control">
                                    @foreach($dataBalita as $balita)
                                        <option value="{{ $balita->id }}" {{ $balita->id == $selectedBalitaId ? 'selected' : '' }}>
                                            {{ $balita->nama_lengkap }} - {{ $balita->rentang_umur }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary mt-2">CEK</button>
                        </form>
                    @endif

                    <!-- Display Meal Plans -->
                    @if($mealPlans->isEmpty() && !$dataBalita->isEmpty())
                        <div class="alert alert-info">
                            Data Menu Makanan untuk rentang umur balita tidak ditemukan.
                        </div>
                    @else
                        @if(!$dataBalita->isEmpty())
                            <table class="table table-bordered mt-3">
                                <thead class="thead-dark">
                                    <tr>
                                        <th rowspan="2">Rentang Umur</th>
                                        <th rowspan="2">Waktu Makan</th>
                                        <th rowspan="2">Menu</th>
                                        <th rowspan="2">Bahan Makanan</th>
                                        <th rowspan="2">Berat</th>
                                        <th rowspan="2">URT</th>
                                        <th colspan="4" class="text-center">Nilai Gizi</th>
                                        <th rowspan="2">Keterangan</th>
                                    </tr>
                                    <tr>
                                        <th>Energi (kcal)</th>
                                        <th>Karb. Hidrat (g)</th>
                                        <th>Protein (g)</th>
                                        <th>Lemak (g)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($mealPlans as $plan)
                                        @php
                                            $bahanCount = count($plan->bahan_makanan);
                                        @endphp
                                        @foreach($plan->bahan_makanan as $index => $bahan)
                                            <tr>
                                                <!-- Display only once for the first item in the group -->
                                                @if($index === 0)
                                                    <td rowspan="{{ $bahanCount }}">{{ $plan->rentang_umur }}</td>
                                                    <td rowspan="{{ $bahanCount }}">{{ $plan->waktu_makan }}</td>
                                                    <td rowspan="{{ $bahanCount }}">{{ $plan->menu }}</td>
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
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
