<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cotisation extends Model
{
    use HasFactory;
    protected $fillable=[
        'reference',
        'user_id',
        'montant',
        'date_cotisation',
        'mois',
        'annee',
        'mode_paiement',
        'statut',
        'preuve_paiement',
        'notes'
        ];



          public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getMontantFormatAttribute($value)
    {
        
        return 
        number_format($value, 0, ',', '') . ' FCFA';
    }
}
