<?php

namespace qfproject\Http\Middleware;

use Closure;

/**
 * ---------------------------------------------------------------------------
 * Clases agregadas.
 * ---------------------------------------------------------------------------
 */

use Illuminate\Contracts\Auth\Guard;

class Docente
{
    /**
     * ---------------------------------------------------------------------------
     * Implementación de Guard.
     *
     * @var Guard
     * ---------------------------------------------------------------------------
     */

    protected $auth;

    /**
     * ---------------------------------------------------------------------------
     * Crea una nueva instancia de filtro.
     *
     * @param  Guard  $auth
     * @return void
     * ---------------------------------------------------------------------------
     */

    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * ---------------------------------------------------------------------------
     * Maneja una solicitud entrante.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     * ---------------------------------------------------------------------------
     */

    public function handle($request, Closure $next)
    {
        if ($this->auth->user()->administrador() || $this->auth->user()->asistente() || $this->auth->user()->docente()) {
            return $next($request);
        } else {
            abort(403);
        }
    }
}
