<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->string('package_id');
            $table->string('package_title');
            $table->string('sub_package');
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->date('travel_date');
            $table->unsignedInteger('qty')->default(1);
            $table->unsignedBigInteger('unit_price');
            $table->unsignedBigInteger('total');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
