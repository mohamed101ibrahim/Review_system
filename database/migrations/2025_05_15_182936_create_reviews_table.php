<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->foreignId('campaign_id')->constrained()->onDelete('cascade');
            $table->text('email_subject')->nullable();
            $table->text('email_body')->nullable();
            $table->text('good_review_message')->nullable();
            $table->text('bad_review_message')->nullable();
            $table->text('review_screen_message')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};