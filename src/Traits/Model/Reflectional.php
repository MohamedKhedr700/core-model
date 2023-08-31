<?php

namespace Raid\Core\Model\Traits\Model;

use ReflectionClass;

trait Reflectional
{
    /**
     * Get reflection class.
     */
    public static function getReflection(): ReflectionClass
    {
        return new ReflectionClass(static::class);
    }
}
