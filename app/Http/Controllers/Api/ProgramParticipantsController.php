<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Program_participants;
use App\Models\Program;
use Illuminate\Http\Request;

class ProgramParticipantsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $program_participants = Program_participants::all();
        return response()->json($program_participants, 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $program_participants = Program_participants::create($request->all());
        return response()->json($program_participants, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $new_values = array();
        $program = Program::find($id);
        if ($program == null){
            return response()->json([
                'participants' => $new_values
            ], 200);
        }
        $programs = $program->participants;
        foreach ($programs as &$value) {
            $new_value = $value->user->first();
            if($new_value != NULL){
                $new_value->participant_type = $value->type;
                array_push($new_values,$new_value);
            }
            
        }
        return response()->json([
            'participants' => $new_values
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Program_participants $program_participants)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $program_participants=Program_participants::find($id);
        $program_participants->update($request->all());
        return response()->json($program_participants, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $program_participants = Program_participants::find($id);
        $program_participants->delete();
        return response()->json($program_participants, 200);
    }
}
