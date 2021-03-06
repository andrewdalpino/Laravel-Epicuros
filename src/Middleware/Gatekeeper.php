<?php

namespace AndrewDalpino\LaravelEpicuros\Middleware;

use AndrewDalpino\Epicuros\Epicuros;
use Closure;

class Gatekeeper
{
    /**
     * @var  \AndrewDalpino\Epicuros\Epicuros  $epicuros
     */
    protected $epicuros;

    /**
     * Constructor.
     *
     * @param  Epicuros  $epicuros
     */
    public function __construct(Epicuros $epicuros)
    {
        $this->epicuros = $epicuros;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $this->epicuros->authorize($request->bearerToken());

        return $next($request);
    }
}
