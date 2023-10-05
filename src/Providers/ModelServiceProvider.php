<?php

namespace Raid\Core\Model\Providers;

use Illuminate\Support\ServiceProvider;
use Raid\Core\Model\Commands\CreateModelCommand;
use Raid\Core\Model\Commands\CreateModelFilterCommand;
use Raid\Core\Model\Commands\PublishModelCommand;
use Raid\Core\Model\Traits\Provider\WithModelProvider;

class ModelServiceProvider extends ServiceProvider
{
    use WithModelProvider;

    /**
     * The commands to be registered.
     */
    protected array $commands = [
        CreateModelCommand::class,
        CreateModelFilterCommand::class,
        PublishModelCommand::class,
    ];

    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->registerConfig();
        $this->registerHelpers();
        $this->registerCommands();
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->registerModel();
    }
}
