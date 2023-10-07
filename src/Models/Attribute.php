<?php

namespace Raid\Core\Model\Models;

class Attribute
{
    /**
     * Attribute name.
     */
    private string $attribute;

    /**
     * Attribute value.
     */
    private mixed $value;

    /**
     * Attribute default value.
     */
    private mixed $default;

    /**
     * Attribute force fill.
     */
    private bool $forceFill;

    /**
     * Create a new attribute instance.
     */
    public function __construct(string $attribute = '', mixed $value = null, mixed $default = null, bool $forceFill = true)
    {
        $this->attribute($attribute);
        $this->value($value);
        $this->default($default);
        $this->forceFill($forceFill);
    }

    /**
     * Set attribute name.
     */
    public function attribute(string $attribute): static
    {
        $this->attribute = $attribute;

        return $this;
    }

    /**
     * Set attribute value.
     */
    public function value(mixed $value, mixed $default = null): static
    {
        $this->value = $value ?? $default;

        return $this;
    }

    /**
     * Get attribute.
     */
    public function default(mixed $default): static
    {
        $this->default = $default;

        return $this;
    }

    /**
     * Set attribute force fill.
     */
    public function forceFill(bool $forceFill): static
    {
        $this->forceFill = $forceFill;

        return $this;
    }

    /**
     * Get an attribute key.
     */
    public function getAttribute(): string
    {
        return $this->attribute;
    }

    /**
     * Get attribute value.
     */
    public function getValue(): mixed
    {
        return $this->value ?? $this->getDefault();
    }

    /**
     * Get attribute default value.
     */
    public function getDefault(): mixed
    {
        return $this->default;
    }

    /**
     * Set attribute force fill.
     */
    public function isForceFill(): bool
    {
        return $this->forceFill;
    }

    /**
     * Get attribute value as an array.
     */
    public function toArray(): array
    {
        return [
            $this->getAttribute() => $this->getValue(),
        ];
    }
}
