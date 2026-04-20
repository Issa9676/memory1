<?php

use App\Http\Controllers\ProfileController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Models\cotisation;
use App\Models\remboursement;
use App\Models\Beneficiaire;
use App\Models\Etablissement;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CotisationController;
use App\Http\Controllers\RemboursementController;
use App\Http\Controllers\EtablissementController;
use App\Http\Controllers\BeneficiaireController;


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
    ->selectRaw('(mois + 0) as mois_num, SUM(montant) as total')
    ->groupBy('mois_num')
    ->pluck('total', 'mois_num')
    ->toArray();
$finalCotisMensuelles = array_values(array_replace($tousLesMois, $cotisDataRaw));

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
Route::resource('users.beneficiaires', BeneficiaireController::class)->except(['show']);
    Route::resource('remboursements', RemboursementController::class );
     Route::resource('etablissements', EtablissementController::class );
      Route::put('/remboursements/{id}', [RemboursementController::class, 'update'])->name('remboursements.update');
     Route::post ('/cotisations/{id}/toggle-status', [CotisationController::class, 'toggleStatus'])->name('cotisations.toggle');
        Route::post('/cotisations/generer', [CotisationController::class, 'generer'])->name('cotisations.generer');
Route::resource('users.beneficiaires', BeneficiaireController::class)->except(['show']);
// Routes AJAX pour les bénéficiaires (à mettre avant la route resource si elle existe)
Route::get('/users/{user}/beneficiaires-data', [BeneficiaireController::class, 'getData']);
Route::get('/beneficiaires/{id}', [BeneficiaireController::class, 'getOne']);
Route::post('/users/{user}/beneficiaires', [BeneficiaireController::class, 'storeAjax']);
Route::put('/beneficiaires/{id}', [BeneficiaireController::class, 'updateAjax']);
Route::delete('/beneficiaires/{id}', [BeneficiaireController::class, 'destroyAjax']);
});



require __DIR__.'/auth.php';

