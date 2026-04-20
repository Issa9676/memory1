<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cotisation extends Model
{
    use HasFactory;

    protected $fillable = [
        'reference',
        'user_id',
        'montant',
        'date_cotisation',
        'mois',
        'annee',
        'mode_paiement',
        'statut',
        'preuve_paiement',
        'notes',
        // ⚠️ NOUVEAUX CHAMPS À AJOUTER
        'numero_ordre',
        'salaire_base',
        'pourcentage_retenue',
        'part_assure',
        'part_etat'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getMontantFormatAttribute()
    {
        return number_format($this->montant, 0, ',', ' ') . ' FCFA';
    }

    // Accesseur pour la part assuré formatée
    public function getPartAssureFormatAttribute()
    {
        return number_format($this->part_assure, 0, ',', ' ') . ' FCFA';
    }

    // Accesseur pour la part État formatée
    public function getPartEtatFormatAttribute()
    {
        return number_format($this->part_etat, 0, ',', ' ') . ' FCFA';
    }

    // Calcul automatique avant sauvegarde
    protected static function booted()
    {
        static::saving(function ($cotisation) {
            if ($cotisation->salaire_base && $cotisation->pourcentage_retenue) {
                $cotisation->part_assure = ($cotisation->salaire_base * $cotisation->pourcentage_retenue) / 100;
                $cotisation->part_etat = $cotisation->part_assure * 2;
                $cotisation->montant = $cotisation->part_assure + $cotisation->part_etat;
            }
        });
    }
}