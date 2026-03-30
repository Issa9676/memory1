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
    public function index()
    {


        $user = auth()->user();

    if ($user->role === 'admin') {
        // L'admin voit tout, avec les infos de l'utilisateur et de l'établissement
        $remboursements = Remboursement::with(['user', 'etablissement'])->latest()->get();
    } else {
        // Le membre ne voit que ses propres demandes
        $remboursements = Remboursement::where('user_id', $user->id)->with('etablissement')->latest()->get();
    }

    
    
        
        $cotisations = Cotisation::all();
        $membres=User::all();
        $etablissements = Etablissement::all();
        $total_membres = User::where('role', 'membre')->count();
        $total_cotisations = cotisation::where('statut', 'paye')->sum('montant');
        $total_remboursements = remboursement::where('statut', 'approuve')->sum('montant_rembourse');
        $demandes_en_attente = remboursement::where('statut', 'en_attente')->count();
        $CotisatisationsEnAttente = cotisation::where('statut', 'impaye')->count();
        $etablissement_count=Etablissement::count();
            
        $membresActifs= User::where("statut", 'actif')->count();
        $membresInactifs= User::where("statut", 'inactif')->count();
        $membresSuspendu= User::where("statut", 'suspendu')->count();
        // Initialiser un tableau de 12 mois à 0
$tousLesMois = array_fill(1, 12, 0);
$nomsMois = ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Juin', 'Juil', 'Août', 'Sept', 'Oct', 'Nov', 'Déc'];

// Cotisations
$cotisDataRaw = cotisation::where('statut', 'paye')
    ->where('annee', date('Y'))
    ->selectRaw('mois, SUM(montant) as total')
    ->groupBy('mois')
    ->pluck('total', 'mois')
    ->toArray();
$finalCotisMensuelles = array_replace($tousLesMois, $cotisDataRaw);

// Remboursements
$rembDataRaw = remboursement::where('statut', 'approuve')
    ->selectRaw('MONTH(date_demande) as mois, SUM(montant_rembourse) as total')
    ->groupBy('mois')
    ->pluck('total', 'mois')
    ->toArray();
$finalRembMensuclles = array_replace($tousLesMois, $rembDataRaw);
    

    $statutCotisRaw = cotisation::selectRaw('statut, COUNT(*) as total')
    ->groupBy('statut')
    ->pluck('total', 'statut')
    ->toArray();

$dataCotisations = [
    'Payé' => $statutCotisRaw['paye'] ?? 0,
    'Impayé' => $statutCotisRaw['impaye'] ?? 0,
];

// --- STATUTS REMBOURSEMENTS ---
$statutRembRaw = remboursement::selectRaw('statut, COUNT(*) as total')
    ->groupBy('statut')
    ->pluck('total', 'statut') // Correction ici : pas de virgule dans le pluck
    ->toArray();

$dataRemboursements = [
    'Approuvé' => $statutRembRaw['approuve'] ?? 0,
    'En attente' => $statutRembRaw['en_attente'] ?? 0,
    'Rejeté' => $statutRembRaw['rejete'] ?? 0,
];

        return view('dashboard', $data, compact(
            'membres', 'total_membres', 'total_cotisations', 'total_remboursements',
    'demandes_en_attente', 'etablissement_count', 'cotisations', 'remboursements',
    'etablissements', 'membresActifs','membresInactifs', 'membresSuspendu', 'CotisatisationsEnAttente',
    'dataCotisations', 'dataRemboursements','finalCotisMensuelles',
    'finalRembMensuclles',
    'nomsMois' // On envoie ces deux variables propres
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
