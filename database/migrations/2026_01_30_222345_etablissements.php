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
        Schema::create('etablissements', function (Blueprint $table) {
    $table->id();
    $table->string('nom');
    $table->enum('type', ['hopital', 'clinique', 'pharmacie', 'laboratoire']);
    $table->string('adresse')->nullable();
    $table->string('ville')->nullable();
    $table->string('telephone')->nullable();
    $table->string('email')->nullable();
    $table->string('contact_personne')->nullable();
    $table->enum('statut', ['partenaire', 'non_partenaire'])->default('non_partenaire');
    $table->decimal('taux_prise_en_charge', 5, 2)->nullable()->default(70.00);
    $table->text('services')->nullable();
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('etablissements');
    }
};
