<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRoleUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Vérifie si l'utilisateur est authentifié et s'il est un utilisateur ordinaire
        if ($request->user() && $request->user()->isUser()) {
            // L'utilisateur est un utilisateur ordinaire, on laisse passer la requête
            return $next($request);
        }
        
        // Sinon, l'utilisateur n'est pas autorisé à accéder à cette fonctionnalité, on renvoie une réponse non autorisée
        return abort(403, 'Unauthorized action.');
    }
}
