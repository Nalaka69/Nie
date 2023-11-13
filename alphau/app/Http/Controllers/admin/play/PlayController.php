<?php

namespace App\Http\Controllers\admin\play;

use App\Http\Controllers\Controller;
use App\Models\PlayToggle;
use Illuminate\Http\Request;

class PlayController extends Controller
{
    public function changeStatus(Request $request)
    {
        $current_status = PlayToggle::select('current_status')->first();
        $update_status = PlayToggle::where('current_status', $current_status)->update(['current_status' => $request->current_status]);
    }
}
