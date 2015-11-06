<?php

namespace Acme;

class Application {

    // This class performs basic routing for the application
    // Obviously more complex applications will benefit from
    // a routing class that allows for more complex URI
    // structures
    public function run() {
        $request = new Model\Request($_GET, $_POST, $_SERVER);
        $response = new Model\Response();

        $url = explode('/', $_SERVER['REQUEST_URI']);

        $controllerName = 'Acme\\Controller\\' . (!empty($url[1]) ? $url[1] : 'Index');
        $actionName = (count($url)>2 ? $url[2] : 'default') . 'Action';

        if (!class_exists($controllerName, true)) {
            $controllerName = 'Acme\\Controller\\Error';
            $actionName = 'badRouting';
        }
        try{
            $controller = new $controllerName();
            if (method_exists($controller, $actionName)) {
                $controller->$actionName($request, $response);
            } else {
                $controller = new Controller\Error();
                $controller->badRouting($request, $response);
            }
        } catch(Exception $e) {
            $controller = new Controller\Error();
            $controller->controllerError($request, $response);
        }

        $response->render();
    }

}
