<?php

namespace App\Http\Controllers;

use App\Models\KategoriMakanan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class KategoriMakananController extends Controller
{
    public function index()
    {
        $kategoriMakanans = KategoriMakanan::all();
        return view('pageadmin.kategorimakanan.index', compact('kategoriMakanans'));
    }

    public function create()
    {
        return view('pageadmin.kategorimakanan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255|unique:kategori_makanans',
        ]);

        KategoriMakanan::create($request->all());

        Alert::success('Berhasil', 'Kategori makanan berhasil ditambahkan');
        return redirect()->route('kategori_makanan.index');
    }

    public function edit($id)
    {
        $kategoriMakanan = KategoriMakanan::findOrFail($id);
        return view('pageadmin.kategorimakanan.edit', compact('kategoriMakanan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255|unique:kategori_makanans,nama,' . $id,
        ]);

        $kategoriMakanan = KategoriMakanan::findOrFail($id);
        $kategoriMakanan->update($request->all());

        Alert::success('Berhasil', 'Kategori makanan berhasil diubah');
        return redirect()->route('kategori_makanan.index');
    }

    public function destroy($id)
    {
        $kategoriMakanan = KategoriMakanan::findOrFail($id);
        $kategoriMakanan->delete();

        Alert::success('Berhasil', 'Kategori makanan berhasil dihapus');
        return redirect()->route('kategori_makanan.index');
    }
}
