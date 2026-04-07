<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class remboursement extends Model
{
    protected $fillable = [
        'user_id',
        'etablissement_id',
        'montant_rembourse',
        'facture_path',
        'motif',
        'statut',
        'date_demande'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function etablissement()
    {
        return $this->belongsTo(Etablissement::class);
    }
}
