<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = User::where('role', 'membre');
        
        // Filtre par recherche (nom, matricule, email)
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('matricule', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            });
        }
        
        // Filtre par statut
        if ($request->filled('statut')) {
            $query->where('statut', $request->statut);
        }
        
        // Filtre par localité
        if ($request->filled('localite')) {
            $query->where('localite', $request->localite);
        }
        
        // Récupérer la liste des localités pour le filtre déroulant
        $localites = User::where('role', 'membre')
            ->whereNotNull('localite')
            ->distinct()
            ->pluck('localite');
        
        $membres = $query->latest()->get();
        
        return view('membres.index', compact('membres', 'localites'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $membres = User::where('role', 'membre')->orderBy('created_at', 'desc')->paginate(10);
        return view('users.create', compact('membres'));
    }

    /**
     * Generate a unique matricule
     */
    private function genererMatricule()
    {
        $annee = date('Y');
        $dernier = User::whereYear('created_at', $annee)
            ->where('role', 'membre')
            ->orderBy('id', 'desc')
            ->first();
        
        if ($dernier && $dernier->matricule) {
            $dernierNum = intval(substr($dernier->matricule, -4));
            $num = $dernierNum + 1;
        } else {
            $num = 1;
        }
        
        return 'MUT-' . $annee . '-' . str_pad($num, 4, '0', STR_PAD_LEFT);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
            'fonction' => 'nullable|string|max:255',
            'localite' => 'nullable|string|max:255',
            'contact' => 'nullable|string|max:20',
            'salaire_base' => 'required|numeric|min:0',
            'role' => 'required|in:admin,membre',
            'statut' => 'required|in:actif,inactif,suspendu'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'fonction' => $request->fonction,
            'localite' => $request->localite,
            'contact' => $request->contact,
            'salaire_base' => $request->salaire_base,
            'role' => $request->role,
            'statut' => $request->statut,
            'matricule' => $this->genererMatricule(),
        ]);

        return redirect()->route('dashboard', ['view' => 'membres'])->with('success', 'Adhérent ajouté avec succès ! Matricule : ' . $user->matricule);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::with('beneficiaires')->findOrFail($id);
        return response()->json([
            'success' => true,
            'data' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $membre = User::findOrFail($id);
        return view('dashboard', ['view' => 'membres'], compact('membre'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $membre = User::findOrFail($id);
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|min:8|confirmed',
            'fonction' => 'nullable|string|max:255',
            'localite' => 'nullable|string|max:255',
            'contact' => 'nullable|string|max:20',
            'salaire_base' => 'nullable|numeric|min:0',
            'role' => 'required|in:admin,membre',
            'statut' => 'required|in:actif,inactif,suspendu'
        ]);

        $data = $request->only(['name', 'email', 'role', 'statut', 'fonction', 'localite', 'contact', 'salaire_base']);

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $membre->update($data);

        // Si le salaire a changé, on peut recalculer les cotisations futures
        // (optionnel : déclencher un événement)

        return redirect()->route('dashboard', ['view' => 'membres'])->with('success', 'Adhérent mis à jour avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $membre = User::findOrFail($id);
        
        if (auth()->id() == $membre->id) {
            return redirect()->back()->with('error', 'Vous ne pouvez pas supprimer votre propre compte !');
        }
        
        // Vérifier si l'utilisateur a des cotisations avant suppression
        if ($membre->cotisations()->count() > 0) {
            return redirect()->back()->with('error', 'Impossible de supprimer cet adhérent car il a des cotisations. Utilisez plutôt "Désactiver".');
        }
        
        $membre->delete();
        return redirect()->route('dashboard', ['view' => 'membres'])->with('success', 'Adhérent supprimé avec succès.');
    }
}