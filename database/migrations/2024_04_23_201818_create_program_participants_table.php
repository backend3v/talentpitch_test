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
        Schema::create('program_participants', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('participant')->nullable(false);
            $table->string('program')->nullable(false);
            $table->enum('type', array('user', 'challenge','company'))->nullable(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('program_participants');
    }
};
