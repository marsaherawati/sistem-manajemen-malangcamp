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
        Schema::create('rents', function (Blueprint $table) {
            $table->id();
            $table->string('rent_id')->unique();
            $table->foreignId('user_id');
            $table->foreignId('shipping_id')->nullable();
            $table->integer('duration');
            $table->dateTime('rent_start');
            $table->dateTime('rent_end');
            $table->string('status')->nullable();
            $table->string('payment_method')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('rents', function ($table) {
            Schema::dropIfExists('rents');
        });
    }
};
