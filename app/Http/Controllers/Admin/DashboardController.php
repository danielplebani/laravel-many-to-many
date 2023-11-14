<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'total_projects' => Project::all()->count(),
            'total_users' => User::all()->count(),
        ]);
    }
    public function contatti()
    {
        return view('admin.contatti');
    }
}
