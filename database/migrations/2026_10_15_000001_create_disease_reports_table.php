<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('disease_reports', function (Blueprint $table) {
            $table->id();
            $table->integer('year')->nullable();
            $table->string('canton', 10)->nullable();
            $table->string('diseases_group')->nullable();
            $table->string('diseases')->nullable();
            $table->string('species')->nullable();
            $table->integer('count')->default(0);
            $table->string('api_hash', 64)->unique()->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->index(['year', 'canton']);
            $table->index('diseases');
            $table->index('species');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('disease_reports');
    }
};
