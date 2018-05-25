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
    public function __construct($env = 'dev', $debug = false){
         $this->env = $env;
         $config = Yaml::parseFile(__DIR__.'/config.yml');
         if(isset($config['router']))
         {
             $this->loadRouter($config['router']);
         }

    }
    public function loadController($param){
        if(isset($param['view'])){
            include $param['view'];
        }

    }

    public function execute($request){

    }


    private function loadRouter($routers){
        if($this->env == 'dev'){
            foreach ($routers as $router){
                $resources =  Yaml::parseFile(__DIR__.'/../'.$router['resource']);
                foreach ($resources as $item){
                    $resource = $item['resource'];
                    $type = $item['type'];
                    $pre = $item['prefix'];
                    if($type == 'annotation'){
                        $this->readAnnotationRoute($resource, $pre);
                    }

                }


            }

        }
    }

    private function readAnnotationRoute($resource, $prefix) {
        $finder = new Finder();
        $finder->files()->in(__DIR__.'/../'.$resource);

        require_once __DIR__ . '/../src/Service/Route.php';
        $reader = new AnnotationReader();
        foreach ($finder as $file) {

            $fileName = pathinfo($file->getRelativePathname(), PATHINFO_FILENAME);
            $reflectionClass = new ReflectionClass("Controller\\".$fileName);
            $methods = $reflectionClass->getMethods();
            $controller = $fileName;
            var_dump($controller);
            foreach ($methods as $method){
                var_dump($method->getName());
                $annotation  =  $reader->getMethodAnnotations($method);
                foreach ($annotation as $ann)
                {

                    var_dump( $ann->getName());
                }

            }




//                    $property = $reflectionClass->getProperty('bar');
//                    $data = $reader->getMethodAnnotations($property);
//                    echo  "<pre>";
//                    var_dump($data);



        }

        exit;
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