<?php

namespace Raid\Core\Model\Traits\Model;

trait Castable
{
    /**
     * Additional cast.
     */
    protected array $additionalCast = [];

    public function setAdditionalCast(array $additionalCast): void
    {
        $this->additionalCast = $additionalCast;
    }

    /**
     * Get additional cast.
     */
    public function additionalCast(): array
    {
        return $this->additionalCast;
    }

    /**
     * Get the cast array.
     */
    public function getCasts(): array
    {
        $casts = parent::getCasts();

        return array_merge($casts, $this->additionalCast());
    }
}
