<?php

$app = Application::init();

$app->route()->get('/', function () {
    $name = Request::get('name', 'jm-factorin');
    $user = UserService::createUserByName($name);

    return View::render('default.index', array(
        'name' => $user->name
    ));
});
