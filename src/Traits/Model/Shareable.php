<?php

namespace Raid\Core\Model\Traits\Model;

trait Shareable
{
    /**
     * Define shared attributes from model.
     */
    public function shared(...$sharedAttributes): array
    {
        if (empty($sharedAttributes)) {
            $sharedAttributes = static::sharedAttributes();
        }

        return $this->attributes(...$sharedAttributes);
    }
}
