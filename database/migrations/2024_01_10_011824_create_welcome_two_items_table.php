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
        Schema::create('welcome_two_items', function (Blueprint $table) {
            $table->id();
            $table->text('subheading')->nullable();
            $table->text('heading')->nullable();
            $table->text('text')->nullable();
            $table->text('button_text')->nullable();
            $table->text('button_url')->nullable();
            $table->text('experience_year')->nullable();
            $table->text('photo1')->nullable();
            $table->text('photo2')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('welcome_two_items');
    }
};
