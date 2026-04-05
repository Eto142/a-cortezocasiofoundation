<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function index()
    {
        $totalProfiles  = Profile::count();
        $recentCount    = Profile::whereMonth('created_at', now()->month)
                                 ->whereYear('created_at', now()->year)
                                 ->count();
        $recentProfiles = Profile::latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'totalProfiles',
            'recentCount',
            'recentProfiles',
        ));
    }
}
