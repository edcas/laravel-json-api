<?php

namespace CloudCreativity\JsonApi\Routing;

use Illuminate\Routing\Router as BaseRouter;

/**
 * Class Router
 * @package CloudCreativity\JsonApi
 */
class Router extends BaseRouter
{

    /**
     * @param $name
     * @param $controller
     * @param array $options
     * @return void
     */
    public function jsonApi($name, $controller, array $options = [])
    {
        if ($this->container && $this->container->bound(ResourceRegistrar::class)) {
            /** @var ResourceRegistrar $registrar */
            $registrar = $this->container->make(ResourceRegistrar::class);
        } else {
            $registrar = new ResourceRegistrar($this);
        }

        $registrar->resource($name, $controller);
    }
}