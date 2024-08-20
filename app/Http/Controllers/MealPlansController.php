<?php

namespace App\Http\Controllers;

use App\Models\MealPlans;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class MealPlansController extends Controller
{
    public function index()
    {
        $mealPlans = MealPlans::all();
        return view('pageadmin.mealplans.index', compact('mealPlans'));
    }

    public function create()
    {
        return view('pageadmin.mealplans.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'rentang_umur' => 'required|string|max:255',
            'waktu_makan' => 'required|string|max:255',
            'menu' => 'required|string|max:255',
            'bahan_makanan' => 'required|array',
            'bahan_makanan.*.nama' => 'required|string|max:255',
            'bahan_makanan.*.berat' => 'required|string',
            'bahan_makanan.*.urt' => 'required|string',
            'bahan_makanan.*.gizi.e' => 'required|string',
            'bahan_makanan.*.gizi.kh' => 'required|string',
            'bahan_makanan.*.gizi.p' => 'required|string',
            'bahan_makanan.*.gizi.l' => 'required|string',
            'bahan_makanan.*.keterangan' => 'string',
        ]);

        MealPlans::create($request->all());

        Alert::success('Success', 'Meal Plan created successfully.');
        return redirect()->route('mealplans.index');
    }

    public function edit($id)
    {
        $mealPlan = MealPlans::findOrFail($id);
        return view('pageadmin.mealplans.edit', compact('mealPlan'));
    }

    public function update(Request $request, $id)
    {
        $mealPlan = MealPlans::findOrFail($id);

        $request->validate([
            'rentang_umur' => 'required|string|max:255',
            'waktu_makan' => 'required|string|max:255',
            'menu' => 'required|string|max:255',
            'bahan_makanan' => 'required|array',
            'bahan_makanan.*.nama' => 'required|string|max:255',
            'bahan_makanan.*.berat' => 'required|string',
            'bahan_makanan.*.urt' => 'required|string',
            'bahan_makanan.*.gizi.e' => 'required|string',
            'bahan_makanan.*.gizi.kh' => 'required|string',
            'bahan_makanan.*.gizi.p' => 'required|string',
            'bahan_makanan.*.gizi.l' => 'required|string',
            'bahan_makanan.*.keterangan' => 'string',
        ]);

        $mealPlan->update($request->all());

        Alert::success('Success', 'Meal Plan updated successfully.');
        return redirect()->route('mealplans.index');
    }

    public function destroy($id)
    {
        $mealPlan = MealPlans::findOrFail($id);
        $mealPlan->delete();

        Alert::success('Success', 'Meal Plan deleted successfully.');
        return redirect()->route('mealplans.index');
    }
}
