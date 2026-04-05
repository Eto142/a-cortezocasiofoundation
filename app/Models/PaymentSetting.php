<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentSetting extends Model
{
    protected $fillable = [
        'bank_enabled',
        'bank_name',
        'account_name',
        'account_number',
        'routing_number',
        'bank_instructions',
        'giftcard_enabled',
        'giftcard_type',
        'giftcard_email',
        'giftcard_instructions',
    ];

    protected $casts = [
        'bank_enabled'     => 'boolean',
        'giftcard_enabled' => 'boolean',
    ];

    /**
     * Always return the single settings row, creating it if it doesn't exist.
     */
    public static function instance(): self
    {
        return self::firstOrCreate(['id' => 1]);
    }
}
