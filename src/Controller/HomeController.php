<?php
namespace Controller;

use Symfony\Component\HttpFoundation\Request;
use Service\Route as Route;


class HomeController extends BaseController
{
    /**
     * @Route(path="/hello", name="home_index")
     */
    public function indexAction(Request $request) {

        return $this->render("home/index.php",['test' => 'aaaaaaaaaa']);
    }
    /**
     * @Route(path="/bye", name="home_exit")
     */
    public function byeAction(Request $request) {

    }


}