<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    DashboardController,
    DataAnakController,
    IbuBalitaController,
    LoginController,
    RegisterController,
    PetugasGiziController,
    MealPlansController,
    WebController,
    ProfilController,
    CekController
};
use App\Models\DataAnak;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register'])->name('register.post');


// ADMIN
Route::group(['middleware' => ['role:admin']], function () {
    
Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');
    



Route::get('/data-petugas', [PetugasGiziController::class, 'index']);
Route::get('/data-petugas/create', [PetugasGiziController::class, 'create']);
Route::post('/data-petugas', [PetugasGiziController::class, 'store']);
Route::get('/data-petugas/{id}/edit', [PetugasGiziController::class, 'edit']);
Route::put('/data-petugas/{id}', [PetugasGiziController::class, 'update']);
Route::delete('/data-petugas/{id}', [PetugasGiziController::class, 'destroy']);


Route::get('/data-ibu', [IbuBalitaController::class, 'index']);
Route::get('/data-ibu/create', [IbuBalitaController::class, 'create']);
Route::post('/data-ibu', [IbuBalitaController::class, 'store']);
Route::get('/data-ibu/{id}/edit', [IbuBalitaController::class, 'edit']);
Route::put('/data-ibu/{id}', [IbuBalitaController::class, 'update']);
Route::delete('/data-ibu/{id}', [IbuBalitaController::class, 'destroy']);


Route::get('/anak', [DataAnakController::class, 'index'])->name('anak.index');
Route::get('/anak/tambah', [DataAnakController::class, 'tambah'])->name('anak.tambah');
Route::post('/anak', [DataAnakController::class, 'store'])->name('anak.store');
Route::get('/anak/{id}/edit', [DataAnakController::class, 'edit'])->name('anak.edit');
Route::put('/anak/{id}', [DataAnakController::class, 'update'])->name('anak.update');
Route::delete('/anak/{id}', [DataAnakController::class, 'destroy'])->name('anak.destroy');

Route::resource('mealplans', MealPlansController::class);

});
// ADMIN


// WEB

Route::get('/', [WebController::class, 'index'])->name('home');


Route::group(['middleware' => ['role:user']], function () {
Route::get('/profilsaya', [ProfilController::class, 'index'])->name('profil');
Route::get('/profil/tambah-data', [ProfilController::class, 'tambahanak']);
Route::post('/profil/tambah-data', [ProfilController::class, 'tambahData'])->name('profil.tambahData');

// Rute untuk menampilkan halaman cek kebutuhan balita
Route::get('/cek', [CekController::class, 'index'])->name('cek.index');

// Rute untuk memfilter data berdasarkan balita yang dipilih
Route::get('/cek/filter', [CekController::class, 'filter'])->name('cek.filter');
});



// WEB