<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Challenge;
use Illuminate\Http\Request;

class ChallengeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $challenges = Challenge::all();
        return response()->json($challenges, 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Log::channel('stderr')->info($request->all());
        $keyword = $request->keyword;
        $cantity = $request->cantity;
        $custom  = new GenerateService();
        $result = $custome->get_faker($keyword,$cantity,"(name,level[low,medium,high],description)","challenges");
        foreach ($result as $k => $v) {
            $programs = Program::create($v);
        }
        return response()->json($result, 201);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $challenge = Challenge::create($request->all());
        return response()->json($challenge, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $challenge = Challenge::find($id);
        return response()->json($challenge, 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Challenge $challenge)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $challenge=Challenge::find($id);
        $challenge->update($request->all());
        return response()->json($challenge, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $challenge = Challenge::find($id);
        $challenge->delete();
        return response()->json($challenge, 200);
    }
}
