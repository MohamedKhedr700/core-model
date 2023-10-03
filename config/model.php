<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Model Manager
    |--------------------------------------------------------------------------
    | Here you may specify the default model manager.
    |
    |
    */

    'model_manager' => \Raid\Core\Model\Models\Model::class,


    /*
    |--------------------------------------------------------------------------
    | Base Model
    |--------------------------------------------------------------------------
    |
    | This option allows you to specify the base model for model_manager.
    |
    */

    'base_model' => Jenssegers\Mongodb\Eloquent\Model::class,
];