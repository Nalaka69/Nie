<?php

namespace App\Http\Controllers\admin\automation;

use App\Http\Controllers\Controller;
use App\Models\Automation;
use App\Models\AutomationAudioFile;
use App\Models\ProgramArchive;
use Illuminate\Http\Request;

class AutomationController extends Controller
{
    public function storeAutomation(Request $request)
    {
        $data = $request->all();
        $archive_id = ProgramArchive::select('id', 'program_directory')
            ->where('program_name', $data['program_name'])
            ->first();
        $program_directory = $archive_id->program_directory;
        $automation = Automation::create([
            'program_name' => $data['program_name'],
            'automation_episode' => $data['automation_episode'],
            'automation_url' => $data['automation_url'],
            'is_visible' => 'show',
            'program_directory' => $program_directory,
            'archive_id' => $archive_id->id
        ]);

        // store program files
        if ($request->hasFile('automation_file')) {
            foreach ($request->file('automation_file') as $index => $file) {
                $file_name = time() . rand(1, 9) . '.' . $file->getClientOriginalExtension();
                $file->move('resources/belt/', $file_name);
                $automation_file = new AutomationAudioFile();
                $automation_file->automation_file = $file_name;
                $automation_file->automation_id = $automation->id;
                $automation_file->save();
            }
        }
    }
    public function listAutomations()
    {
        $automation_list = AutomationAudioFile::select('id', 'automation_file')
            ->get();

        return response()->json(['automation_list' => $automation_list]);
    }
}
