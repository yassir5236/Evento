<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;





class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, ...$roles)
    {
        $user = Auth::user();

        // Vérifier si l'utilisateur est connecté
        if (!$user) {
            abort(401, 'Unauthorized');
        }

        // Vérifier si le rôle de l'utilisateur est autorisé
        if (!in_array($user->role, $roles)) {
            abort(403, 'Forbidden');
        }

        return $next($request);
    }
}

