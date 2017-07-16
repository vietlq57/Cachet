<?php

routesInDirectory();

function routesInDirectory($app = '') {
    $routeDir = app_path('routes/' . $app . ($app !== '' ? '/' : NULL));
    $iterator = new RecursiveDirectoryIterator($routeDir);
    $iterator->setFlags(RecursiveDirectoryIterator::SKIP_DOTS);

    foreach($iterator as $route) {
        $isDotFile = strpos($route->getFilename());

        if (!$isDotFile && !$route->isDir()) {
            require $routeDir . $route->getFilename();
        }
    }
}
