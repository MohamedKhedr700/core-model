<?php

namespace Raid\Core\Model;

use Illuminate\Support\MessageBag;

class Errors
{
    /**
     * Message bag instance.
     */
    protected ?MessageBag $messageBag = null;

    /**
     * Errors array.
     */
    protected array $errors = [];

    /**
     * Add an error message.
     */
    public function add(string $key, string $message): void
    {
        $this->messageBag = (new MessageBag())->add($key, $message);

        $this->errors[] = $this->messageBag;
    }

    /**
     * Get the message bag instance.
     */
    public function messageBag(): ?MessageBag
    {
        return $this->messageBag;
    }

    /**
     * Get the errors.
     */
    public function errors(): array
    {
        return $this->errors;
    }

    /**
     * Determine if the message bag has any errors.
     */
    public function any(): bool
    {
        return (bool) $this->messageBag()?->any();
    }

    /**
     * Get the errors as an array.
     */
    public function toArray(): array
    {
        $errors = [];

        foreach ($this->errors() as $error) {
            $errors = array_merge_recursive($errors, $error->toArray());
        }

        return $errors;
    }

    /**
     * Get the first error message.
     */
    public function first(): string
    {
        return (string) $this->messageBag()?->first();
    }
}
