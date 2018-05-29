<?php
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Yaml\Yaml;
use Symfony\Component\Finder\Finder;
use Doctrine\Common\Annotations\AnnotationReader;
use Controller\BaseController;
const NOTFOUND_STATUS = 404;
const SUCCESS_STATUS = 200;


class App {
    private $env;
    private $router;
    public function __construct($env = 'dev'){
          $this->env = $env;
          $config = Yaml::parseFile(__DIR__.'/config.yml');

          if(isset($config['router']))
          {
             $this->router = $this->loadRouter($config['router']);
          }


         DB::getInstance( $env == 'dev');



    }


    public function loadController($param){
        if(isset($param['view'])){
            include $param['view'];
        }

    }

    public function execute($request){
        $currentRoute = $this->router->mappingRouter($request);
        if(empty($currentRoute)) {
            return new Response('Not Found', 404);
        }
        return ControllerLoad::loadResponse($currentRoute, $request);
    }


    private function loadRouter($routers){
        if($this->env == 'dev'){
            return Router::getInstance($routers);
        }
    }

    public function  loadDoctrine($config){
        if($this->env == 'dev') {
            $isDevMode = true;
            $config = Setup::createAnnotationMetadataConfiguration(array(__DIR__ . "/src"), $isDevMode);
        }
    }

    private function validateController($controller) {
        $baseControllerDir = __DIR__ . '/../src/Controller/';
        $dir = $baseControllerDir.$controller.'Controller.php';

        if(file_exists ($dir)) {
            $controllerName =  $controller.'Controller';

            return ['controller' => new $controllerName(), 'status' => SUCCESS_STATUS];
        } else {
            return ['status' => NOTFOUND_STATUS,'message' => 'can not find out controller with named '.$controller.'Controller.php'];
        }
    }

}