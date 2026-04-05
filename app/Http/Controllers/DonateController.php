<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use Illuminate\Http\Request;

class DonateController extends Controller
{
    public function show(Request $request)
    {
        $recentCount = Donation::where('status', 'pending')->count();

        return view('donate.index', compact('recentCount'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'      => 'required|string|max:120',
            'email'     => 'required|email|max:180',
            'zip_code'  => 'nullable|string|max:12',
            'phone'     => 'nullable|string|max:25',
            'amount'    => 'required|numeric|min:1|max:50000',
            'frequency' => 'required|in:one_time,monthly',
            'message'   => 'nullable|string|max:600',
        ]);

        Donation::create($validated);

        return redirect()->route('donate')
            ->with('success', 'Thank you, ' . explode(' ', $validated['name'])[0] . '! Your donation of $' . number_format($validated['amount'], 2) . ' has been received and will be processed by our team.');
    }
}
