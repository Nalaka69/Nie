<?php

namespace App\Http\Controllers\admin\program;

use App\Http\Controllers\Controller;
use App\Models\Program;
use App\Models\ProgramArchive;
use App\Models\ProgramAudioFile;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public function storeArchive(Request $request)
    {
        $data = $request->all();
        $program_archive = ProgramArchive::create([
            'program_name' => $data['program_name'],
            'program_genre' => $data['program_genre'],
            'program_directory' => $data['program_directory'],
            'is_visible' => 'show'
        ]);
    }

    public function storeProgram(Request $request)
    {
        $data = $request->all();
        $archive_id = ProgramArchive::select('id', 'program_directory')
            ->where('program_name', $data['program_name'])
            ->first();
        $program_directory = $archive_id->program_directory;
        $program = Program::create([
            'program_name' => $data['program_name'],
            'episode' => $data['episode'],
            'episode_date' => $data['episode_date'],
            'is_visible' => 'show',
            'program_directory' => $program_directory,
            'archive_id' => $archive_id->id
        ]);

        // store program files
        if ($request->hasFile('program_file')) {
            foreach ($request->file('program_file') as $index => $file) {
                $file_name = time() . rand(1, 9) . '.' . $file->getClientOriginalExtension();
                $file->move('resources/programs/' . $program_directory . '/', $file_name);
                $program_file = new ProgramAudioFile();
                $program_file->program_file = $file_name;
                $program_file->program_id = $program->id;
                $program_file->save();
            }
        }
    }
}
