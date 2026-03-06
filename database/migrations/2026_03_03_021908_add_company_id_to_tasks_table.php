<?php

use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Multi-tenant column removed: keep migration as no-op for compatibility.
    }

    public function down(): void
    {
        //
    }
};
