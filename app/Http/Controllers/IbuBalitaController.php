<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IbuBalita;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\File;

class IbuBalitaController extends Controller
{
    public function index()
    {
        $dataIbu = IbuBalita::with('user')->get();
        return view('pageadmin.dataibu.index', compact('dataIbu'));
    }

    public function create()
    {
        return view('pageadmin.dataibu.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nip' => 'required|string|max:255|unique:ibu_balitas',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // validasi foto dengan ekstensi dan ukuran maksimum
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);
    
        // Simpan user baru
        $user = User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'role' => 'user',
            'password' => bcrypt($request->password),
        ]);
    
        // Upload foto jika ada
        $fotoPath = null;
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $imageName = time() . '.' . $foto->getClientOriginalExtension();
            $fotoPath = 'profil/' . $imageName;
            $foto->move(public_path('profil'), $imageName);
        }
    
        // Simpan data guru baru
        IbuBalita::create([
            'nama' => $request->nama,
            'nip' => $request->nip,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat' => $request->alamat,
            'foto' => $fotoPath, // bisa null jika tidak ada foto yang diupload

            'user_id' => $user->id,
        ]);
    
        Alert::success('Success', 'Data Ibu Balita berhasil ditambahkan');
        return redirect('/data-ibu');
    }
    

    public function edit($id)
    {
        $dataIbu = IbuBalita::findOrFail($id);
        return view('pageadmin.dataibu.edit', compact('dataIbu'));
    }

    public function update(Request $request, $id)
    {
        $dataIbu = IbuBalita::findOrFail($id);
        $user = User::findOrFail($dataIbu->user_id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'nip' => 'required|string|max:255|unique:ibu_balitas,nip,' . $id,
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // foto opsional dengan validasi tambahan

            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        // Update foto jika ada
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $imageName = time() . '.' . $foto->getClientOriginalExtension();
            $fotoPath = 'profil/' . $imageName;
            $foto->move(public_path('profil'), $imageName);

            // Hapus foto lama
            if (File::exists(public_path($dataIbu->foto))) {
                File::delete(public_path($dataIbu->foto));
            }

            $dataIbu->foto = $fotoPath;
        }

        // Update informasi user
        $user->update([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => $request->password ? bcrypt($request->password) : $user->password,
        ]);

        // Update informasi data guru
        $dataIbu->update([
            'nama' => $request->nama,
            'nip' => $request->nip,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat' => $request->alamat,

        ]);

        Alert::success('Success', 'Data Ibu Balita berhasil diperbarui');
        return redirect('/data-ibu');
    }

    public function destroy($id)
    {
        $dataIbu = IbuBalita::findOrFail($id);
        $user = User::findOrFail($dataIbu->user_id);

        // Hapus foto dari storage
        if (File::exists(public_path($dataIbu->foto))) {
            File::delete(public_path($dataIbu->foto));
        }

        // Hapus data guru dan user
        $dataIbu->delete();
        $user->delete();

        Alert::success('Success', 'Data Ibu Balita berhasil dihapus');
        return redirect('/data-ibu');
    }
}