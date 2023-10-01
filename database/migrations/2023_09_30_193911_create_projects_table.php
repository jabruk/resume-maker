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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('github');
            $table->json('category')->nullable();
            $table->string('name');
            $table->unsignedBigInteger('resume_id');
            $table->unsignedBigInteger('image_id');
            $table->timestamps();

            $table->foreign('image_id')->references('id')->on('images')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
