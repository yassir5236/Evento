<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    // Afficher la liste des utilisateurs
    public function index()
    {
        $users = User::where('role', 'user')->orWhere('role', 'organizer')->get();
        return view('admin.users', compact('users'));
    }

    // Afficher le formulaire de création d'un nouvel utilisateur
    public function create()
    {
        return view('users.create'); // Afficher le formulaire de création d'utilisateur
    }

    // Enregistrer un nouvel utilisateur dans la base de données
    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'image' => 'nullable|image|max:2048', // Optionnel : image de profil de l'utilisateur
            'role' => 'required|string',
            'status' => 'required|boolean', // Nouveau champ pour le statut de l'utilisateur
        ]);

        // Créer un nouvel utilisateur
        User::create($request->all());

        // Rediriger avec un message de succès
        return redirect()->route('admin.users')->with('success', 'User created successfully.');
    }

    // Afficher les détails d'un utilisateur spécifique
    public function show(User $user)
    {
        return view('users.show', compact('user')); // Afficher la vue avec les détails de l'utilisateur
    }

    // Afficher le formulaire pour éditer un utilisateur existant
    public function edit(User $user)
    {
        return view('users.edit', compact('user')); // Afficher le formulaire d'édition de l'utilisateur
    }

    // Mettre à jour les données d'un utilisateur dans la base de données
    public function update(Request $request, User $user)
    {
        // Validation des données
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:8',
            'image' => 'nullable|image|max:2048', // Optionnel : image de profil de l'utilisateur
            'role' => 'required|string',
            'status' => 'required|boolean', // Nouveau champ pour le statut de l'utilisateur
        ]);

        // Mettre à jour les données de l'utilisateur
        $user->update($request->all());

        // Rediriger avec un message de succès
        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    // Supprimer un utilisateur de la base de données (soft delete)
    // public function destroy(User $user)
    // {
    //     if ($user->role === 'user' || $user->role === 'organizer' ) {
    //         $user->delete();
    //         return redirect()->route('admin.users')->with('success', 'User deleted successfully.');
    //     } else {
    //         return redirect()->route('admin.users')->with('error', 'Cannot delete user with role other than "user".');
    //     }
    // }

    // Supprimer un utilisateur de la base de données (soft delete)
    public function destroy(User $user)
    {
        $user->delete();

        // Rediriger avec un message de succès
        return redirect()->route('users.index')->with('success', 'User soft-deleted successfully.');
    }
}
