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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('reg_no')->nullable();
            $table->string('reg_rto')->nullable();
            $table->string('manfacture_date')->nullable();
            $table->string('reg_date')->nullable();
            $table->string('owner_name')->nullable();
            $table->string('rc_blacklist_status')->nullable();
            $table->string('make')->nullable();
            $table->string('model')->nullable();
            $table->string('vehicle_class')->nullable();
            $table->string('wheel_base')->nullable();
            $table->string('chasis_no')->nullable();
            $table->string('engine_no')->nullable();
            $table->string('fuel_type')->nullable();
            $table->string('fuel_norm')->nullable();
            $table->string('categories')->nullable();
            $table->string('brand_id')->nullable();
            $table->string('featured_image')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
