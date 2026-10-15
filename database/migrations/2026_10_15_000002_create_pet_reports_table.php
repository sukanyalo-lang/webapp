<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pet_reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('pet_name', 100);
            $table->string('pet_type', 40);
            $table->string('breed', 100)->nullable();
            $table->string('color', 100)->nullable();
            $table->string('status', 20)->default('lost');
            $table->text('description');
            $table->string('location', 255);
            $table->date('last_seen_at')->nullable();
            $table->string('photo_path')->nullable();
            $table->string('contact_name', 100);
            $table->string('contact_phone', 30);
            $table->timestamps();
            $table->index(['status', 'pet_type']);
            $table->index('location');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pet_reports');
    }
};
