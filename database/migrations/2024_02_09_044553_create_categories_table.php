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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('cat_name');
            $table->string('cat_parent')->nullable();
            $table->text('cat_desc')->nullable();
            $table->boolean('cat_default')->default(false);
            $table->string('cat_icon')->nullable();
            $table->integer('cat_order')->default(0);
            $table->boolean('cat_isfeatured')->default(false);
            $table->enum('cat_status', ['published', 'draft', 'pending'])->default('draft');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
