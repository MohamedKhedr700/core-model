<?php

namespace Raid\Core\Model\Traits\Provider;

use Illuminate\Foundation\AliasLoader;
use Raid\Core\Model\Models\Contracts\ModelInterface;

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
        $this->registerBaseModel();
        $this->registerModelManager();
    }

    /**
     * Register a base model.
     */
    private function registerBaseModel(): void
    {
        $baseModel = config('model.base_model', \Illuminate\Database\Eloquent\Model::class);

        AliasLoader::getInstance()->alias(\Raid\Core\Model\Models\BaseModel::class, $baseModel);
    }

    /**
     * Register model manager.
     */
    private function registerModelManager(): void
    {
        $modelManager = config('model.model_manager', '');

        $this->app->bind(ModelInterface::class, $modelManager);
    }

}
