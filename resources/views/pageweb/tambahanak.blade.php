@extends('template-web.layout')
@section('content')
<section class="hero-section d-flex justify-content-center align-items-center" id="section_1">
    <div class="container">
        <div class="row">

            <div class="col-lg-8 col-12 mx-auto">
                <h1 class="text-white text-center">Tambah Data Anak</h1>

               
            </div>

        </div>
    </div>
</section>


<section class="featured-section">
    <div class="container">
        <div class="row justify-content-center">

          
            <div class="col-lg-12 col-12">
                <form action="{{ route('profil.tambahData') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="nama_lengkap">Nama Lengkap Anak:</label>
                        <input type="text" name="nama_lengkap" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="tanggal_lahir">Tanggal Lahir:</label>
                        <input type="date" name="tanggal_lahir" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin:</label>
                        <select name="jenis_kelamin" class="form-control" required>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nomor_identitas_anak">Nomor Identitas Anak:</label>
                        <input type="text" name="nomor_identitas_anak" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="rentang_umur" class="form-label">Rentang Umur:</label>
                        <select id="rentang_umur" name="rentang_umur" class="form-control" required>
                            <option value="6-11 bulan">6-11 bulan</option>
                            <option value="1-3 tahun">1-3 tahun</option>
                            <option value="4-6 tahun">4-6 tahun</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="detail_umur">Detail Umur:</label>
                        <input type="text" name="detail_umur" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary mt-5">Tambah Data</button>
                </form>
                
            </div>

        </div>
    </div>
</section>

@endsection