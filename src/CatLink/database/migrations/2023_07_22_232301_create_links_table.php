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
        Schema::create('links', function (Blueprint $table) {
            $table->id();
            $table->string('category', 100);
            $table->string('url', 2000);
            $table->longText('html')->nullable();
            $table->string('title', 120)->nullable();
            $table->string('description', 5000)->nullable();
            $table->string('og_image', 2000)->nullable();
            $table->string('comments_link', 2000)->nullable();
            $table->integer('views')->default(0);
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('state', 20)->default('to process'); // to process, active, rejected, hidden, deleted
            $table->timestamps();
        });

        DB::statement('ALTER TABLE links ADD FULLTEXT links_html_index (html)');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('links');
    }
};
