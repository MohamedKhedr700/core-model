<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Model Handler
    |--------------------------------------------------------------------------
    | Here you may specify the default model handler.
    |
    |
    */

    'model_handler' => \Raid\Core\Model\Models\Model::class,


    /*
    |--------------------------------------------------------------------------
    | Base Model
    |--------------------------------------------------------------------------
    |
    | This option allows you to specify the base model for model_handler.
    |
    */

    'base_model' => Jenssegers\Mongodb\Eloquent\Model::class,
];