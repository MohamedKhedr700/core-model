<?php

namespace Raid\Core\Model\Traits\Model;

use Raid\Core\Model\Models\Contracts\ModelInterface;

trait Bootable
{
    /**
     * {@inheritdoc}
     */
    protected static function boot(): void
    {
        parent::boot();

        static::bootObservable();
    }

    /**
     * Fill model created by.
     */
    protected static function fillCreatedBy(ModelInterface $model): void
    {
        $model->fillAttribute('created_by', auth()->user()?->id);
    }

    /**
     * Fill model updated by.
     */
    protected static function fillUpdatedBy(ModelInterface $model): void
    {
        $model->fillAttribute('updated_by', auth()->user()?->id);
    }
}
