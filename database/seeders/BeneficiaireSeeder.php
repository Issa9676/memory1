<?php

namespace Database\Seeders;
use App\Models\User;

use App\Models\remboursement;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BeneficiaireSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       // On récupère Elise Roberts (ou le premier membre trouvé)
    $membre = \App\Models\User::where('role', 'membre')->first();

    if ($membre) {
        \App\Models\Beneficiaire::create([
            'user_id' => $membre->id,
            'nom_complet' => 'Moussa ' . $membre->name, // Son enfant
            'lien_parente' => 'Enfant',
            'date_naissance' => '2018-05-12'
        ]);

        \App\Models\Beneficiaire::create([
            'user_id' => $membre->id,
            'nom_complet' => 'Mariama ' . $membre->name, // Sa femme
            'lien_parente' => 'Conjoint',
            'date_naissance' => '1995-08-20'
        ]);
    }
    }
}
