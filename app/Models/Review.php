<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'campaign_id', 'email_subject', 'email_body', 'good_review_message', 'bad_review_message', 'review_screen_message'
    ];

    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }
}