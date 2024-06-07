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
        Schema::create('site_configs', function (Blueprint $table) {
            $table->id();
            $table->string('logo_title','200');
            $table->unsignedBigInteger('logo_id')->nullable();
            $table->string('company_name','100');
            $table->string('popular_dish_title');
            $table->string('special_food')->nullable();
            $table->string('social_headline')->nullable();
            $table->text('description')->nullable();
            $table->foreign('logo_id')->references('id')->on('images')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('site_configs');
    }
};
