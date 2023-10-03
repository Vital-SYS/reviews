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
        Schema::create('review_comments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('review_id');
            $table->text('message');
            $table->timestamps();

            $table->index('review_id', 'comment_review_idx');
            $table->index('user_id', 'comment_user_idx');

            $table->foreign('review_id', 'comment_review_fk')->on('reviews')->references('id');
            $table->foreign('user_id', 'comment_user_fk')->on('users')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('review_comments');
    }
};
