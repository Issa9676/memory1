<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Beneficiaire extends Model
{
    protected $fillable = [
        'user_id', 
        'nom', 
        'prenom', 
        'date_naissance', 
        'lien_parente', 
        'statut', 
        'contact'
    ];

    protected $casts = [
        'date_naissance' => 'date',
    ];

    /**
     * Relation avec l'utilisateur (adhérent)
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}