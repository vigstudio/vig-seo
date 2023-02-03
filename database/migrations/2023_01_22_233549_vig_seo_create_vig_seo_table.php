<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

return new class() extends Migration
{
    public function up(): void
    {
        Schema::create('vig_seos', function (Blueprint $table) {
            $table->id();
            $table->string('key', 255);
            $table->json('value')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('vig_seos');
    }
};
