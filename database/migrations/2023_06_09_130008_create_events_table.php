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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string("event_title");
            $table->string("event_venue");
            $table->date("event_date");
            $table->integer("event_venue_capacity")->nullable();
            $table->text("event_description");
            $table->string("event_organizer")->nullable();
            $table->string("event_charges");
            $table->string("event_type");
            $table->text("event_image_url");
            $table->text("event_venue_image_url")->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
