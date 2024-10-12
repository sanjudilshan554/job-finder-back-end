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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->integer('status')->default(0);
            $table->string('title')->nullable();
            $table->string('slug')->nullable(); 
            $table->bigInteger('category_id')->nullable(); 
            $table->string('category_name')->nullable(); 
            $table->string('view_text')->nullable(); 
            $table->text('text')->nullable(); 
            $table->bigInteger('posted_by_id')->nullable(); 
            $table->string('posted_by_name')->nullable(); 
            $table->bigInteger('image_id')->nullable(); 
            $table->string('meta_tags')->nullable(); 
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
