<?php

define('__ROOT__', dirname(__DIR__));

require_once(__ROOT__ . '/vendor/autoload.php');
require_once(__ROOT__ . '/app/config/bootstrap.php');

Application::init()->run();
