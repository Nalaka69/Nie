<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\ProgramArchive;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function index()
    {
        $archiveslist = ProgramArchive::select('id', 'program_name', 'program_genre', 'program_thumbanail')->get();
        return view('app.welcome.index', compact('archiveslist'));
    }
    public function programs()
    {
        $programs_list = Program::select('id', 'program_name', 'episode', 'program_file', 'episode_date', 'episode_time')
            ->get();
        $program_archives_list = Program::select('id', 'program_name')
            ->get();
        // return response()->json(['programs_list' => $programs_list]);
        return view('app.welcome.programs', compact('programs_list', 'program_archives_list'));
    }
    public function welcomeProgramsList(Request $request)
    {
        $selectedDate = $request->input('selectedDate');
        $programs = Program::whereDate('episode_date', $selectedDate)
            ->select('id', 'program_name', 'episode', 'program_file', 'duration', 'program_thumbanail', 'program_genre')
            ->get();

        return response()->json(['programs' => $programs]);
    }

    // filtering to program name
    public function programArchivesList()
    {
        $programArchivesList = ProgramArchive::select('id', 'program_name')->get()->toArray();
        return response()->json(['programArchivesList' => $programArchivesList]);
    }

    public function welcomeArchiveProgramsList(Request $request)
    {
        $selectedProgram = $request->input('selectedArchive');
        $archive_programs = Program::where('program_name', $selectedProgram)
            ->select('id', 'program_name', 'episode', 'program_file', 'duration', 'program_thumbanail', 'program_genre', 'episode_date')
            ->get();

        return response()->json(['archive_programs' => $archive_programs]);
    }

    // about
    public function about()
    {
        return view('app.welcome.about');
    }
}
