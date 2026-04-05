<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Profile extends Model
{
    protected $fillable = ['name', 'email', 'slug', 'writeup'];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    protected static function booted(): void
    {
        static::creating(function (Profile $profile) {
            if (empty($profile->slug)) {
                $profile->slug = Str::slug($profile->name);
            }
        });

        static::updating(function (Profile $profile) {
            if ($profile->isDirty('name') && ! $profile->isDirty('slug')) {
                $profile->slug = Str::slug($profile->name);
            }
        });
    }
}
