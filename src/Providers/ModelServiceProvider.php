<?php

namespace Raid\Core\Model\Providers;

use Illuminate\Support\ServiceProvider;
use Raid\Core\Model\Traits\Provider\WithModelProvider;

class ModelServiceProvider extends ServiceProvider
{
    use WithModelProvider;

    /**
     * The commands to be registered.
     */
    protected array $commands = [];

    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->registerConfig();
        $this->registerHelpers();
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->registerModel();
    }
}
