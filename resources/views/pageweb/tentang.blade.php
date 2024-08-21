@extends('template-web.layout')

@section('content')
<section class="hero-section d-flex justify-content-center align-items-center text-center" id="section_1">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-12 mx-auto">
                <h1 class="text-white mb-3">Tentang Penyuluhan Gizi</h1>
                <p class="text-white">Kami berdedikasi untuk meningkatkan pengetahuan tentang gizi dan kesehatan melalui program penyuluhan yang menyeluruh.</p>
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
                        <h4 class="card-title">Apa itu Penyuluhan Gizi?</h4>
                        <p class="card-text">
                            Penyuluhan gizi adalah proses edukasi dan informasi yang diberikan kepada individu atau kelompok untuk meningkatkan pengetahuan mereka tentang prinsip-prinsip gizi dan kesehatan. Tujuan utama dari penyuluhan gizi adalah untuk mempromosikan pola makan sehat dan gaya hidup yang dapat mengurangi risiko penyakit dan meningkatkan kualitas hidup.
                        </p>
                        <h5 class="mt-4">Tujuan Penyuluhan Gizi</h5>
                        <ul>
                            <li>Meningkatkan kesadaran tentang pentingnya pola makan seimbang.</li>
                            <li>Memberikan informasi tentang kebutuhan gizi khusus untuk berbagai kelompok usia.</li>
                            <li>Membantu mengidentifikasi dan mengatasi masalah gizi dalam masyarakat.</li>
                            <li>Menawarkan dukungan dan saran praktis untuk penerapan kebiasaan makan yang sehat.</li>
                        </ul>
                        <h5 class="mt-4">Metode Penyuluhan</h5>
                        <p class="card-text">
                            Penyuluhan gizi dapat dilakukan melalui berbagai metode, termasuk seminar, lokakarya, konsultasi pribadi, dan bahan edukasi seperti brosur dan panduan online. Kami juga menggunakan media sosial dan platform digital untuk menjangkau audiens yang lebih luas dan memberikan informasi yang relevan dan terkini.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
