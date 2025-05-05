<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use Inertia\Inertia;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $all_companies_data = Company::all(); // select * from modello company

        return Inertia::render('Companies', ["data" => $all_companies_data]);
    }

    public function getcompany2()
    {
        return Company::all();
    }
    public function fetchcompany2(string $id)
    {
        return Company::find($id);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('company/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Company::create($request->validate(['name' => ['required', 'min:5']]));
        return to_route('company.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $all_companies_data = Company::find($id)->load("drugs");
        return Inertia::render('Company', ["data" => $all_companies_data]);
    }
    public function getDrugByCompany(string $id)
    {
        $company = Company::findOrFail($id);
        return $company->drugs;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Company::find($id)->load("drugs");
        return Inertia::render("company/Edit", ["data" => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Company::find($id)->update(
            $request->validate([
                'name' => ['required', 'min:5'],
            ])
        );
        return to_route('company.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Company::findOrFail($id)->delete();
        return to_route('company.index');
    }
}
