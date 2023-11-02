<?php

namespace Raid\Core\Model\Traits\Model;

use Illuminate\Support\Arr;

trait Attributable
{
    use WithFillableAttribute;

    /**
     * Shared attributes.
     */
    public const SHARED_ATTRIBUTES = [];

    /**
     * Get shared attributes.
     */
    public static function sharedAttributes(): array
    {
        return static::SHARED_ATTRIBUTES;
    }

    /**
     * Get a model primary key.
     */
    public static function primaryKey(): string
    {
        return (new static())->getKeyName();
    }

    /**
     * Get model id.
     */
    public function getId(): ?string
    {
        return $this->attribute(static::primaryKey());
    }

    /**
     * Get model attribute or value by given key.
     */
    public function attribute(string $key = null, $default = null): mixed
    {
        return Arr::get($this->attributes, $key) ?? $default;
    }

    /**
     * Get model attributes by given keys.
     */
    public function attributes(...$attributes): array
    {
        if (empty($attributes)) {
            return $this->attributes;
        }

        return Arr::only($this->attributes, $attributes);
    }

    /**
     * Determine if the model has the given attribute.
     */
    public function hasAttribute(string $key): bool
    {
        return Arr::has($this->attributes, $key);
    }

    /**
     * Save model attributes.
     */
    public function saveAttributes(bool $forceFill = true, array $attributes = []): static
    {
        if ($forceFill) {
            parent::save($attributes);
        }

        return $this;
    }
}
