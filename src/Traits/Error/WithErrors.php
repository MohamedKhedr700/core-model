<?php

namespace Raid\Core\Model\Traits\Error;

use Raid\Core\Model\Errors\Errors;

trait WithErrors
{
    /**
     * Errors instance.
     */
    protected Errors $errors;

    /**
     * Get the errors handler instance.
     */
    public function errors(): Errors
    {
        if (! isset($this->errors)) {
            $this->errors = new Errors();
        }

        return $this->errors;
    }
}
