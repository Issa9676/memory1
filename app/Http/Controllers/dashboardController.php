<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cotisation;
use App\Models\remboursement;

use App\Models\Etablissement;


use App\Models\User;


class dashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    $view = $request->get('view', 'dashboard');
    
    // === PAGE MEMBRES ===
    if ($view === 'membres') {
        $query = User::where('role', 'membre');
        
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('matricule', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            });
        }
        
        if ($request->filled('statut')) {
            $query->where('statut', $request->statut);
        }
        
        $membres = $query->get();
        
        $nomsMois = ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Juin', 'Juil', 'Août', 'Sept', 'Oct', 'Nov', 'Déc'];
        $dataCotisations = ['Payé' => 0, 'Impayé' => 0];
        $dataRemboursements = ['Approuvé' => 0, 'En attente' => 0, 'Rejeté' => 0];
        $finalCotisMensuelles = [];
        $finalRembMensuclles = [];
        
        return view('dashboard', compact('view', 'membres', 'nomsMois', 'dataCotisations', 'dataRemboursements', 'finalCotisMensuelles', 'finalRembMensuclles'));
    }
    
    // === DASHBOARD PRINCIPAL ===
    $user = auth()->user();

    if ($user->role === 'admin') {
        $remboursements = remboursement::with(['user', 'etablissement'])->latest()->get();
    } else {
        $remboursements = remboursement::where('user_id', $user->id)->with('etablissement')->latest()->get();
    }
    
    $cotisations = cotisation::all();
    $membres = User::all();
    $etablissements = Etablissement::all();
    $total_membres = User::where('role', 'membre')->count();
    $total_cotisations = cotisation::where('statut', 'paye')->sum('montant');
    $total_remboursements = remboursement::where('statut', 'approuve')->sum('montant_rembourse');
    $demandes_en_attente = remboursement::where('statut', 'en_attente')->count();
    $CotisatisationsEnAttente = cotisation::where('statut', 'impaye')->count();
    $etablissement_count = Etablissement::count();
        
    $membresActifs = User::where("statut", 'actif')->count();
    $membresInactifs = User::where("statut", 'inactif')->count();
    $membresSuspendu = User::where("statut", 'suspendu')->count();
    
    $tousLesMois = array_fill(1, 12, 0);
    $nomsMois = ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Juin', 'Juil', 'Août', 'Sept', 'Oct', 'Nov', 'Déc'];

    $cotisDataRaw = cotisation::where('statut', 'paye')->where('annee', date('Y'))
        ->selectRaw('(mois + 0) as mois_num, SUM(montant) as total')
        ->groupBy('mois_num')->pluck('total', 'mois_num')->toArray();
    $finalCotisMensuelles = array_values(array_replace($tousLesMois, $cotisDataRaw));

    $rembDataRaw = remboursement::where('statut', 'approuve')
        ->selectRaw('MONTH(date_demande) as mois, SUM(montant_rembourse) as total')
        ->groupBy('mois')->pluck('total', 'mois')->toArray();
    $finalRembMensuclles = array_replace($tousLesMois, $rembDataRaw);

    $statutCotisRaw = cotisation::selectRaw('statut, COUNT(*) as total')->groupBy('statut')->pluck('total', 'statut')->toArray();
    $dataCotisations = ['Payé' => $statutCotisRaw['paye'] ?? 0, 'Impayé' => $statutCotisRaw['impaye'] ?? 0];

    $statutRembRaw = remboursement::selectRaw('statut, COUNT(*) as total')->groupBy('statut')->pluck('total', 'statut')->toArray();
    $dataRemboursements = [
        'Approuvé' => $statutRembRaw['approuve'] ?? 0,
        'En attente' => $statutRembRaw['en_attente'] ?? 0,
        'Rejeté' => $statutRembRaw['rejete'] ?? 0,
    ];

    return view('dashboard', compact(
        'view', 'membres', 'total_membres', 'total_cotisations', 'total_remboursements',
        'demandes_en_attente', 'etablissement_count', 'cotisations', 'remboursements',
        'etablissements', 'membresActifs', 'membresInactifs', 'membresSuspendu',
        'CotisatisationsEnAttente', 'dataCotisations', 'dataRemboursements',
        'finalCotisMensuelles', 'finalRembMensuclles', 'nomsMois'
    ));
}
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
