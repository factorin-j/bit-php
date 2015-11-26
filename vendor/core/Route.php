<?php

/**
 * Class Route
 */
class Route
{
    /** @var array $routes */
    protected $routes = array();

    /**
     * Create api string
     * @param $api
     * @return string
     */
    protected function createAPI($api)
    {
        $api = trim($api);
        if ($api == '/') {
            return $api;
        }

        $api = rtrim($api, '/');
        if (strpos($api, '/') !== 0) {
            $api = sprintf('/%s', $api);
        }

        return $api;
    }

    /**
     * Create method string
     * @param $method
     * @return string
     */
    protected function createMethod($method)
    {
        return strtoupper(trim($method));
    }

    protected function set($method, $api, $callback)
    {
        $api = $this->createAPI($api);
        $method = $this->createMethod($method);
        $this->routes[$method][$api] = $callback;
    }

    /**
     * Register data to routes
     * @param $method
     * @param $api
     * @param $callback
     */
    protected function register($method, $api, $callback)
    {
        if (is_array($api)) {
            foreach ($api as $v) {
                $this->set($method, $v, $callback);
            }
        } else {
            $this->set($method, $api, $callback);
        }
    }

    /**
     * Register GET route
     * @param $api
     * @param Closure $callback
     */
    public function get($api, Closure $callback)
    {
        $this->register('GET', $api, $callback);
    }

    /**
     * Register POST route
     * @param $api
     * @param Closure $callback
     */
    public function post($api, Closure $callback)
    {
        $this->register('POST', $api, $callback);
    }

    /**
     * Register PUT route
     * @param $api
     * @param Closure $callback
     */
    public function put($api, Closure $callback)
    {
        $this->register('PUT', $api, $callback);
    }

    /**
     * Register DELETE route
     * @param $api
     * @param Closure $callback
     */
    public function delete($api, Closure $callback)
    {
        $this->register('DELETE', $api, $callback);
    }

    /**
     * Call or execute method and api
     * @param $method
     * @param $api
     * @return mixed
     * @throws Exception
     */
    public function call($method, $api)
    {
        $api = $this->createAPI($api);
        if (!isset($this->routes[$method][$api])) {
            throw new Exception(sprintf('Route not found (method: %s | api: %s)', $method, $api));
        }

        return call_user_func($this->routes[$method][$api]);
    }
}
