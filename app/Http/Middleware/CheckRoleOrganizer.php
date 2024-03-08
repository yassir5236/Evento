<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRoleOrganizer
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
        // Vérifie si l'utilisateur est authentifié et s'il est un organisateur
        if ($request->user() && $request->user()->isOrganizer()) {
            // L'utilisateur est un organisateur, on laisse passer la requête
            return $next($request);
        }
        
        // Sinon, l'utilisateur n'est pas autorisé à accéder à cette fonctionnalité, on renvoie une réponse non autorisée
        return abort(403, 'Unauthorized action.');
    }
}
