<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Program;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function programsList()
    {
        $programs_list = Program::select('id', 'program_name', 'episode', 'program_file', 'episode_date', 'episode_time')
            ->get();
        return response()->json(['programs_list' => $programs_list]);
    }
    public function programsDateFiltered(Request $request, $_date)
    {
        $programs_filtered = Program::whereDate('episode_date', $_date)
            ->select('id', 'program_name', 'episode', 'program_file')
            ->get();
        return response()->json(['program_filtereds' => $program_filtereds]);
    }
    public function programSingle(Request $request, $_id)
    {
        $program_single = Program::findOrFail($_id);
        return response()->json(['program_single' => $program_single]);
    }
}
