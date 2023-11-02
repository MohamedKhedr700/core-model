<?php

namespace Raid\Core\Model\Models;

use MongoDB\Laravel\Eloquent\Model;

class MongodbModel extends Model
{
    /**
     * Get model primary key name.
     */
    public function getKeyName(): string
    {
        return '_id';
    }
}