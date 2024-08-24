<?php

namespace App\Http\Controllers;

use App\Models\IbuBalita;
use App\Models\DataCek;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        // Mengambil semua data ibu balita beserta data balita yang terkait
        $ibuBalitas = IbuBalita::with('dataBalitas')->get();

        // Menampilkan laporan
        return view('pageadmin.laporan.laporan', compact('ibuBalitas'));
    }

    public function showCekData()
{
    // Retrieve DataCek with the corresponding DataBalita
    $cekData = DataCek::with(['dataBalita'])->get();

    return view('pageadmin.laporan.cekkebutuhan', compact('cekData'));
}

}
