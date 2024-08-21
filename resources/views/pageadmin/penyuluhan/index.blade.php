@extends('template-admin.layout')
@section('style')
    <!-- No specific CSS required for TinyMCE -->
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> Data Penyuluhan</h4>

        <div class="card">
            <h5 class="card-header">Edit Data Penyuluhan</h5>
            <div class="card-body">
                <!-- Form to create or update Penyuluhan -->
                <form action="{{ route('penyuluhan.storeOrUpdate') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="penyuluhan" class="form-label">Penyuluhan</label>
                        <textarea id="penyuluhan" name="penyuluhan" class="form-control my-editor">
                            {!! $penyuluhan->penyuluhan ?? '' !!}
                        </textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <!-- Include TinyMCE without API key -->
    <script src="https://cdn.jsdelivr.net/npm/tinymce@5/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector: 'textarea.my-editor',
            menubar: false,
            height: 300,
            plugins: [
                'advlist autolink lists link image charmap print preview anchor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table paste code help wordcount',
                'textcolor charmap'
            ],
            toolbar: 'undo redo | formatselect | bold italic forecolor backcolor | \
                      alignleft aligncenter alignright alignjustify | \
                      bullist numlist outdent indent | removeformat | charmap | help'
        });
    </script>
@endsection
