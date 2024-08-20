@extends('template-admin.layout')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> Data Meal Plans</h4>

    <div class="mb-3">
        <a href="{{ route('mealplans.create') }}" class="btn btn-sm btn-primary">Tambah Data Meal Plans</a>
    </div>

    <div class="card">
        <h5 class="card-header">Data Meal Plans</h5>
        <div class="table-responsive text-nowrap p-4">
            <table id="example" class="display compact nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>Rentang Umur</th>
                        <th>Waktu Makan</th>
                        <th>Menu</th>
                        <th>Bahan makanan & Nilai Gizi</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($mealPlans as $mealPlan)
                    <tr>
                        <td>{{ $mealPlan->rentang_umur }}</td>
                        <td>{{ $mealPlan->waktu_makan }}</td>
                        <td>{{ $mealPlan->menu }}</td>
                        <td><button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#modalMenu{{$mealPlan->id}}">
                            Lihat
                        </button></td>
                        <td>
                            <a href="{{ route('mealplans.edit', $mealPlan) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('mealplans.destroy', $mealPlan) }}" method="POST" class="d-inline delete-form">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                            <!-- Button to trigger the modal -->
                            
                        </td>
                    </tr>

                    <!-- Modal for Menu Details -->
                    <div class="modal fade" id="modalMenu{{$mealPlan->id}}" tabindex="-1" aria-labelledby="modalMenuLabel{{$mealPlan->id}}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalMenuLabel{{$mealPlan->id}}">Menu Details: {{ $mealPlan->menu }}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <ul class="list-unstyled">
                                        @foreach($mealPlan->bahan_makanan as $bahan)
                                            <li class="mb-3">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div>
                                                        <strong>{{ $bahan['nama'] }}</strong>
                                                        <div>Berat: {{ $bahan['berat'] }}</div>
                                                        <div>URT: {{ $bahan['urt'] }}</div>
                                                    </div>
                                                    <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#modalGizi{{$mealPlan->id}}{{ $loop->index }}">
                                                        Lihat Nilai Gizi
                                                    </button>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Nested Modal for Nutritional Values -->
                    @foreach($mealPlan->bahan_makanan as $bahan)
                    <div class="modal fade" id="modalGizi{{$mealPlan->id}}{{ $loop->index }}" tabindex="-1" aria-labelledby="modalGiziLabel{{$mealPlan->id}}{{ $loop->index }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalGiziLabel{{$mealPlan->id}}{{ $loop->index }}">Nutritional Values: {{ $bahan['nama'] }}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p>E (kkal): {{ $bahan['gizi']['e'] }}</p>
                                    <p>KH (gram): {{ $bahan['gizi']['kh'] }}</p>
                                    <p>P (gram): {{ $bahan['gizi']['p'] }}</p>
                                    <p>L (gram): {{ $bahan['gizi']['l'] }}</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('script')
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
