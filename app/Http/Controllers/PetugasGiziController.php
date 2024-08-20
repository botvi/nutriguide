<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PetugasGizi;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\File;

class PetugasGiziController extends Controller
{
    public function index()
    {
        $dataPetugas = PetugasGizi::with('user')->get();
        return view('pageadmin.datapetugas.index', compact('dataPetugas'));
    }

    public function create()
    {
        return view('pageadmin.datapetugas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nip' => 'required|string|max:255|unique:petugas_gizis',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // validasi foto dengan ekstensi dan ukuran maksimum
            'jabatan' => 'required|string|max:255',
            'pendidikan_terakhir' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);
    
        // Simpan user baru
        $user = User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'role' => 'petugas',
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
        PetugasGizi::create([
            'nama' => $request->nama,
            'nip' => $request->nip,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat' => $request->alamat,
            'foto' => $fotoPath, // bisa null jika tidak ada foto yang diupload
            'jabatan' => $request->jabatan,
            'pendidikan_terakhir' => $request->pendidikan_terakhir,
            'user_id' => $user->id,
        ]);
    
        Alert::success('Success', 'Data Petugas berhasil ditambahkan');
        return redirect('/data-petugas');
    }
    

    public function edit($id)
    {
        $dataPetugas = PetugasGizi::findOrFail($id);
        return view('pageadmin.datapetugas.edit', compact('dataPetugas'));
    }

    public function update(Request $request, $id)
    {
        $dataPetugas = PetugasGizi::findOrFail($id);
        $user = User::findOrFail($dataPetugas->user_id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'nip' => 'required|string|max:255|unique:petugas_gizis,nip,' . $id,
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // foto opsional dengan validasi tambahan
            'jabatan' => 'required|string|max:255',
            'pendidikan_terakhir' => 'required|string|max:255',
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
            if (File::exists(public_path($dataPetugas->foto))) {
                File::delete(public_path($dataPetugas->foto));
            }

            $dataPetugas->foto = $fotoPath;
        }

        // Update informasi user
        $user->update([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => $request->password ? bcrypt($request->password) : $user->password,
        ]);

        // Update informasi data guru
        $dataPetugas->update([
            'nama' => $request->nama,
            'nip' => $request->nip,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat' => $request->alamat,
            'jabatan' => $request->jabatan,
            'pendidikan_terakhir' => $request->pendidikan_terakhir,
        ]);

        Alert::success('Success', 'Data Petugas berhasil diperbarui');
        return redirect('/data-petugas');
    }

    public function destroy($id)
    {
        $dataPetugas = PetugasGizi::findOrFail($id);
        $user = User::findOrFail($dataPetugas->user_id);

        // Hapus foto dari storage
        if (File::exists(public_path($dataPetugas->foto))) {
            File::delete(public_path($dataPetugas->foto));
        }

        // Hapus data guru dan user
        $dataPetugas->delete();
        $user->delete();

        Alert::success('Success', 'Data Petugas berhasil dihapus');
        return redirect('/data-petugas');
    }
}