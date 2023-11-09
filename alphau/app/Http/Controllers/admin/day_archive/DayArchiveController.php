<?php

namespace App\Http\Controllers\admin\day_archive;

use App\Http\Controllers\Controller;
use App\Models\DayArchive;
use App\Models\DayArchiveAudioFile;
use App\Models\ProgramArchive;
use Illuminate\Http\Request;

class DayArchiveController extends Controller
{
    public function storeDayArchive(Request $request)
    {
        $data = $request->all();
        $archive_id = ProgramArchive::select('id', 'program_directory')
            ->where('program_name', $data['program_name'])
            ->first();
        $program_directory = $archive_id->program_directory;
        $day_program = DayArchive::create([
            'archive_date' => $data['archive_date'],
            'program_name' => $data['program_name'],
            'episode' => $data['episode'],
            'is_visible' => 'show',
            'program_directory' => $program_directory,
            'archive_id' => $archive_id->id
        ]);

        // store program files
        if ($request->hasFile('day_program_file')) {
            foreach ($request->file('day_program_file') as $index => $file) {
                $file_name = time() . rand(1, 9) . '.' . $file->getClientOriginalExtension();
                $file->move('resources/daily/' . $program_directory . '/', $file_name);
                $day_program_file = new DayArchiveAudioFile();
                $day_program_file->day_program_file = $file_name;
                $day_program_file->day_program_id = $day_program->id;
                $day_program_file->save();
            }
        }
    }
}
