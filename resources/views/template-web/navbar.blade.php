<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="/">
            {{-- <i class="bi-back"></i> --}}
            <span class="text-white">Nutriguide</span>
        </a>

        <div class="d-lg-none ms-auto me-4">
            <a href="#top" class="navbar-icon bi-person smoothscroll"></a>
        </div>

        {{-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button> --}}

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-lg-5 me-lg-auto">
                {{-- <li class="nav-item">
                    <a class="nav-link click-scroll" href="#section_1">Home</a>
                </li> --}}

              
            </ul>

            <div class="d-none d-lg-block">
                @if (Auth::check())
                    <!-- Jika sudah login, tampilkan tautan ke profil -->
                    <a href="/profilsaya" class="navbar-icon bi-person smoothscroll"></a>
                    <a href="/logout" class="navbar-icon bi-box-arrow-in-left smoothscroll bg-danger"></a>
                @else
                    <!-- Jika belum login, tampilkan tautan ke login -->
                    <a href="/login" class="navbar-icon bi-person smoothscroll"></a>
                @endif
            </div>
            
        </div>
    </div>
</nav>