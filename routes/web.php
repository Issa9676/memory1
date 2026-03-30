<?php

use App\Http\Controllers\ProfileController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Models\cotisation;
use App\Models\remboursement;
use App\Models\Etablissement;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CotisationController;
use App\Http\Controllers\RemboursementController;
use App\Http\Controllers\EtablissementController;


Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {


    $etablissements = Etablissement::all();
    $cotisations = cotisation::all();
    $user = auth()->user();

    if ($user->role === 'admin') {
        // L'admin voit tout, avec les infos de l'utilisateur et de l'établissement
        $remboursements = remboursement::with(['user', 'etablissement'])->latest()->get();
    } else {
        // Le membre ne voit que ses propres demandes
        $remboursements = remboursement::where('user_id', $user->id)->with('etablissement')->latest()->get();
    }
    
    $CotisatisationsEnAttente = cotisation::where('statut', 'impaye')->count();
    $membresInactifs= User::where("statut", 'inactif')->count();
        $membresSuspendu= User::where("statut", 'suspendu')->count();
    
    $membres=User::all();
    $total_membres = User::where('statut','actif')->count();
     $etablissement_count=Etablissement::count();
    $total_cotisations = cotisation::where('statut', 'paye')->sum('montant');
$total_remboursements = remboursement::where('statut', 'approuve')
    ->sum('montant_rembourse');

    $demandes_en_attente = remboursement::where('statut', 'en_attente')
    ->count();


     $membresActifs= User::where("statut", 'actif')->count();
         
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

    return view('dashboard', compact(
     'membres', 'total_membres', 'total_cotisations', 'total_remboursements',
    'demandes_en_attente', 'etablissement_count', 'cotisations', 'remboursements',
    'etablissements', 'membresActifs','membresInactifs', 'membresSuspendu', 'CotisatisationsEnAttente',
    'dataCotisations', 'dataRemboursements','finalCotisMensuelles',
    'finalRembMensuclles',
    'nomsMois' // On envoie ces deux variables propres
    ));

})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('users', UserController::class );
    Route::resource('cotisations', CotisationController::class );
    Route::resource('remboursements', RemboursementController::class );
     Route::resource('etablissements', EtablissementController::class );
     Route::post ('/cotisations/{id}/toggle-status', [CotisationController::class, 'toggleStatus'])->name('cotisations.toggle');

});



require __DIR__.'/auth.php';

