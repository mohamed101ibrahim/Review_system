<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'name', 'description', 'logo_url', 'website', 'social_links'
    ];
    protected $casts = [
        'social_links' => 'array',
    ];

    public function campaigns()
    {
        return $this->hasMany(Campaign::class);
    }
}