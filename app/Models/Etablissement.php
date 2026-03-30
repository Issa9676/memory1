<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Etablissement extends Model
{
    use HasFactory;
    protected $fillable=[
        'nom',
        'type',
        'adresse',
        'ville',
        'telephone',
        'email',
        'contact_personne',
        'statut',
        'taux_prise_en_charge',
        'services'
        ]; 



        public function remboursement()
{
    return $this->hasMany(remboursement::class);
}
}
