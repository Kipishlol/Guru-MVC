<?php

session_start();

;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;
include 'vendor/autoload.php';

if (! isset($_SESSION['auth']) AND $_SERVER['REQUEST_URI'] != '/login') {
    header('Location: /login');
    die();

}

$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) {
    $r->addRoute('GET', '/', function(){
      $controller = new App\Controller\Main();
      $controller->run();
    });

    $r->addRoute(['GET', 'POST'], '/login', function(){
      $controller = new App\Controller\Login();
      $controller->run();
    });    

    // Модуль пользователя ------------------------------
    $r->addRoute(['GET', 'POST'], '/users', function(){
        $controller = new App\Controller\Users();
        $controller->run();
      }); 

    $r->addRoute(['GET', 'POST'], '/users/add', function(){
        $controller = new App\Controller\Users();
        $controller->runAdd();
      }); 
    $r->addRoute(['GET', 'POST'], '/users/edit', function(){
        $controller = new App\Controller\Users();
        $controller->runEdit();
      }); 
    $r->addRoute(['GET', 'POST'], '/users/delete', function(){
        $controller = new App\Controller\Users();
        $controller->runDelete();
      });

    #Модуль доходов
    $r->addRoute(['GET', 'POST'], '/incomes', function(){
        $controller = new App\Controller\Incomes();
        $controller->run();
      });
    $r->addRoute(['GET', 'POST'], '/incomes/add', function(){
        $controller = new App\Controller\Incomes();
        $controller->runAdd();
      });
      $r->addRoute(['GET', 'POST'], '/expense', function(){
        $controller = new App\Controller\Expense();
        $controller->run();
      });
      $r->addRoute(['GET', 'POST'], '/expense/app', function(){
        $controller = new App\Controller\Expense();
        $controller->runAdd();
      });
      $r->addRoute(['GET', 'POST'], '/action/edit', function(){
        $controller = new App\Controller\Action();
        $controller->runEdit();
      });
});

// Fetch method and URI from somewhere
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

// Strip query string (?foo=bar) and decode URI
if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);
switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        echo '404 - не создан роут';
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        // ... 405 Method Not Allowed
        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
        $handler($vars);
        break;
}