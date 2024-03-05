<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    // public function store(Request $request): RedirectResponse
    // {
    //     $request->validate([
    //         'name' => ['required', 'string', 'max:255'],
    //         'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
    //         'password' => ['required', 'confirmed', Rules\Password::defaults()],
    //     ]);
    
    //     // Vérifie si le champ "role" est vide et attribue une valeur par défaut si nécessaire
    //     $role = $request->input('role', 'user');
    
    //     $user = User::create([
    //         'name' => $request->input('name'),
    //         'email' => $request->input('email'),
    //         'password' => Hash::make($request->input('password')),
    //         'role' => $role,
    //     ]);
    
    //     event(new Registered($user));
    
    //     Auth::login($user);
    
    //     return redirect(RouteServiceProvider::HOME);
    // }



public function store(Request $request): RedirectResponse
{
    $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'confirmed', Rules\Password::defaults()],
        // 'image' => ['required', 'image', 'max:2048'], // Exemple: taille maximale de 2 Mo pour l'image
    ]);

    $imageName = time() . '.' . $request->image->extension();
    $request->image->storeAs('public/images', $imageName);

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'role' => $request->role,
        'image' => 'storage/images/' . $imageName, // Chemin de l'image dans le stockage
    ]);

    event(new Registered($user));

    Auth::login($user);

    return redirect(RouteServiceProvider::HOME);
}


    
    
}
