<?php

namespace App\Http\Middleware;

use Closure;

class CheckAdministrator
{
    public function handle($request, Closure $next)
    {
        // Vérifie si l'utilisateur est connecté
        if (auth()->check()) {
            // Vérifie si l'attribut "administrator" de l'utilisateur est défini sur true
            if (auth()->user()->administrator) {
                return $next($request);
            }
        }

        // Si l'utilisateur n'est pas un administrateur, vous pouvez rediriger ou renvoyer une réponse d'erreur ici.
        return redirect()->route('dashboard')->with('error', 'Vous n\'avez pas les autorisations nécessaires.');
    }
}
