<?php
use Symfony\Component\Yaml\Yaml;
use Symfony\Component\Finder\Finder;
use Doctrine\Common\Annotations\AnnotationReader;

class Router {
    private static $router = null;
    private static $isLoad = false;
    private $listRouter = [];

    private function __construct($routers) {
        $this->loadRouter($routers);
    }

    public static function getInstance($routers){
        if(empty( self::$router) && self::$isLoad == false){
            self::$router = new Router($routers);
        }
        return self::$router;
    }
    private function loadRouter($routers){

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

    private function readAnnotationRoute($resource, $prefix) {
        $finder = new Finder();
        $finder->files()->in(__DIR__.'/../'.$resource);
      //  require_once __DIR__ . '/../src/Service/Route.php';

        $reader = new AnnotationReader();

        foreach ($finder as $file) {

            $fileName = pathinfo($file->getRelativePathname(), PATHINFO_FILENAME);
            $reflectionClass = new ReflectionClass("Controller\\".$fileName);
            $methods = $reflectionClass->getMethods();
            $controller = $fileName;

            foreach ($methods as $method){

                $annotation  =  $reader->getMethodAnnotations($method);
                var_dump($annotation);exit;
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

}
