<?php

namespace App\Http\Controllers\admin\automation;

use getID3;
use App\Http\Controllers\Controller;
use App\Models\Automation;
use App\Models\AutomationAudioFile;
use App\Models\Program;
use App\Models\ProgramArchive;
use Illuminate\Http\Request;

class AutomationController extends Controller
{
    public function storeAutomation(Request $request)
    {
        $data = $request->all();
        $program = Program::where('program_name', $data['program_name'])
            ->where('episode', $data['episode'])
            ->first(['id', 'program_file', 'duration']);
        $day_program = Automation::create([
            'is_visible' => 'show',
            'automation_file' => $program->program_file,
            'duration' => $program->duration,
            'program_id' => $program->id
        ]);
    }

    public function deleteAutomation(Request $request)
    {
        $id = $request->id;
        $automation = Automation::findOrFail($id);
        $automation->delete();
        return response()->json(200);
    }

    public function listAutomations()
    {
        $automation_list = Automation::select('id', 'automation_file', 'duration')
            ->get();
        return response()->json(['automation_list' => $automation_list]);
    }
}
