<?php

namespace Acme\Controller;

class Index {

    public function defaultAction($request, $response) {
        $view = new \Acme\View();
        $view->setData(['name' => 'Mr MVC']);
        $response->setBody($view->render());
    }
}
