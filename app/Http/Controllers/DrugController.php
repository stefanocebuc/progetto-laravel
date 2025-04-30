<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Drug;
use App\Models\Company;
use App\Models\Ingredient;
use Inertia\Inertia;

class DrugController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $all_drugs_data = Drug::all();
        return Inertia::render('Drugs', ["data" => $all_drugs_data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $all_companies = Company::all();
        $all_active_ingredients = Ingredient::all();
        return Inertia::render('drug/CreateDrug', ["companies" => $all_companies, "active_ingredient" => $all_active_ingredients]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Drug::create($request->validate([
            'name' => ['required', 'min:5'],
            'minsan_code' => ['required', 'min:6'],
            'description' => ['required', 'min:5'],
            'expiration_date' => ['required'],
            'price' => ['required'],
            'company_id' => ['required'],
            'active_ingredient_id' => ['required']
        ]));
        return to_route('drugs.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $all_drugs_data = Drug::find($id);
        return Inertia::render('Drug', ["data" => $all_drugs_data]);
    }

    public function getCompanyByDrug(string $id)
    {
        $drug = Drug::findOrFail($id);
        return $drug->company;
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Drug::find($id);
        return Inertia::render("drug/EditDrug", ["data" => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Drug::find($id)->update(
            $request->validate([
                'name' => ['required', 'min:5'],
                'minsan_code' => ['required', 'min:6'],
                'description' => ['required', 'min:5'],
                'expiration_date' => ['required'],
                'price' => ['required'],
            ])
        );
        return to_route('drugs.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Drug::findOrFail($id)->delete();
        return to_route('drugs.index');
    }
}
