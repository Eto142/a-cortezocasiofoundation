<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PaymentSetting;
use Illuminate\Http\Request;

class PaymentSettingController extends Controller
{
    public function edit()
    {
        $settings = PaymentSetting::instance();
        return view('admin.payment_settings', compact('settings'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'bank_enabled'         => 'nullable|boolean',
            'bank_name'            => 'nullable|string|max:120',
            'account_name'         => 'nullable|string|max:120',
            'account_number'       => 'nullable|string|max:60',
            'routing_number'       => 'nullable|string|max:60',
            'bank_instructions'    => 'nullable|string|max:1000',
            'giftcard_enabled'     => 'nullable|boolean',
            'giftcard_type'        => 'nullable|string|max:80',
            'giftcard_email'       => 'nullable|email|max:180',
            'giftcard_instructions'=> 'nullable|string|max:1000',
        ]);

        // Checkboxes come as '1' or not present; normalise to bool
        $validated['bank_enabled']     = $request->boolean('bank_enabled');
        $validated['giftcard_enabled'] = $request->boolean('giftcard_enabled');

        $settings = PaymentSetting::instance();
        $settings->update($validated);

        return redirect()->route('admin.payment.edit')
            ->with('success', 'Payment settings saved successfully.');
    }
}
