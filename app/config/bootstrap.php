<?php

spl_autoload_register(function ($class) {
    $path = sprintf('%s/app/models/%s.php', __ROOT__, $class);
    if (!file_exists($path)) {
        throw new Exception(sprintf('Class %s not found (path: %s)', $class, $path));
    }

    /** @noinspection PhpIncludeInspection */
    require_once($path);
});
