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
        Schema::create('ticket_orders', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("ticket_order_ref");
            $table->string("unconverted_charges_per_ticket");
            $table->string("charges_per_ticket");
            $table->integer("total_tickets");
            $table->integer("total_charges");
            $table->string("ticket_option")->nullable();
            $table->integer("event_id");
            $table->integer("user_id");
            $table->string("currency_type");
            $table->boolean("is_ticket_payment_confirmed")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ticket_orders');
    }
};
