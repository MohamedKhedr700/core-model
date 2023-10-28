<?php

namespace Raid\Core\Model\Traits\Model;

trait Associatable
{
    /**
     * Define shared data to be embedded to a resource.
     */
    public function toAssociate(): array
    {
        return $this->attributes('id');
    }
}
