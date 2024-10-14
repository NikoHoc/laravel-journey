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
        // Tabel tickets:
        // 1. id: Auto increment, primary key.
        // 2. movie_id: Foreign key dari tabel movies.
        // 3. customer_name: String(100), required.
        // 4. seat_number: String(5), required → contoh: "B12".
        // 5. is_checked_in: Boolean, default 0.
        // 6. check_in_time: Datetime, nullable.
        // 7. created_at, updated_at.
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('movie_id');
            $table->foreign('movie_id')->references('id')->on('movies')->onDelete('cascade');
            $table->string('customer_name', 100);
            $table->string('seat_number', 5);
            $table->boolean('is_checked_in')->default(0);
            $table->dateTime('check_in-time')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
