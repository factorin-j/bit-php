<?php

/**
 * Class Application
 */
class Application
{
    /** @var Application $instance */
    protected static $instance;

    /** @var Route $route */
    protected $route;

    /**
     * Class constructor
     * --set route object
     */
    protected function __construct()
    {
        $this->route = new Route();
    }

    /**
     * Invoke api method and callback
     * @return mixed
     * @throws Exception
     */
    protected function invoke()
    {
        $method = $_SERVER['REQUEST_METHOD'];
        $api = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '/';

        return $this->route()->call($method, $api);
    }

    /**
     * Application singleton
     * @return Application
     */
    public static function init()
    {
        if (!self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * @return Route
     */
    public function route()
    {
        return $this->route;
    }

    /**
     * Run application
     */
    public function run()
    {
        $view = $this->invoke();
        if ($view instanceof View) {
            echo($view->build());
        } else {
            echo(sprintf('%s', $view));
        }
    }
}
