<?php
use Symfony\Component\Yaml\Yaml;
use Symfony\Component\Finder\Finder;
use Doctrine\Common\Annotations\AnnotationReader;
use Service\Route as SysRoute;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;

class Router {
    private static $router = null;
    private static $isLoad = false;
    private $listRouter = [];
    private $mappingRoute = [];

    private function __construct($routers) {
        $this->listRouter = new RouteCollection();
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
        require_once __DIR__ . '/../src/Service/Route.php';

        $reader = new AnnotationReader();
        foreach ($finder as $file) {

            $fileName = pathinfo($file->getRelativePathname(), PATHINFO_FILENAME);
            $reflectionClass = new ReflectionClass("Controller\\".$fileName);
            $methods = $reflectionClass->getMethods();
            $controller = $fileName;

            foreach ($methods as $method){
                $annotation  =  $reader->getMethodAnnotations($method);
                foreach ($annotation as $ann)
                {
                    if($ann instanceof SysRoute){

                        $this->listRouter->add($ann->getName(), new Route($prefix.$ann->getPath(),$ann->getDefaults()));
                        $this->mappingRoute[$ann->getName()] = ['controller' => $controller, 'action' => $method->getName()];
                    }
                }

            }
        }

    }

    public function mappingRouter($request){
        try{
            $context = new RequestContext();
            $context->fromRequest($request);
            $matcher = new UrlMatcher($this->listRouter, $context);
            extract($matcher->match($request->getPathInfo()), EXTR_SKIP);
            return $this->mappingRoute[$_route];
        } catch (Exception $e) {
            return false;
        }
    }

    /**
     * @return null
     */
    public static function getRouter()
    {
        return self::$router;
    }

    /**
     * @return array|RouteCollection
     */
    public function getListRouter()
    {
        return $this->listRouter;
    }

    /**
     * @return array
     */
    public function getMappingRoute()
    {
        return $this->mappingRoute;
    }



}
