@extends('template-web.layout')

@section('content')
<section class="hero-section d-flex justify-content-center align-items-center text-center" id="section_1">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-12 mx-auto">
                <h1 class="text-white mb-3">Penyuluhan</h1>
                <h6 class="text-white mb-4">
                    Kegiatan mendidik sesuatu kepada individu ataupun kelompok, memberi pengetahuan dan informasi-informasi.
                </h6>
            </div>
        </div>
    </div>
</section>

<section class="content-section py-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Card for displaying penyuluhan data -->
                <div class="card shadow-sm border-light">
                    <div class="card-body">
                        @if(!empty($penyuluhan) && !empty($penyuluhan->penyuluhan))
                            {!! $penyuluhan->penyuluhan !!}
                        @else
                            <p class="text-muted text-center">Tidak ada data penyuluhan tersedia.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
