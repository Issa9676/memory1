// database/migrations/xxxx_xx_xx_xxxxxx_recreate_beneficiaires_table.php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::dropIfExists('beneficiaires');
        Schema::create('beneficiaires', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('nom');
            $table->string('prenom');
            $table->enum('lien_parente', ['conjoint', 'enfant', 'parent', 'autre']);
            $table->date('date_naissance');
            $table->enum('statut', ['actif', 'inactif'])->default('actif');
            $table->string('contact')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('beneficiaires');
    }
};