<?php

namespace Http\Forms;

use Core\ValidationException;
use Core\Validator;

class LoginForm
{
    protected array $errors = [];

    public function __construct(public array $attributes)
    {
        if (!Validator::email($attributes['email'])) {
            $this->setError('email', 'Valid email');
        }


        if (!Validator::string($attributes['password'], 8, 256)) {
            $this->setError('password', 'Valid password');
        }
    }

    /**
     * @throws ValidationException
     */
    public static function validate($attributes): static
    {
        $instance = new static($attributes);

        return $instance->failed() ? $instance->throw() : $instance;
    }

    /**
     * @throws ValidationException
     */
    public function throw(): void
    {
        ValidationException::throw($this->errors, $this->attributes);
    }

    public function failed()
    {
        return count($this->errors);
    }

    public function getErrors(): array
    {
        return $this->errors;
    }

    public function setError($field, $message): LoginForm
    {
        $this->errors[$field] = $message;

        return $this;
    }
}

