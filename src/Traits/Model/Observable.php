<?php

namespace Raid\Core\Model\Traits\Model;

use Raid\Core\Model\Models\Contracts\ModelInterface;

trait Observable
{
    /**
     * {@inheritdoc}
     */
    public static function bootObservable(): void
    {
        static::creating(function ($model) {
            static::creatingObserve($model);
        });

        static::created(function ($model) {
            static::createdObserve($model);
        });

        static::updating(function ($model) {
            static::updatingObserve($model);
        });

        static::updated(function ($model) {
            static::updatedObserve($model);
        });

        static::deleting(function ($model) {
            static::deletingObserve($model);
        });

        static::deleted(function ($model) {
            static::deletedObserve($model);
        });
    }

    /**
     * {@inheritdoc}
     */
    public static function creatingObserve(ModelInterface $model): void
    {
        static::fillCreatedBy($model);
    }

    /**
     * {@inheritdoc}
     */
    public static function createdObserve(ModelInterface $model): void
    {
        //
    }

    /**
     * {@inheritdoc}
     */
    public static function updatingObserve(ModelInterface $model): void
    {
        static::fillUpdatedBy($model);
    }

    /**
     * {@inheritdoc}
     */
    public static function updatedObserve(ModelInterface $model): void
    {
        //
    }

    /**
     * {@inheritdoc}
     */
    public static function deletingObserve(ModelInterface $model): void
    {
        //
    }

    /**
     * {@inheritdoc}
     */
    public static function deletedObserve(ModelInterface $model): void
    {
        //
    }
}
