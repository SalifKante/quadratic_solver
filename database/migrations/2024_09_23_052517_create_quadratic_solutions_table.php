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
        Schema::create('quadratic_solutions', function (Blueprint $table) {
            $table->id(); // Auto increment
            $table->double('a'); // Coefficient a
            $table->double('b'); // Coefficient b
            $table->double('c'); // Coefficient c
            $table->double('x1')->nullable();  // Store the first solution
            $table->double('x2')->nullable();  // Store the second solution
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quadratic_solutions');
    }
};
