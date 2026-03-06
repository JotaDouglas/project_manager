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
        if (Schema::hasTable('companies') && !Schema::hasColumn('companies', 'cnpj')) {
            Schema::table('companies', function (Blueprint $table) {
                $table->string('cnpj')->nullable()->after('slug');
            });
        }

        if (Schema::hasTable('users') && Schema::hasColumn('users', 'company_id')) {
            Schema::table('users', function (Blueprint $table) {
                $table->dropConstrainedForeignId('company_id');
            });
        }

        if (Schema::hasTable('projects') && Schema::hasColumn('projects', 'company_id')) {
            Schema::table('projects', function (Blueprint $table) {
                $table->dropConstrainedForeignId('company_id');
            });
        }

        if (Schema::hasTable('tasks') && Schema::hasColumn('tasks', 'company_id')) {
            Schema::table('tasks', function (Blueprint $table) {
                $table->dropConstrainedForeignId('company_id');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasTable('users') && !Schema::hasColumn('users', 'company_id')) {
            Schema::table('users', function (Blueprint $table) {
                $table->foreignId('company_id')->nullable()->constrained()->nullOnDelete();
            });
        }

        if (Schema::hasTable('projects') && !Schema::hasColumn('projects', 'company_id')) {
            Schema::table('projects', function (Blueprint $table) {
                $table->foreignId('company_id')->constrained()->cascadeOnDelete();
            });
        }

        if (Schema::hasTable('tasks') && !Schema::hasColumn('tasks', 'company_id')) {
            Schema::table('tasks', function (Blueprint $table) {
                $table->foreignId('company_id')->nullable()->constrained()->cascadeOnDelete();
            });
        }

        if (Schema::hasTable('companies') && Schema::hasColumn('companies', 'cnpj')) {
            Schema::table('companies', function (Blueprint $table) {
                $table->dropColumn('cnpj');
            });
        }
    }
};
