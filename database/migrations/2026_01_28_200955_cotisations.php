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
       Schema::create('cotisations', function (Blueprint $table) {
    $table->id();
    $table->string('reference')->unique();
    $table->foreignId('user_id')->constrained()->onDelete('cascade');
    $table->decimal('montant', 10, 2);
    $table->date('date_cotisation');
    $table->enum('mois', ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12']);
    $table->integer('annee');
    $table->enum('mode_paiement', ['espece', 'wave', 'orange_money', 'mtn_money', 'virement']);
    $table->enum('statut', ['paye', 'impaye', 'annule'])->default('impaye');
    $table->string('preuve_paiement')->nullable();
    $table->text('notes')->nullable();
    $table->timestamps();
    
    $table->unique(['user_id', 'mois', 'annee']);
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cotisations');
    }
};
