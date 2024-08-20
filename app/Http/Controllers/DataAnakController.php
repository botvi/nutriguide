<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataBalita;
use App\Models\IbuBalita;
use RealRashid\SweetAlert\Facades\Alert;

class DataAnakController extends Controller
{
    public function index()
    {
        $anaks = DataBalita::with('ibu')->get();
        return view('pageadmin.databalita.index', compact('anaks'));
    }

    public function tambah()
    {
        $orangTuas = IbuBalita::all();
        return view('pageadmin.databalita.create', compact('orangTuas'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'ibu_id' => 'required',
            'nama_lengkap' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|string|max:255',
            'nomor_identitas_anak' => 'required|string|max:255|unique:data_balitas,nomor_identitas_anak',
            'rentang_umur' => 'required|string|max:255',
            'detail_umur' => 'required|string|max:255',
        ]);

        DataBalita::create($validatedData);

        Alert::success('Berhasil', 'Data anak berhasil disimpan');
        return redirect()->route('anak.index');
    }

    public function edit($id)
    {
        $anak = DataBalita::findOrFail($id);
        $orangTuas = IbuBalita::all();
        return view('pageadmin.databalita.edit', compact('anak', 'orangTuas'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'ibu_id' => 'required',
            'nama_lengkap' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|string|max:255',
            'nomor_identitas_anak' => 'required|string|max:255|unique:data_balitas,nomor_identitas_anak,'.$id,
            'rentang_umur' => 'required|string|max:255',
            'detail_umur' => 'required|string|max:255',
        ]);

        $anak = DataBalita::findOrFail($id);
        $anak->update($validatedData);

        Alert::success('Berhasil', 'Data anak berhasil diupdate');
        return redirect()->route('anak.index');
    }

    public function destroy($id)
    {
        $anak = DataBalita::findOrFail($id);
        $anak->delete();

        Alert::success('Berhasil', 'Data anak berhasil dihapus');
        return redirect()->route('anak.index');
    }
}
