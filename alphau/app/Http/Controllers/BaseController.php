<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function index()
    {
        return view('app.welcome.index');
    }
    public function programs()
    {
        $programs_list = Program::select('id', 'program_name', 'episode', 'program_file', 'episode_date', 'episode_time')
            ->get();
        // return response()->json(['programs_list' => $programs_list]);

        return view('app.welcome.programs', compact('programs_list'));
    }
    public function welcomeProgramsList(Request $request)
    {
        $selectedDate = $request->input('selectedDate');

        // Fetch programs for the selected date
        $programs = Program::whereDate('episode_date', $selectedDate)
            ->select('id', 'program_name', 'episode', 'program_file') // Select the necessary fields
            ->get();

        return response()->json(['programs' => $programs]);
    }

    public function about()
    {
        return view('app.welcome.about');
    }
}
