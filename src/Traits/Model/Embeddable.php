<?php

namespace Raid\Core\Model\Traits\Model;

trait Embeddable
{
    /**
     * Define shared data to be embedded to a resource.
     */
    public function toEmbed(): array
    {
        return $this->only([
            'id',
        ]);
    }
}
