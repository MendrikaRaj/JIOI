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
        Schema::create('calendriers', function (Blueprint $table) {
            $table->id();
            $table->timestamp('date');
            $table->foreignId('siteid')->constrained('sites');
            $table->foreignId('disciplineid')->constrained('disciplines');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('calendriers');
    }
};
