<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    protected $fillable = [
        'company_id', 'title', 'slug', 'description', 'type', 'status'
    ];
    public function companies()
    {
        return $this->belongsTo(Company::class);
    }
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}