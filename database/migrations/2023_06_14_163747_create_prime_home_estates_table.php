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
        Schema::create('prime_home_estates', function (Blueprint $table) {
            $table->id();
            $table->text("estate_image");
            $table->string("estate_title");
            $table->text("estate_description");
            $table->string("estate_price");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prime_home_estates');
    }
};
