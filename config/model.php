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
    | Transparent Model
    |--------------------------------------------------------------------------
    |
    | This option allows you to specify the transparent model for the model manager.
    |
    */

    'transparent_model' => \Raid\Core\Model\Models\Mongodb\MongodbModel::class,
];
