<?php

declare(strict_types=1);

namespace Core;

class Container
{    
    /**
     * services
     *
     * @var array
     */
    private $services = [];

    public function set($name, $service)
    {
        $this->services[$name] = $service;
    }

    public function get($name)
    {
        if (!isset($this->services[$name])) {
            throw new \Exception("Service not found: {$name}");
        }

        $service = $this->services[$name];
        if (is_callable($service)) {
            return $service();
        }

        return $service;
    }
}
