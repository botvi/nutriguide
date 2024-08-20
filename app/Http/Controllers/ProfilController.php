<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataBalita;
use App\Models\IbuBalita;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class ProfilController extends Controller
{

    public function index()
    {
        // Mendapatkan data IbuBalita berdasarkan user yang sedang login
        $ibu = IbuBalita::where('user_id', Auth::id())->first();

        // Mendapatkan data DataBalita berdasarkan ibu_id yang ditemukan dari IbuBalita
        $dataBalita = DataBalita::where('ibu_id', Auth::id())->get();


        return view('pageweb.profil', compact('ibu', 'dataBalita'));
    }

    
    public function tambahanak()
    {
        return view('pageweb.tambahanak');
    }
    public function tambahData(Request $request)
{
    $request->validate([
        'nama_lengkap' => 'required|string|max:255',
        'tanggal_lahir' => 'required|date',
        'jenis_kelamin' => 'required|string|max:20',
        'nomor_identitas_anak' => 'required|string|max:50',
        'rentang_umur' => 'required|string|max:50',
        'detail_umur' => 'required|string|max:50',
    ]);

    $ibuId = Auth::id();

    DataBalita::create([
        'ibu_id' => $ibuId,
        'nama_lengkap' => $request->nama_lengkap,
        'tanggal_lahir' => $request->tanggal_lahir,
        'jenis_kelamin' => $request->jenis_kelamin,
        'nomor_identitas_anak' => $request->nomor_identitas_anak,
        'rentang_umur' => $request->rentang_umur,
        'detail_umur' => $request->detail_umur,
    ]);

    // Menampilkan notifikasi SweetAlert
    Alert::success('Success', 'Data Balita berhasil ditambahkan');

    // Redirect ke route profil
    return redirect()->route('profil');
}

}
