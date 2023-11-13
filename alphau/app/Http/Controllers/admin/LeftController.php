<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\AutomationAudioFile;
use App\Models\DayArchiveAudioFile;
use App\Models\Program;
use App\Models\ProgramArchive;
use App\Models\ProgramAudioFile;
use Illuminate\Http\Request;

class LeftController extends Controller
{
    public function cLHome()
    {
        $created_archive = ProgramArchive::select('program_name')->get();
        $automation_list = AutomationAudioFile::select('id', 'automation_file', 'duration')
        ->get();
        return view('app.admin.dashboard_left.automation', compact('created_archive', 'automation_list'));
    }
    public function cLPrograms()
    {
        $programs_list = ProgramArchive::select('id', 'program_name', 'program_genre')
        ->get();
        return view('app.admin.dashboard_left.programs', compact( 'programs_list'));
    }
    public function cLProgramsArchive()
    {
        $created_archive = ProgramArchive::select('program_name')->get();
        $program_file_list = ProgramAudioFile::select('id', 'program_file', 'created_at')
        ->get();
        return view('app.admin.dashboard_left.programarchive', compact('created_archive', 'program_file_list'));
    }
    public function cLDayPlaylist()
    {
        $created_archive = ProgramArchive::select('program_name')->get();
        $day_list = DayArchiveAudioFile::select('id', 'day_program_file')
        ->get();
        return view('app.admin.dashboard_left.dayarchive', compact('created_archive', 'day_list'));
    }
}
