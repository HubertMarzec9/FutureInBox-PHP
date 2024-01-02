<?php

namespace Core;

class Container
{
    private $bindings = [];

    public function bind($key, $fun)
    {
        $this->bindings[$key] = $fun;
    }

    /**
     * @throws \Exception
     */
    public function resolve($key)
    {
        if (!array_key_exists($key, $this->bindings)) {
            throw new \Exception("No matching binding found for {$key}");
        }

        $resolver = $this->bindings[$key];
        return call_user_func($resolver);
    }
}