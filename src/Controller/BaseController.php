<?php
namespace Controller;


use System\Controller as Controller;
use Symfony\Component\HttpFoundation\Response;


abstract  class BaseController extends Controller{
    private $twig;

    public function __construct()
    {

        $loader = new \Twig_Loader_Filesystem(__DIR__.'../../views');
        $this->twig = new \Twig_Environment($loader);
    }

    protected function render($view, $params)
    {
        $view  = $this->twig->render($view, $params);
        $response = new Response();
        $response->setContent($view);
        $response->setStatusCode(200);
        return $response;

    }


}