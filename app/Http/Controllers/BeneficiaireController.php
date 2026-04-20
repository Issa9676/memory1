<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Beneficiaire;
use Illuminate\Http\Request;

class BeneficiaireController extends Controller
{
    public function getData(User $user)
    {
        try {
            $beneficiaires = $user->beneficiaires()->get()->map(function($b) {
                return [
                    'id' => $b->id,
                    'nom' => $b->nom,
                    'prenom' => $b->prenom,
                    'date_naissance' => $b->date_naissance ? $b->date_naissance->format('d/m/Y') : '',
                    'lien_parente' => $b->lien_parente,
                    
                ];
            });
            
            $taux = $user->calculerTauxCotisation();
            
            return response()->json([
                'success' => true,
                'beneficiaires' => $beneficiaires,
                'taux' => $taux
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }
    
    public function getOne($id)
    {
        try {
            $beneficiaire = Beneficiaire::findOrFail($id);
            return response()->json([
                'success' => true,
                'beneficiaire' => [
                    'id' => $beneficiaire->id,
                    'nom' => $beneficiaire->nom,
                    'prenom' => $beneficiaire->prenom,
                    'date_naissance' => $beneficiaire->date_naissance ? $beneficiaire->date_naissance->format('Y-m-d') : '',
                    'lien_parente' => $beneficiaire->lien_parente,
                    
                ]
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }
    
    public function storeAjax(Request $request, User $user)
    {
        try {
            $request->validate([
                'nom' => 'required|string|max:255',
                'prenom' => 'required|string|max:255',
                'date_naissance' => 'required|date',
                'lien_parente' => 'required|in:conjoint,enfant,parent,autre',
            ]);
            
            $beneficiaire = $user->beneficiaires()->create([
                'nom' => $request->nom,
                'prenom' => $request->prenom,
                'date_naissance' => $request->date_naissance,
                'lien_parente' => $request->lien_parente,
                'statut' => 'actif'
            ]);
            
            $nouveauTaux = $user->calculerTauxCotisation();
            $user->taux_cotisation = $nouveauTaux;
            $user->saveQuietly();
            
            return response()->json([
                'success' => true,
                'beneficiaire' => $beneficiaire,
                'nouveau_taux' => $nouveauTaux
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }
    
    public function updateAjax(Request $request, $id)
    {
        try {
            $beneficiaire = Beneficiaire::findOrFail($id);
            $user = $beneficiaire->user;
            
            $request->validate([
                'nom' => 'required|string|max:255',
                'prenom' => 'required|string|max:255',
                'date_naissance' => 'required|date',
                'lien_parente' => 'required|in:conjoint,enfant,parent,autre',
    
            ]);
            
            $beneficiaire->update([
                'nom' => $request->nom,
                'prenom' => $request->prenom,
                'date_naissance' => $request->date_naissance,
                'lien_parente' => $request->lien_parente,
                'contact' => $request->contact,
            ]);
            
            $nouveauTaux = $user->calculerTauxCotisation();
            $user->taux_cotisation = $nouveauTaux;
            $user->saveQuietly();
            
            return response()->json([
                'success' => true,
                'nouveau_taux' => $nouveauTaux
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }
    
    public function destroyAjax($id)
    {
        try {
            $beneficiaire = Beneficiaire::findOrFail($id);
            $user = $beneficiaire->user;
            $beneficiaire->delete();
            
            $nouveauTaux = $user->calculerTauxCotisation();
            $user->taux_cotisation = $nouveauTaux;
            $user->saveQuietly();
            
            return response()->json([
                'success' => true,
                'nouveau_taux' => $nouveauTaux
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }
}