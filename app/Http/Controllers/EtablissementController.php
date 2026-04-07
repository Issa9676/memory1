<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Etablissement;
class EtablissementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $etablissements = Etablissement::all();
        return view('etablissements.index', compact('etablissements'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('etablissements.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    { 
        $request->validate([
        'nom' => 'required|string|max:255',
        'type' => 'required|in:hopital,clinique,pharmacie,laboratoire',
        'adresse' => 'nullable|string',
        'ville' => 'nullable|string',
        'telephone' => 'nullable|string',
        'email' => 'nullable|email',
        'contact_personne' => 'nullable|string',
        'statut' => 'required|in:partenaire,non_partenaire',
        'taux_prise_en_charge' => 'nullable|numeric|between:0,100',
        'services' => 'nullable|string',
    ]);

    $services_string = implode(', ', $request->input('services_list', []));
    $request->merge(['services' => $services_string]);
    Etablissement::create($request->all());

    return redirect()->route('dashboard', ['view' => 'etablissements'])
                     ->with('success', 'Établissement ajouté avec succès !');
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
        $etablissements = Etablissement::findOrFail($id);
    return view('dashboard', ['view' => 'etablissements'], compact('etablissements'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $request->validate([
         'nom' => 'required|string|max:255',
        'type' => 'required|in:hopital,clinique,pharmacie,laboratoire',
        'adresse' => 'nullable|string',
        'ville' => 'nullable|string',
        'telephone' => 'nullable|string',
        'email' => 'nullable|email',
        'contact_personne' => 'nullable|string',
        'statut' => 'required|in:partenaire,non_partenaire',
        'taux_prise_en_charge' => 'nullable|numeric|between:0,100',
        'services' => 'nullable|string',
        
    ]);
         $etablissement = Etablissement::findOrFail($id);
    $etablissement->update($request->all());

    return redirect()->route('dashboard', ['view' => 'etablissements'])
                     ->with('success', 'Établissement mis à jour avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $etablissements = Etablissement::findOrFail($id);
        $etablissements->delete();
     return redirect()->route('dashboard', ['view' => 'etablissements'])->with('success', 'Etablissement supprimé avec succès.');
    }
}
