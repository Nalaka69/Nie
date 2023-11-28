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
    public function programsSingle(Request $request, $_date)
    {
        $_date = $_date;
        // $selectedDate = $request->input('selectedDate');
        $programs = Program::whereDate('episode_date', $_date)
            ->select('id', 'program_name', 'episode', 'program_file')
            ->get();
        return response()->json(['programs_single' => $programs]);
    }
}
