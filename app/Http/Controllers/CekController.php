<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MealPlans;
use App\Models\DataBalita;
use App\Models\DataCek;
use Illuminate\Support\Facades\Auth;

class CekController extends Controller
{
    public function index(Request $request)
    {
        // Mendapatkan semua data balita yang terkait dengan ibu_id dari pengguna yang sedang login
        $dataBalita = DataBalita::where('ibu_id', Auth::id())->get();

        // Ambil ID balita yang dipilih dari query parameter
        $selectedBalitaId = $request->input('data_balita_id');

        if ($selectedBalitaId) {
            // Cek apakah ID balita yang dipilih ada dalam daftar data balita
            $selectedBalita = $dataBalita->firstWhere('id', $selectedBalitaId);

            if ($selectedBalita) {
                // Ambil MealPlans berdasarkan rentang_umur dari DataBalita yang dipilih
                $mealPlans = MealPlans::where('rentang_umur', $selectedBalita->rentang_umur)->get();

                // Simpan data ke dalam DataCek
                foreach ($mealPlans as $plan) {
                    DataCek::create([
                        'user_id' => $selectedBalita->id, // Menggunakan ID Balita yang dipilih
                        'rentang_umur' => $plan->rentang_umur,
                        'waktu_makan' => $plan->waktu_makan,
                        'menu' => $plan->menu,
                        'bahan_makanan' => $plan->bahan_makanan,
                    ]);
                }
            } else {
                // Jika ID balita tidak valid, kembalikan koleksi kosong
                $mealPlans = collect();
            }
        } else {
            // Jika tidak ada ID balita yang dipilih, ambil semua MealPlans berdasarkan semua rentang_umur
            $rentangUmurList = $dataBalita->pluck('rentang_umur')->unique();
            $mealPlans = MealPlans::whereIn('rentang_umur', $rentangUmurList)->get();
        }

        return view('pageweb.cek', compact('mealPlans', 'dataBalita', 'selectedBalitaId'));
    }
}
