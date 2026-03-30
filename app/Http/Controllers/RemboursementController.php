<?php

namespace App\Http\Controllers;
use App\Models\remboursement;
use Illuminate\Http\Request;
use App\Models\Etablissement;

class remboursementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
     $user = auth()->user();

    if ($user->role === 'admin') {
        // L'admin voit tout, avec les infos de l'utilisateur et de l'établissement
        $remboursements = remboursement::with(['user', 'etablissement'])->latest()->get();
    } else {
        // Le membre ne voit que ses propres demandes
        $remboursements = remboursement::where('user_id', $user->id)->with('etablissement')->latest()->get();
    }

    return view('remboursements.index', compact('remboursements'));   
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $etablissements = Etablissement::all();
        return view('remboursements.create', compact('etablissements'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         // 1. Validation de base des entrées
    $request->validate([
        'etablissement_id' => 'required|exists:etablissements,id',
        'montant_facture' => 'required|numeric|min:1',
        'motif' => 'required|string|max:255',
        'facture_path' => 'required|image|mimes:jpeg,png,jpg|max:2048', // 2MB max
    ]);

    $user = auth()->user();

    // 2. LE GARDE-FOU : Vérification des cotisations impayées
    $cotisationsImpayees = \App\Models\cotisation::where('user_id', $user->id)
        ->where('statut', 'impaye')
        ->exists();

   if ($cotisationsImpayees) {
        return back()->withErrors(['error' => 'Action impossible : Vous avez des cotisations en attente de paiement.']);
    }

    // 3. RÉCUPÉRATION DU TAUX RÉEL (Sécurité Serveur)
    $etablissement = \App\Models\Etablissement::findOrFail($request->etablissement_id);
    $taux = $etablissement->taux_prise_en_charge / 100;
    
    // Calcul automatique du montant à rembourser
    $montantRembourse = $request->montant_facture * $taux;

    // 4. GESTION DU FICHIER (Stockage)
    if ($request->hasFile('facture_path')) {
        $path = $request->file('facture_path')->store('factures', 'public');
    }

    // 5. CRÉATION DE L'ENREGISTREMENT
    \App\Models\remboursement::create([
        'user_id' => $user->id,
        'etablissement_id' => $etablissement->id,
        'montant_facture' => $request->montant_facture,
        'montant_rembourse' => $montantRembourse,
        'facture_path' => $path ?? null,
        'motif' => $request->motif,
        'statut' => 'en_attente',
        'date_demande' => now(),
    ]);

    return redirect()->route('dashboard', ['view' => 'remboursements'])->with('success', 'Votre demande a été soumise avec succès.');
        
    }

   


    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
