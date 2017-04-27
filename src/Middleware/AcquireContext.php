<?php

namespace AndrewDalpino\LaravelEpicuros\Middleware;

use AndrewDalpino\Epicuros\Epicuros;
use AndrewDalpino\Epicuros\Context;
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
     * @param  mixed  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $token = $request->bearerToken();

        $context = $this->epicuros->acquireContext($token);

        $request->merge(['context' => $context]);

        return $next($request);
    }
}
