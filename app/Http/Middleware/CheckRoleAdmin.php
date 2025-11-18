<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRoleAdmin
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Verificar si hay un usuario autenticado y si es admin
        if (!auth()->check() || !auth()->user()->isAdmin) {
            // Redirige a la página de productos con mensaje de error
            return redirect()->route('product.show', ['product' => $request->route('product')])
                             ->with('error', 'No autenticado o sin permisos de administración.');
        }

        // Si pasa la verificación, continúa la ejecución normal
        return $next($request);
    }
}
