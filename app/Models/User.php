<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes; // ← Ajouter cette ligne

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, SoftDeletes; // ← Ajouter SoftDeletes

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'statut',
        // ⚠️ AJOUTER ces champs :
        'matricule',
        'fonction',
        'localite',
        'contact',
        'salaire_base',
        'taux_cotisation'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // ========== RELATIONS ==========
    
    public function remboursements()
    {
        return $this->hasMany(remboursement::class); // Notez le R majuscule
    }

    public function beneficiaires()
    {
        return $this->hasMany(Beneficiaire::class);
    }

    public function cotisations()
    {
        return $this->hasMany(Cotisation::class); // Notez le C majuscule
    }

    // ========== LOGIQUE MÉTIER ==========

    /**
     * Calcule le taux de cotisation selon la règle :
     * 1,5% (membre) + 1% (si conjoint) + 0,5% (par enfant)
     */
    public function calculerTauxCotisation(): float
    {
        $taux = 1.5;

        $hasConjoint = $this->beneficiaires()
            ->where('lien_parente', 'conjoint')
            ->exists();

        if ($hasConjoint) {
            $taux += 1.0;
        }

        $nbEnfants = $this->beneficiaires()
            ->where('lien_parente', 'enfant')
            ->count();

        $taux += $nbEnfants * 0.5;

        return round($taux, 2);
    }



    

    /**
     * Met à jour le taux stocké dans la base de données
     */
    public function updateTauxCotisation()
    {
        $this->taux_cotisation = $this->calculerTauxCotisation();
        $this->saveQuietly(); // Sauvegarde sans déclencher d'événements
    }

    /**
     * Booté : génération automatique du matricule à la création
     */
    protected static function booted()
    {
        static::creating(function ($user) {
            if (empty($user->matricule)) {
                $annee = date('Y');
                $dernier = static::whereYear('created_at', $annee)
                    ->orderBy('id', 'desc')
                    ->first();

                if ($dernier && $dernier->matricule) {
                    $num = (int) substr($dernier->matricule, -4) + 1;
                } else {
                    $num = 1;
                }

                $user->matricule = 'MUT-' . $annee . '-' . str_pad($num, 4, '0', STR_PAD_LEFT);
            }
        });
    }
}