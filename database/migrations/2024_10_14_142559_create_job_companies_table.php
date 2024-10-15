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
        Schema::create('job_companies', function (Blueprint $table) {
            $table->id();
            $table->string('status')->nullable();
            $table->string('name')->nullable();
            $table->string('slug')->nullable();
            $table->text('web_address')->nullable();
            $table->string('email')->nullable();
            $table->string('location')->nullable();
            $table->string('address')->nullable();
            $table->string('description')->nullable();
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
        Schema::dropIfExists('job_companies');
    }
};
