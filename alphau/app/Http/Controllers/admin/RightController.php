<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\School;
use App\Models\User;
use Illuminate\Http\Request;

class RightController extends Controller
{
    public function cRHome()
    {
        return view('app.admin.dashboard_right.dashboard_right');
    }
    public function cRUsers()
    {
        $schools_list = School::select('school_name')->get();
        $students_list = User::select('first_name', 'last_name', 'school', 'student_index')->where('role', 'user')->get();
        $school_admins_list = User::select('first_name', 'last_name', 'school', 'student_index')->where('role', 'school')->get();
        $guests_list = User::select('first_name', 'last_name', 'school', 'student_index')->where('role', 'guest')->get();
        return view('app.admin.dashboard_right.users', compact('schools_list', 'students_list', 'school_admins_list', 'guests_list'));
    }
    public function cRSchools()
    {
        $schools_list = School::select('school_index', 'school_name', 'province', 'district')
            ->get();
        return view('app.admin.dashboard_right.schools', compact('schools_list'));
    }
    public function cRNotifications()
    {
        return view('app.admin.dashboard_right.notifications');
    }
}