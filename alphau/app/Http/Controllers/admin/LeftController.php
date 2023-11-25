<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\AutomationAudioFile;
use App\Models\DayArchiveAudioFile;
use App\Models\Genre;
use App\Models\Program;
use App\Models\ProgramArchive;
use Illuminate\Http\Request;

class LeftController extends Controller
{
    public function viewLeftHome()
    {
        $created_archive = ProgramArchive::select('program_name')->get();
        return view('app.admin.dashboard_left.automation', compact('created_archive'));
    }
    public function viewPrograms()
    {
        $programs_list = ProgramArchive::select('id', 'program_name', 'program_genre')
        ->get();
        $genre_list = Genre::select('genre')->get();
        return view('app.admin.dashboard_left.programs', compact( 'programs_list', 'genre_list'));
    }
    public function viewGenres()
    {
        // $programs_list = ProgramArchive::select('id', 'program_name', 'program_genre')
        // ->get();
        return view('app.admin.dashboard_left.genre');
    }
    public function viewProgramsArchive()
    {
        $created_archive = ProgramArchive::select('program_name')->get();
        $program_file_list = Program::select('id', 'program_file', 'episode_date', 'episode_time')
        ->get();
        return view('app.admin.dashboard_left.programarchive', compact('created_archive', 'program_file_list'));
    }
    public function viewDayPlaylist()
    {
        $created_archive = ProgramArchive::select('program_name')->get();
        return view('app.admin.dashboard_left.dayarchive', compact('created_archive'));
    }
    public function viewLibrary()
    {
        $created_archive = ProgramArchive::select('program_name')->get();
        return view('app.admin.dashboard_left.library', compact('created_archive'));
    }
}
