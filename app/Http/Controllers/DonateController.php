<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use App\Models\PaymentSetting;
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
            'amount'    => 'required|numeric|min:100|max:50000',
            'frequency' => 'required|in:one_time,monthly',
            'message'   => 'nullable|string|max:600',
        ]);

        $donation = Donation::create($validated);

        return redirect()->route('donate.payment', $donation->id);
    }

    public function payment(Donation $donation)
    {
        $settings = PaymentSetting::instance();

        return view('donate.payment', compact('donation', 'settings'));
    }
}
