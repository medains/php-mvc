<?php

namespace Acme\Controller;

class Error {
    public function badRouting($request, $response) {
        $response->notFound();
        $response->setBody('PAGE NOT FOUND');
    }
    public function controllerError($request, $response) {
        $response->serverError();
        $response->setBody('ERROR IN SYSTEM');
    }
}
