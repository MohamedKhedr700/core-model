<?php

namespace Raid\Core\Model\Errors;

use Illuminate\Support\MessageBag;

class Errors
{
    /**
     * Message bag instance.
     */
    protected MessageBag $messageBag;

    /**
     * Create a new errors instance.
     */
    public function __construct()
    {
        $this->messageBag = new MessageBag();
    }

    /**
     * Get the message bag instance.
     */
    public function messageBag(): ?MessageBag
    {
        return $this->messageBag;
    }

    /**
     * Add an error message.
     */
    public function add(string $key, string $message): void
    {
        $this->messageBag()->add($key, $message);
    }

    /**
     * Determine if the message bag has any errors for the given key.
     */
    public function has(string $key): bool
    {
        return $this->messageBag()->has($key);
    }

    /**
     * Get the given key errors.
     */
    public function get(string $key): array
    {
        return $this->messageBag()->get($key);
    }

    /**
     * Determine if the message bag has any errors.
     */
    public function any(): bool
    {
        return $this->messageBag()->any();
    }

    /**
     * Get the first error message.
     */
    public function first(string $key = null): ?string
    {
        return $key ? $this->firstError($key) : ($this->messageBag()->first() ?? null);
    }

    /**
     * Get the last error message.
     */
    public function last(string $key = null): ?string
    {
        $errors = $this->messageBag()->get($key);

        return $errors[count($errors) - 1] ?? null;
    }

    /**
     * Get the first error message for the given key.
     */
    public function firstError(string $key): ?string
    {
        return $this->messageBag()->get($key)[0] ?? null;
    }

    /**
     * Get all the messages for every key.
     */
    public function all(string $format = null): array
    {
        return $this->messageBag()->all($format);
    }

    /**
     * Get the errors as an array.
     */
    public function toArray(): array
    {
        return $this->messageBag()->toArray();
    }

    /**
     * Get the errors as JSON.
     */
    public function toJson(int $options = JSON_ERROR_NONE): string
    {
        return $this->messageBag()->toJson($options);
    }
}
