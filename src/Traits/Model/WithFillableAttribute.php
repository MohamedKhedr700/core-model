<?php

namespace Raid\Core\Model\Traits\Model;

use Raid\Core\Model\Models\Attribute;

trait WithFillableAttribute
{
    /**
     * Fill an attribute.
     */
    public function fillAttribute(string $key, mixed $value = null, mixed $default = null, bool $forceFill = false): static
    {
        $this->attributes[$key] = $value ?? $default;

        $this->saveAttributes($forceFill);

        return $this;
    }

    /**
     * Force fill an attribute.
     */
    public function forceFillAttribute(string $key, mixed $value = null, mixed $default = null): static
    {
        return $this->fillAttribute($key, $value, $default, true);
    }

    /**
     * Fill attributes.
     */
    public function fillAttributes(array $attributes, bool $forceFill = false): static
    {
        foreach ($attributes as $key => $value) {
            $this->fillAttribute($key, $value);
        }

        $this->saveAttributes($forceFill);

        return $this;
    }

    /**
     * Force fill model attributes.
     */
    public function forceFillAttributes(array $attributes): static
    {
        return $this->fillAttributes($attributes, true);
    }

    /**
     * Get a fillable attribute.
     */
    public function fillableAttribute(string $key, mixed $value = null, mixed $default = null, bool $forceFill = false): Attribute
    {
        $attribute = new Attribute($key, $value, $default, $forceFill);

        if ($forceFill) {
            $this->fillAttr($attribute);
        }

        return $attribute;
    }

    /**
     * Fill a model attribute.
     */
    public function fillAttr(Attribute $attribute): static
    {
        return $this->fillAttribute($attribute->getAttribute(), $attribute->getValue(), $attribute->getDefault(), $attribute->isForceFill());
    }

    /**
     * Force fill a model attribute.
     */
    public function forceFillAttr(Attribute $attribute): static
    {
        return $this->forceFillAttribute($attribute->getAttribute(), $attribute->getValue(), $attribute->getDefault());
    }
}
