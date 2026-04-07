<?php

namespace App\Http\Controllers;
use App\Models\cotisation;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class CotisationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $cotisations = Cotisation::all();
        return view('cotisations.index', compact('cotisations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::where('role', 'membre')->get();
        return view('cotisations.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // 1. Validation stricte
    $request->validate([
        'user_id' => 'required|exists:users,id',
        'montant' => 'required|numeric|min:0',
        'date_cotisation' => 'required|date',
        'mois' => 'required|string',
        'annee' => 'required|integer',
        'statut' => 'required|in:paye,impaye,annule',
        'mode_paiement' => 'required',
        'preuve_paiement' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    // 2. Vérification des impayés du membre (et non de l'admin)
    $dejaImpaye = cotisation::where('user_id', $request->user_id)
        ->where('statut', 'impaye')
        ->exists();

    if ($dejaImpaye) {
        return back()->withInput()->with('error', 'Ce membre a déjà une cotisation impayée. Régularisez d\'abord.');
    }

    try {
        $data = $request->all();
        $data['reference'] = 'COT-' . strtoupper(uniqid()) . '-' . $request->user_id;
        
        if ($request->hasFile('preuve_paiement')) {
            $path = $request->file('preuve_paiement')->store('preuves', 'public');
            $data['preuve_paiement'] = $path;
        }
                    
        cotisation::create($data);

        return back()->with('success', 'La cotisation a été enregistrée avec succès.');

    } catch (\Exception $e) {
        return back()->withInput()->with('error', 'Erreur : Ce membre a déjà cotisé pour ce mois/année.');
    }
}

public function toggleStatus($id)
{
    $cotisation = Cotisation::findOrFail($id);
    
    // Bascule le statut
    $cotisation->statut = ($cotisation->statut === 'paye') ? 'impaye' : 'paye';
    
    // Optionnel : Enregistrer qui a validé et quand
    if($cotisation->statut === 'paye') {
        $cotisation->date_cotisation = now(); 
    }

    $cotisation->save();

    return response()->json([
        'success' => true,
        'new_status' => $cotisation->statut,
        'message' => 'Statut mis à jour avec succès !'
    ]);
}


    /**
     * Display the specified resource.
     */
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
