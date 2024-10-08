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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->integer('status')->nullable();
            $table->string('name')->nullable();
            $table->string('slug')->nullable();
            $table->bigInteger('category_id')->nullable();
            $table->string('category_name')->nullable();
            $table->string('type')->nullable();
            $table->string('description')->nullable();
            $table->string('experience')->nullable();
            $table->string('location')->nullable();
            $table->string('salary')->nullable();
            $table->string('working_hours')->nullable();
            $table->string('company_name')->nullable();
            $table->string('responsibilities')->nullable();
            $table->bigInteger('image_id')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
