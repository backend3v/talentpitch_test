<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Library\Services\GenerateService;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $programs = Program::all();
        return response()->json($programs, 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        Log::channel('stderr')->info($request->all());
        $keyword = $request->keyword;
        $cantity = $request->cantity;
        $custom  = new GenerateService();
        $result = $custom->get_faker($keyword,$cantity,"(name,start_date[YYYY-MM-DD],end_date[YYYY-MM-DD],location,frequency,description)","programs");
        foreach ($result as $k => $v) {
            //Log::channel('stderr')->info($v);
            Log::channel('stderr')->info("_________________________________");
            // foreach ($v as $kv => $vv) {
            //     $programs = Program::create($vv);
            // }
            $programs = Program::create($v);
        }
        return response()->json($result, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Log::channel('stderr')->info('The command was successful!');
        Log::channel('stderr')->info($request->all());
        $programs = Program::create($request->all());
        return response()->json($programs, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $program = Program::find($id);
        return response()->json($program, 200);
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Program $program)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $program=Program::find($id);
        $program->update($request->all());
        return response()->json($program, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $program = Program::find($id);
        $program->delete();
        return response()->json($program, 200);
    }
    
}
