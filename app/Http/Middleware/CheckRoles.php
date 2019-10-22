<?php

namespace App\Http\Middleware;

use Closure;

class CheckRoles
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $roles)
    {
        if ($request->user()->hasRole('Nologin')) {
            //déconnecter l'utilisateur
           /*  Auth::logout(); */
            //rediriger vers la route login avec le message de session
            return redirect()->route('home')->with(['permission' => "Ressource non autorisee, contacter l'Administrateur pour plus d'infos ..."]);
            //oubien sur une page speciale par exemple pour prendre contact avec l'admin
            }

        $rolesAny = explode("|", $roles);

        //cette requette nous permet de vérifier si l'utilisateur connecté n'a pas un des role passé en paramètre
        if (! $request->user()->hasAnyRoles($rolesAny)) {

            flash("Vous devez être connecté pour voir cette page !")->error();
        
            return redirect("/login");
        }
        return $next($request);
    }
}


/* this->middleware('roles: Administrateur|Gestionnaire'); */