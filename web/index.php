<?php

define('__ROOT__', dirname(__DIR__));

require_once(__ROOT__ . '/vendor/autoload.php');
require_once(__ROOT__ . '/app/config/bootstrap.php');

$app = Application::init();
$app->route()->get('/', function () {
    $name = Request::get('name', 'jm-factorin');
    $user = UserService::createUserByName($name);

    return View::render('default.index', array(
        'name' => $user->name
    ));
});
$app->run();
