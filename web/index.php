<?php

require_once __DIR__.'../../vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;




$request = Request::createFromGlobals();

$app = new App('dev',false);
$response = $app->execute($request);

$response->send();
/*
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;

const NOTFOUND_STATUS = 404;
const SUCCESS_STATUS = 200;



$response = new Response();

$routes = new RouteCollection();
$routes->add('hello', new Route('/home/hello/{name}', array('name' => 'World')));
$routes->add('bye', new Route('/home/bye'));



$context = new RequestContext();
$context->fromRequest($request);
$matcher = new UrlMatcher($routes, $context);


$map = array(
    '/home/hello' =>[
        'controller' => 'Home',
        'action' => 'index',
        'view' => __DIR__.'/../src/views/home/index.php'

    ],
    '/home/bye'   => [
        'controller' => 'Home',
        'action' => 'index',
        'view' => __DIR__.'/../src/views/home/exit.php'
    ],
);

    extract($matcher->match($request->getPathInfo()), EXTR_SKIP);

    ob_start();
    $app = new App();
    $app->loadController($_route);
    $response->setContent(ob_get_clean());
    $response->setStatusCode(200);
try{
} catch (ResourceNotFoundException $exception) {
   // $response = new Response('Not Found', 404);
} catch (Exception $exception){
    //$response->setStatusCode(500);
    //$response->setContent('Not Found');
}
$response->send();

*/







