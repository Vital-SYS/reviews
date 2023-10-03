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
        Schema::create('article_user_likes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('article_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->index('article_id', 'pul_article_idx');
            $table->index('user_id', 'pul_article_user_idx');

            $table->foreign('user_id', 'pul_article_fk')->on('articles')->references('id');
            $table->foreign('user_id', 'pul_article_user_fk')->on('users')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('article_user_likes');
    }
};
