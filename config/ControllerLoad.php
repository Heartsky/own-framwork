<?php

class ControllerLoad {
    private $action;
    private $params;

    public function __construct() {

    }


    public static function loadResponse($router,$request){

        $controller = 'Controller\\'.$router['controller'];
        $action = $router['action'];
        $ctrObject = new $controller();

        return call_user_func_array(array($ctrObject, $action), [$request]);

    }




}