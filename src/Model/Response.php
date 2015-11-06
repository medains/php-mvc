<?php

namespace Acme\Model;

class Response {

    private $headers = array();
    private $body = '';
    private $httpCode = 200;

    public function addHeader($header, $value) {
        array_push($this->headers, array( 'key'=> $header, 'val'=> $value ));
    }

    public function setBody($body) {
        $this->body = $body;
    }

    public function notFound() {
        $this->httpCode = 404;
    }

    public function serverError() {
        $this->httpCode = 500;
    }

    public function render() {
        http_response_code($this->httpCode);
        foreach ($this->headers as $header) {
            echo $header['key'] . ': '. $value['val'];
        }
        echo '';
        echo $this->body;
    }
}
