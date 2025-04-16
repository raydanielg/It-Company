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
        Schema::create('home_contact_photos', function (Blueprint $table) {
            $table->id();
            $table->string('home_1_contact_photo')->nullable();
            $table->string('home_2_contact_photo')->nullable();
            $table->string('home_3_contact_photo')->nullable();
            $table->string('home_4_contact_photo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_contact_photos');
    }
};
