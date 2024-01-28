<?php

namespace Raid\Core\Model\Traits\Model;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

trait WithFactory
{
    use HasFactory;

    /**
     * The model factory instance.
     */
    protected static string $factory;

    /**
     * Get factory class.
     */
    public static function getFactoryClass(): string
    {
        return static::$factory;
    }

    /**
     * Create a new factory instance for the model.
     */
    protected static function newFactory(): Factory
    {
        return static::$factory::new();
    }
}