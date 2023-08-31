<?php

namespace Raid\Core\Model\Traits\Model;

use Illuminate\Support\Arr;

trait Changeable
{
    /**
     * Changes without.
     */
    protected array $changesWithout = [
        'password', 'updated_at',
    ];

    /**
     * Get model changes without given attributes.
     */
    public function changesWithout(...$without): array
    {
        $changesWithout = array_merge($this->changesWithout, $without);

        return Arr::except($this->getChanges(), $changesWithout);
    }

    /**
     * Get model changes with only given attributes.
     */
    public function onlyChanges(...$only): array
    {
        return Arr::only($this->getChanges(), $only);
    }

    /**
     * Determine if the model has changes with only given attributes.
     */
    public function onlyChanged(...$only): bool
    {
        return Arr::has($this->getChanges(), $only);
    }

    /**
     * Determine if the model has changes with some given attributes.
     */
    public function someChanged(...$only): bool
    {
        return Arr::hasAny($this->getChanges(), $only);
    }
}
