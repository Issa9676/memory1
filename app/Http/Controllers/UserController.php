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
    public function index()
    {   
        $membres=User::where('role', 'membre')->orderBy('created_at', 'desc')->paginate(10);
        return view('users.index', compact('membres'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $membres =User::where('role','membre')->orderBy('created_at', 'desc')->paginate(10);
        return view('users.create', compact('membres')); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|string|max:255',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:8|confirmed',
            'role'=>'required|in:admin,membre',
            'statut'=>'required|in:actif,inactif,suspendu'
            ]);
            User::create([
                'name'=> $request->name,
                'email'=>$request->email,
                'password'=>Hash::make($request->password),
                'role'=> $request->role,
                'statut'=>$request->statut,
                ]);

                return redirect()->route('dashboard', ['view' => 'membres'])->with('success', 'Membre ajouté avec succès !');
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
        $membres = User::findOrFail($id);
        return view('dashboard', ['view' => 'membres'], compact('membres'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $membres= User::findOrFail($id);
        $request->validate([
            'name'=>'required|string|max:255',
            'email'=>'required|email|unique:users,email,' . $id,
            'password'=>'nullable|min:8|confirmed',
            'role'=>'required|in:admin,membre',
            'statut'=>'required|in:actif,inactif,suspendu'
            ]);

            $data = $request->only(['name', 'email', 'role', 'statut']);

            if($request->filled('password')) {
                $data['password']= Hash::make($request->password);
            }

            $membres->update($data);

            return redirect()->route('dashboard', ['view' => 'membres'])->with('success', 'Membre mis à jour avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
    $membres = User::findOrFail($id);
    if(auth()->id()==$membres->id){
        return redirect()->back()->with('error', 'Vous ne pouvez pas supprimer votre propre compte ! ');
    }
    $membres->delete();
     return redirect()->route('dashboard', ['view' => 'membres'])->with('success', 'Membre supprimé avec succès.');
    }
}
