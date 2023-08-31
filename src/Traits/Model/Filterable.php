<?php

namespace Raid\Core\Model\Traits\Model;

use EloquentFilter\Filterable as BaseFilterable;

trait Filterable
{
    use BaseFilterable;

    /**
     * Filter class.
     */
    protected string $filter;

    /**
     * Provide model filter.
     */
    public function modelFilter(): ?string
    {
        if (! isset($this->filter)) {
            return null;
        }

        return $this->provideFilter($this->filter);
    }
}
