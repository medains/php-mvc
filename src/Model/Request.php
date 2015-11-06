<?php

namespace Acme\Model;

class Request {

    public function __construct($get, $post, $server) {
        $this->get = $get;
        $this->post = $post;
        $this->server = $server;
    }
}
