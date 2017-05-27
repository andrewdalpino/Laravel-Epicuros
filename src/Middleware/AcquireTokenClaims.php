<?php

namespace AndrewDalpino\LaravelEpicuros\Middleware;

use AndrewDalpino\Epicuros\Epicuros;
use Closure;

class AcquireContext
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
        $request->merge([
            'claims' => $this->epicuros->getTokenClaims($request->bearerToken()),
        ]);

        return $next($request);
    }
}
