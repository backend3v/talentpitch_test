<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Library\Services\GenerateService;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Company::all();
        return response()->json($companies, 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        Log::channel('stderr')->info("222");
        Log::channel('stderr')->info($request->all());
        $keyword = $request->keyword;
        $cantity = $request->cantity;
        $custom  = new GenerateService();
        $result = $custom->get_faker($keyword,$cantity,"(name,contact_name,contact,sector)","companies");
        foreach ($result as $k => $v) {
            $programs = Company::create($v);
        }
        return response()->json($result, 201);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $company = Company::create($request->all());
        return response()->json($company, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $company = Company::find($id);
        return response()->json($company, 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $company=Company::find($id);
        $company->update($request->all());
        return response()->json($company, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $company = Company::find($id);
        $company->delete();
        return response()->json($company, 200);
    }
}
