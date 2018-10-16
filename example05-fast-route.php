<?php

require __DIR__.'/vendor/autoload.php';

$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) {
    $r->addRoute('GET', '/users/{id:\d+}', 'get_user_handler');
});

// Fetch method and URI from somewhere
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['PATH_INFO']; // Usually "REQUEST_URI"

// Strip query string (?foo=bar) and decode URI
if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);
switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        echo '<h1>404 Not Found</h1>';
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        echo '<h1>405 Method Not Allowed</h1>';
        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
        echo '<h1>Found!</h1>';
        echo '<h2>'.$handler.'</h2>';
        var_dump($vars);
        break;
}
