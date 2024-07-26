<?php

namespace App\Http\Controllers;

use App\Models\Makanan;
use App\Models\KategoriMakanan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class MakananController extends Controller
{
    public function index()
    {
        $makanans = Makanan::with('kategori')->get();
        return view('pageadmin.makanan.index', compact('makanans'));
    }

    public function create()
    {
        $kategoriMakanans = KategoriMakanan::all();
        return view('pageadmin.makanan.create', compact('kategoriMakanans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'kategori_makanan_id' => 'required|exists:kategori_makanans,id',
            'komposisi_gizi' => 'required',
            'ukuran_porsi' => 'required|string|max:255',
        ]);

        Makanan::create($request->all());

        Alert::success('Berhasil', 'Makanan berhasil ditambahkan');
        return redirect()->route('makanan.index');
    }

    public function edit($id)
    {
        $makanan = Makanan::findOrFail($id);
        $kategoriMakanans = KategoriMakanan::all();
        return view('pageadmin.makanan.edit', compact('makanan', 'kategoriMakanans'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'kategori_makanan_id' => 'required|exists:kategori_makanans,id',
            'komposisi_gizi' => 'required',
            'ukuran_porsi' => 'required|string|max:255',
        ]);

        $makanan = Makanan::findOrFail($id);
        $makanan->update($request->all());

        Alert::success('Berhasil', 'Makanan berhasil diubah');
        return redirect()->route('makanan.index');
    }

    public function destroy($id)
    {
        $makanan = Makanan::findOrFail($id);
        $makanan->delete();

        Alert::success('Berhasil', 'Makanan berhasil dihapus');
        return redirect()->route('makanan.index');
    }
}
