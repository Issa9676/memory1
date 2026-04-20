<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('matricule')->unique()->after('id');
            $table->string('fonction')->nullable()->after('name');
            $table->string('localite')->nullable()->after('email');
            $table->string('contact')->nullable()->after('localite');
            $table->decimal('salaire_base', 10, 2)->nullable()->after('password');
            $table->decimal('taux_cotisation', 5, 2)->nullable()->after('salaire_base');
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'matricule', 'fonction', 'localite', 
                'contact', 'salaire_base', 'taux_cotisation'
            ]);
            $table->dropSoftDeletes();
        });
    }
};