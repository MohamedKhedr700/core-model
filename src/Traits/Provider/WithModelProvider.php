<?php

namespace Raid\Core\Model\Traits\Provider;

use Illuminate\Foundation\AliasLoader;
use Raid\Core\Model\Models\Contracts\ModelInterface;
use Raid\Core\Model\Models\TransparentModel;

trait WithModelProvider
{
    /**
     * Register config.
     */
    private function registerConfig(): void
    {
        $configResourcePath = glob(__DIR__.'/../../../config/*.php');

        foreach ($configResourcePath as $config) {

            $this->publishes([
                $config => config_path(basename($config)),
            ], 'config-model');
        }
    }

    /**
     * Register helpers.
     */
    private function registerHelpers(): void
    {
        $helpers = glob(__DIR__.'/../../Helpers/*.php');

        foreach ($helpers as $helper) {
            require_once $helper;
        }
    }

    /**
     * Register commands.
     */
    private function registerCommands(): void
    {
        $this->commands($this->commands);
    }

    /**
     * Register model interface.
     */
    private function registerModel(): void
    {
        $this->registerTransparentModel();
        $this->registerModelManager();
    }

    /**
     * Register a transparent model.
     */
    private function registerTransparentModel(): void
    {
        $parentModel = config('model.transparent_model', Illuminate\Database\Eloquent\Model::class);

        AliasLoader::getInstance()->alias(TransparentModel::class, $parentModel);
    }

    /**
     * Register model manager.
     */
    private function registerModelManager(): void
    {
        $modelManager = config('model.model_manager', null);

        $this->app->bind(ModelInterface::class, $modelManager);
    }
}
