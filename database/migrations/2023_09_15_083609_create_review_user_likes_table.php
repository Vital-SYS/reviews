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
        Schema::create('review_user_likes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('review_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->index('review_id', 'pul_review_idx');
            $table->index('user_id', 'pul_review_user_idx');

            $table->foreign('user_id', 'pul_review_fk')->on('reviews')->references('id');
            $table->foreign('user_id', 'pul_review_user_fk')->on('users')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('review_user_likes');
    }
};
