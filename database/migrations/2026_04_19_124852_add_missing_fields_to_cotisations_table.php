// database/migrations/xxxx_xx_xx_xxxxxx_add_missing_fields_to_cotisations_table.php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('cotisations', function (Blueprint $table) {
            $table->string('numero_ordre')->nullable()->unique()->after('id');
            $table->decimal('salaire_base', 10, 2)->nullable()->after('montant');
            $table->decimal('pourcentage_retenue', 5, 2)->nullable()->after('salaire_base');
            $table->decimal('part_assure', 10, 2)->nullable()->after('pourcentage_retenue');
            $table->decimal('part_etat', 10, 2)->nullable()->after('part_assure');
        });
    }

    public function down(): void
    {
        Schema::table('cotisations', function (Blueprint $table) {
            $table->dropColumn([
                'numero_ordre', 'salaire_base', 
                'pourcentage_retenue', 'part_assure', 'part_etat'
            ]);
        });
    }
};