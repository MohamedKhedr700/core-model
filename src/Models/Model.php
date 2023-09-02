<?php

namespace Raid\Core\Model\Models;

use Raid\Core\Model\Models\Contracts\ModelInterface;
use Raid\Core\Model\Traits\Model\Attributable;
use Raid\Core\Model\Traits\Model\Changeable;
use Raid\Core\Model\Traits\Model\Embeddable;
use Raid\Core\Model\Traits\Model\Filterable;
use Raid\Core\Model\Traits\Model\Shareable;
use Raid\Core\Model\Traits\Model\WithEmbedded;

class Model extends BaseModel implements ModelInterface
{
    use Attributable,
        Changeable,
        Embeddable,
        Filterable,
        Shareable,
        WithEmbedded;

    /**
     * {@inheritdoc}
     */
    protected $fillable = [];

    /**
     * {@inheritdoc}
     */
    protected static function boot(): void
    {
        parent::boot();

        static::created(function ($model) {
            static::fillCreatedBy($model);
            static::fillModelId($model);
        });

        static::updating(function ($model) {
            static::fillUpdatedBy($model);
        });
    }

    /**
     * Fill model id.
     */
    protected static function fillModelId(ModelInterface $model): void
    {
        $model->forceFillAttribute('id', $model->getId());
    }

    /**
     * Fill model created by.
     */
    protected static function fillCreatedBy(ModelInterface $model): void
    {
        $model->fillAttribute('created_by', auth()->check() ? account()?->accountId() : null);
    }

    /**
     * Fill model updated by.
     */
    protected static function fillUpdatedBy(ModelInterface $model): void
    {
        $model->fillAttribute('updated_by', auth()->check() ? account()?->accountId() : null);
    }
}
