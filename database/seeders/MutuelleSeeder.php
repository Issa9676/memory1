<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Cotisation;
use App\Models\Remboursement;
use App\Models\Etablissement;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class MutuelleSeeder extends Seeder
{
    public function run()
    {
        // 1. Créer quelques établissements partenaires
        $clinique = Etablissement::create([
            'nom' => 'Clinique de l\'Espoir',
            'type' => 'clinique',
            'adresse'=>'lazaret',
            'ville'=>'Niamey',
            'telephone'=>'96768186',
            'email'=>'espoin@gmail.com',
            'contact_personne'=>'SG',
           'taux_prise_en_charge' => 80.00,
            'statut' => 'partenaire',
            'services'=>'UIN'



        ]);

         $pharmacie = Etablissement::create([
            'nom' => 'Pharmacie du centre',
            'type' => 'pharmacie',
            'adresse'=>'Zango',
            'ville'=>'Tahoua',
            'telephone'=>'86048504',
            'email'=>'tahoua@gmail.com',
            'contact_personne'=>'Madame',
           'taux_prise_en_charge' => 70.00,
            'statut' => 'partenaire',
            'services'=>'Finance'
        ]);

        // 2. Créer un Admin pour toi
        User::updateOrcreate([
            'name' => 'Admin Mutuelle',
            'email' => 'admin@test.com',
            'password' => Hash::make('123456'),

            'statut' => 'actif',
            'role' => 'admin'
        ]);

        // 3. Créer 10 membres avec des cotisations et remboursements
        User::factory(10)->create(['role' => 'membre'])->each(function ($user) use ($clinique) {
            // Créer 3 cotisations par membre
            Cotisation::create([
                'user_id' => $user->id,
                'reference' => 'COT-' . uniqid(),
                'montant' => 10000,
                'date_cotisation' => now(),
                'mois' => now()->format('m'),
                'annee' => 2026,
                'mode_paiement' => 'wave',
                'statut' => 'impaye'
            ]);

            // Créer une demande de remboursement
            Remboursement::create([
                'user_id' => $user->id,
                'etablissement_id'=>$clinique->id,
                'montant_rembourse' => 7500,
                'statut' => 'en_attente',
                'motif' => 'Consultation générale',
                'date_demande' => now()
            ]);
        });
    }
}

