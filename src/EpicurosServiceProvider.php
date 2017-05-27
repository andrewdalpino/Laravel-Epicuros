<?php

namespace AndrewDalpino\LaravelEpicuros;

use AndrewDalpino\Epicuros\Epicuros;
use AndrewDalpino\LaravelEpicuros\Commands\GenerateRSAKeys;
use AndrewDalpino\LaravelEpicuros\Commands\GenerateSharedSecret;
use Laravel\Lumen\Application as LumenApplication;
use Illuminate\Foundation\Application as LaravelApplication;
use Illuminate\Support\ServiceProvider;

class EpicurosServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred until requested by the container.
     *
     * @var  bool  $defer
     */
    protected $defer = true;

    /**
     * Bootstrap the repository service.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                GenerateRSAKeys::class,
                GenerateSharedSecret::class,
            ]);
        }

        if ($this->app instanceof LaravelApplication) {
            $this->publishes([
                __DIR__ . '/config/epicuros.php' => config_path('epicuros.php'),
            ]);
        } elseif ($this->app instanceof LumenApplication) {
            $this->app->configure('epicuros');
        }
    }

    /**
     * Register the repository services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Epicuros::class, function () {
            return new Epicuros(
                config('epicuros.signing_key.identifier'),
                config('epicuros.signing_key.key'),
                config('epicuros.signing_key.algorithm'),
                config('epicuros.verifying_keys', []),
                [
                    'expire' => config('epicuros.tokens_expire', 60),
                ]
            );
        });

        $this->app->alias(Epicuros::class, 'epicuros');
    }

    /**
     * @return array
     */
    public function provides() : array
    {
        return [
            Epicuros::class,
            'epicuros',
        ];
    }
}
