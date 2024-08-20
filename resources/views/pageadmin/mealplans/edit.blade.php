@extends('template-admin.layout')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Data Meal Plans /</span> Edit</h4>

        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Edit Data Meal Plans</h5>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('mealplans.update', $mealPlan->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="rentang_umur" class="form-label">Rentang Umur:</label>
                                <select id="rentang_umur" name="rentang_umur" class="form-control" required>
                                    <option value="6-11 bulan" {{ $mealPlan->rentang_umur == '6-11 bulan' ? 'selected' : '' }}>6-11 bulan</option>
                                    <option value="1-3 tahun" {{ $mealPlan->rentang_umur == '1-3 tahun' ? 'selected' : '' }}>1-3 tahun</option>
                                    <option value="4-6 tahun" {{ $mealPlan->rentang_umur == '4-6 tahun' ? 'selected' : '' }}>4-6 tahun</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="waktu_makan" class="form-label">Waktu Makan</label>
                                <input type="text" class="form-control" name="waktu_makan" id="waktu_makan" value="{{ $mealPlan->waktu_makan }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="menu" class="form-label">Menu</label>
                                <input type="text" class="form-control" name="menu" id="menu" value="{{ $mealPlan->menu }}" required>
                            </div>
                            <div id="bahan-makanan-container">
                                @foreach ($mealPlan->bahan_makanan as $index => $bahan)
                                    <div class="bahan-makanan-item mb-3">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label class="form-label">Bahan Makanan</label>
                                                <input type="text" class="form-control mb-2" name="bahan_makanan[{{ $index }}][nama]" value="{{ $bahan['nama'] }}" placeholder="Nama" required>
                                                <input type="text" class="form-control mb-2" name="bahan_makanan[{{ $index }}][berat]" value="{{ $bahan['berat'] }}" placeholder="Berat" required>
                                                <input type="text" class="form-control mb-2" name="bahan_makanan[{{ $index }}][urt]" value="{{ $bahan['urt'] }}" placeholder="URT" required>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label">Gizi</label>
                                                <input type="text" class="form-control mb-2" name="bahan_makanan[{{ $index }}][gizi][e]" value="{{ $bahan['gizi']['e'] }}" placeholder="Energi" required>
                                                <input type="text" class="form-control mb-2" name="bahan_makanan[{{ $index }}][gizi][kh]" value="{{ $bahan['gizi']['kh'] }}" placeholder="Karbohidrat" required>
                                                <input type="text" class="form-control mb-2" name="bahan_makanan[{{ $index }}][gizi][p]" value="{{ $bahan['gizi']['p'] }}" placeholder="Protein" required>
                                                <input type="text" class="form-control mb-2" name="bahan_makanan[{{ $index }}][gizi][l]" value="{{ $bahan['gizi']['l'] }}" placeholder="Lemak" required>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label">Keterangan (Opsional)</label>
                                                <input type="text" class="form-control mb-2" name="bahan_makanan[{{ $index }}][keterangan]" value="{{ $bahan['keterangan'] }}" placeholder="Keterangan (Opsional)">
                                                <button type="button" class="btn btn-danger btn-sm mt-2 delete-bahan-makanan">Hapus</button>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <button type="button" id="add-bahan-makanan" class="btn btn-success">Tambah Form Bahan Makanan</button>
                            <div class="mb-3 text-end">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let bahanMakananIndex = {{ count($mealPlan->bahan_makanan) }};

            document.getElementById('add-bahan-makanan').addEventListener('click', function() {
                const container = document.getElementById('bahan-makanan-container');
                const newItem = document.createElement('div');
                newItem.className = 'bahan-makanan-item mb-3';
                newItem.innerHTML = `
                    <div class="row">
                        <div class="col-md-4">
                            <label class="form-label">Bahan Makanan</label>
                            <input type="text" class="form-control mb-2" name="bahan_makanan[${bahanMakananIndex}][nama]" placeholder="Nama" required>
                            <input type="text" class="form-control mb-2" name="bahan_makanan[${bahanMakananIndex}][berat]" placeholder="Berat" required>
                            <input type="text" class="form-control mb-2" name="bahan_makanan[${bahanMakananIndex}][urt]" placeholder="URT" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Gizi</label>
                            <input type="text" class="form-control mb-2" name="bahan_makanan[${bahanMakananIndex}][gizi][e]" placeholder="Energi" required>
                            <input type="text" class="form-control mb-2" name="bahan_makanan[${bahanMakananIndex}][gizi][kh]" placeholder="Karbohidrat" required>
                            <input type="text" class="form-control mb-2" name="bahan_makanan[${bahanMakananIndex}][gizi][p]" placeholder="Protein" required>
                            <input type="text" class="form-control mb-2" name="bahan_makanan[${bahanMakananIndex}][gizi][l]" placeholder="Lemak" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Keterangan (Opsional)</label>
                            <input type="text" class="form-control mb-2" name="bahan_makanan[${bahanMakananIndex}][keterangan]" placeholder="Keterangan (Opsional)">
                            <button type="button" class="btn btn-danger btn-sm mt-2 delete-bahan-makanan">Hapus</button>
                        </div>
                    </div>
                `;
                container.appendChild(newItem);
                bahanMakananIndex++;
            });

            document.getElementById('bahan-makanan-container').addEventListener('click', function(event) {
                if (event.target.classList.contains('delete-bahan-makanan')) {
                    event.target.closest('.bahan-makanan-item').remove();
                }
            });
        });
    </script>
@endsection
