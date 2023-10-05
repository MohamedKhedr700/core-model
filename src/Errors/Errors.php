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
     * Errors array.
     */
    protected array $errors = [];

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
     *
     * Determine if the message bag has any errors.
     */
    public function any(): bool
    {
        return $this->messageBag()->any();
    }

    /**
     * Get the first error message.
     */
    public function first(): string
    {
        return $this->messageBag()->first();
    }

    /**
     * Get the errors as an array.
     */
    public function toArray(): array
    {
        return $this->messageBag()->toArray();
    }
}
