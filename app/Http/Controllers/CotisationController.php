<?php

namespace App\Http\Controllers;

use App\Models\cotisation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CotisationController extends Controller
{
    /**
     * Affiche la liste des cotisations pour un mois/année
     */
    public function index(Request $request)
    {
        $mois = $request->get('mois', date('m'));
        $annee = $request->get('annee', date('Y'));
        
        $cotisations = cotisation::with('user')
            ->where('mois', $mois)
            ->where('annee', $annee)
            ->orderBy('numero_ordre')
            ->get();
        
        return view('cotisations.index', compact('cotisations', 'mois', 'annee'));
    }

    /**
     * Formulaire de création d'une cotisation
     */
    public function create()
    {
        $users = User::where('role', 'membre')->get();
        return view('cotisations.create', compact('users'));
    }

    /**
     * Enregistrement d'une cotisation avec calcul automatique
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'date_cotisation' => 'required|date',
            'mois' => 'required|string',
            'annee' => 'required|integer',
            'statut' => 'required|in:paye,impaye,annule',
            'mode_paiement' => 'required',
            'preuve_paiement' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $user = User::findOrFail($request->user_id);
        
        // Vérifier si l'utilisateur a déjà cotisé pour ce mois/année
        $existe = cotisation::where('user_id', $user->id)
            ->where('mois', $request->mois)
            ->where('annee', $request->annee)
            ->exists();
        
        if ($existe) {
            return back()->withInput()->with('error', 'Ce membre a déjà cotisé pour cette période.');
        }

        // Calcul automatique selon le taux du membre
        $taux = $user->taux_cotisation ?? $user->calculerTauxCotisation();
        $part_assure = ($user->salaire_base * $taux) / 100;
        $part_etat = $part_assure * 2;
        $total = $part_assure + $part_etat;

        try {
            $data = $request->all();
            $data['reference'] = 'COT-' . strtoupper(uniqid());
            $data['salaire_base'] = $user->salaire_base;
            $data['pourcentage_retenue'] = $taux;
            $data['part_assure'] = $part_assure;
            $data['part_etat'] = $part_etat;
            $data['montant'] = $total;
            
            if ($request->hasFile('preuve_paiement')) {
                $path = $request->file('preuve_paiement')->store('preuves', 'public');
                $data['preuve_paiement'] = $path;
            }
            
            cotisation::create($data);
            
            // Renumérotation des ordres pour ce mois
            $this->renumeroter($request->mois, $request->annee);
            
            return redirect()->route('cotisations.index', ['mois' => $request->mois, 'annee' => $request->annee])
                ->with('success', 'Cotisation enregistrée avec succès.');
                
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'Erreur : ' . $e->getMessage());
        }
    }

    /**
     * Génère toutes les cotisations pour un mois donné (tous les membres actifs)
     */
    public function generer(Request $request)
    {
        $mois = $request->input('mois', date('m'));
        $annee = $request->input('annee', date('Y'));
        
        DB::transaction(function () use ($mois, $annee) {
            $membres = User::where('role', 'membre')->where('statut', 'actif')->get();
            
            foreach ($membres as $membre) {
                $taux = $membre->taux_cotisation ?? $membre->calculerTauxCotisation();
                $part_assure = ($membre->salaire_base * $taux) / 100;
                $part_etat = $part_assure * 2;
                $total = $part_assure + $part_etat;
                
                cotisation::updateOrCreate(
                    [
                        'user_id' => $membre->id,
                        'mois' => $mois,
                        'annee' => $annee,
                    ],
                    [
                        'reference' => 'COT-' . strtoupper(uniqid()),
                        'date_cotisation' => now(),
                        'salaire_base' => $membre->salaire_base,
                        'pourcentage_retenue' => $taux,
                        'part_assure' => $part_assure,
                        'part_etat' => $part_etat,
                        'montant' => $total,
                        'mode_paiement' => 'espece',
                        'statut' => 'impaye',
                        'numero_ordre' => null,
                    ]
                );
            }
            
            $this->renumeroter($mois, $annee);
        });
        
        return redirect()->route('cotisations.index', ['mois' => $mois, 'annee' => $annee])
            ->with('success', 'Cotisations générées pour ' . $mois . '/' . $annee);
    }

    /**
     * Bascule le statut d'une cotisation (payé/impayé)
     */
    public function toggleStatus($id)
    {
        $cotisation = cotisation::findOrFail($id);
        $cotisation->statut = ($cotisation->statut === 'paye') ? 'impaye' : 'paye';
        
        if ($cotisation->statut === 'paye') {
            $cotisation->date_cotisation = now();
        }
        
        $cotisation->save();
        
        if (request()->ajax()) {
            return response()->json([
                'success' => true,
                'new_status' => $cotisation->statut,
                'message' => 'Statut mis à jour !'
            ]);
        }
        
        return back()->with('success', 'Statut mis à jour.');
    }

    /**
     * Renumérotation automatique des numéros d'ordre
     */
    private function renumeroter($mois, $annee)
    {
        $cotisations = cotisation::where('mois', $mois)
            ->where('annee', $annee)
            ->orderBy('user_id')
            ->get();
        
        $i = 1;
        foreach ($cotisations as $cotisation) {
            $cotisation->numero_ordre = $i;
            $cotisation->saveQuietly();
            $i++;
        }
    }

    

public function show($id)
{
    $cotisation = cotisation::with('user')->findOrFail($id);
    
    return response()->json([
        'success' => true,
        'data' => [
            'id' => $cotisation->id,
            'membre' => $cotisation->user->name,
            'matricule' => $cotisation->user->matricule ?? '—',
            'salaire_base' => number_format($cotisation->salaire_base ?? $cotisation->user->salaire_base, 0, ',', ' '),
            'taux' => $cotisation->pourcentage_retenue ?? '—',
            'part_assure' => number_format($cotisation->part_assure, 0, ',', ' '),
            'part_etat' => number_format($cotisation->part_etat, 0, ',', ' '),
            'montant' => number_format($cotisation->montant, 0, ',', ' '),
            'mois' => $cotisation->mois,
            'annee' => $cotisation->annee,
            'mode_paiement' => $cotisation->mode_paiement,
            'statut' => $cotisation->statut,
            'date_cotisation' => $cotisation->date_cotisation->format('d/m/Y'),
            'preuve_paiement' => $cotisation->preuve_paiement,
            'notes' => $cotisation->notes,
        ]
    ]);

    $cotisation = cotisation::with('user')->findOrFail($id);
    return redirect()->route('dashboard', ['view' => 'cotisations'], compact('cotisation'));

    
}

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}