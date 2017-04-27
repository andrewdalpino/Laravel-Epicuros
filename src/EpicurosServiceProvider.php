<?php

namespace AndrewDalpino\LaravelEpicuros;

use AndrewDalpino\LaravelEpicuros\Commands\GenerateRSAKeys;
use AndrewDalpino\LaravelEpicuros\Commands\GenerateSharedSecret;
use AndrewDalpino\Epicuros\Epicuros;
use AndrewDalpino\Epicuros\KeyRepository;
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

        if (! $this->isLumen()) {
            $this->publishes([
                __DIR__ . '/config/epicuros.php' => config_path('epicuros.php'),
            ]);
        }
    }

    /**
     * Register the repository services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Epicuros::class, function () use ($key) {
            return new Epicuros(
                config('epicuros.algorithm'),
                new KeyRepository(config('epicuros.signing_keys', [])),
                new KeyRepository(config('epicuros.verifying_keys', [])),
                [
                    'expire' => config('epicuros.token_expire', 60),
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

    /**
     * @return bool
     */
    protected function isLumen() : bool
    {
        return str_contains($this->app->version(), 'Lumen');
    }
}
