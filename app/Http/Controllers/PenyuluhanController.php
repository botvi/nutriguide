<?php

namespace App\Http\Controllers;

use App\Models\Penyuluhan;
use Illuminate\Http\Request;

class PenyuluhanController extends Controller
{
    public function index()
    {
        $penyuluhan = Penyuluhan::first(); // Fetch the first (and only) record
        return view('pageadmin.penyuluhan.index', compact('penyuluhan'));
    }

    public function storeOrUpdate(Request $request)
    {
        $request->validate([
            'penyuluhan' => 'required'
        ]);

        // Update or create the first (and only) record
        Penyuluhan::updateOrCreate(
            ['id' => 1], // Assuming there is only one record with ID 1
            ['penyuluhan' => $request->penyuluhan]
        );

        return redirect()->back()->with('success', 'Data penyuluhan berhasil disimpan atau diperbarui.');
    }

    public function showPenyuluhan()
    {
        // Get the first penyuluhan record from the database
        $penyuluhan = Penyuluhan::first();

        // Pass the penyuluhan data to the view
        return view('pageweb.penyuluhan', compact('penyuluhan'));
    }
}
