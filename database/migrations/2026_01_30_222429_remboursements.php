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
        Schema::create('remboursements', function (Blueprint $table) {
    $table->id();
    $table->foreignId('user_id')->constrained()->onDelete('cascade');
    $table->foreignId('etablissement_id')->constrained()->onDelete('cascade');
    $table->decimal('montant_rembourse', 10, 2);
    $table->string('facture_path')->nullable();
    $table->string('motif');
    $table->enum('statut', ['en_attente', 'approuve', 'rejete'])->default('en_attente');
    $table->date('date_demande');
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('remboursements');
    }
};
