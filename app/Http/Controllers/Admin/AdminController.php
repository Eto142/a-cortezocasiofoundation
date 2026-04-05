<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Donation;

class AdminController extends Controller
{
    public function index()
    {
        $totalDonations   = Donation::count();
        $totalRaised      = Donation::sum('amount');
        $pendingCount     = Donation::where('status', 'pending')->count();
        $completedCount   = Donation::where('status', 'completed')->count();
        $thisMonthRaised  = Donation::whereMonth('created_at', now()->month)
                                    ->whereYear('created_at', now()->year)
                                    ->sum('amount');
        $recentDonations  = Donation::latest()->take(8)->get();

        return view('admin.dashboard', compact(
            'totalDonations',
            'totalRaised',
            'pendingCount',
            'completedCount',
            'thisMonthRaised',
            'recentDonations',
        ));
    }
}
