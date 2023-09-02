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
            ], 'config');
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
     * Register model interface.
     */
    private function registerModel(): void
    {
        $this->registerBaseModel();
        $this->registerModelHandler();
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
     * Register model handler.
     */
    private function registerModelHandler(): void
    {
        $modelHandler = config('model.model_handler', '');

        $this->app->bind(ModelInterface::class, $modelHandler);
    }

}
