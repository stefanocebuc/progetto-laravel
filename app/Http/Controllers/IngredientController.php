<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ingredient;
use App\Models\Drug;
use App\Models\Company;
use Inertia\Inertia;

class IngredientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $all_ingredients_data = Ingredient::all();
        return Inertia::render('Ingredients', ["data" => $all_ingredients_data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('active_ingredients/CreateIngredient');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Ingredient::create($request->validate(['atc_code' => ['required', 'min:5'], 'main_ingredient' => ['required', 'min:5'], 'description' => ['required', 'min:5']]));
        return to_route('ingredients.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $all_ingredients_data = Ingredient::find($id)->load("drugs");
        return Inertia::render('Ingredient', ["data" => $all_ingredients_data]);
    }

    public function getDrugbyIngredient(string $id)
    {
        $ingredient = Ingredient::findOrFail($id);
        return $ingredient->drugs;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Ingredient::find($id)->load("drugs");
        return Inertia::render("active_ingredients/EditIngredient", ["data" => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Ingredient::find($id)->update(
            $request->validate([
                'atc_code' => ['required', 'min:5'],
                'main_ingredient' => ['required', 'min:5'],
                'description' => ['required', 'min:5']
            ])
        );
        return to_route('ingredients.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Ingredient::findOrFail($id)->delete();
        return to_route('ingredients.index');
    }
}
