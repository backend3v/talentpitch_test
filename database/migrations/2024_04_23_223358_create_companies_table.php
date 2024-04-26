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
        Schema::create('companies', function (Blueprint $table) {
            $table->timestamps();
            $table->increments('id');
            $table->string('name')->unique()->nullable(false);
            $table->string('contact_name')->nullable();
            $table->string('contact')->nullable();
            $table->string('location')->nullable();
            $table->string('industry')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
