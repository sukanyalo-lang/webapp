<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Remove the abandoned BLV disease-statistics feature from existing databases.
        if (Schema::hasTable('disease_reports')) {
            Schema::drop('disease_reports');
        }
    }

    public function down(): void
    {
        // Intentionally not recreated: this table belonged to the removed, unrelated feature.
    }
};
