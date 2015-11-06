<?php

namespace Acme;

class View {

    private $template = '../views/default.phtml';
    private $templateDir = '../views/';
    private $data = array();

    public function getPath($template) {
        return '../views/'.$template.'.phtml';
    }

    public function setData($data) {
        $this->data = $data;
    }

    public function setTemplate($template) {
        $filename = $this->getPath($template);
        if (is_readable($filename)) {
            $this->template = $filename;
            $this->templateDir = realpath($filename);
        }
    }

    public function applyTemplate() {
        include $this->template;
    }

    public function includeTemplate($template) {
        include $this->templateDir.$template;
    }

    public function getArray($var, $context=false) {
        $c = $context;
        if (!$context) {
            $c = $this->data;
        }
        return (isset($c[$var])) ? $c[$var] : array();
    }

    public function get($var, $context=false) {
        $c = $context;
        if (!$context) {
            $c = $this->data;
        }
        return (isset($c[$var])) ? $c[$var] : '';
    }

    public function out($var) {
        echo htmlspecialchars($var, ENT_COMPAT, 'utf-8');
    }

    public function raw($var) {
        echo $var;
    }

    public function json($var) {
        $this->raw(json_encode($var));
    }

    public function render() {
        ob_start();
        $this->applyTemplate();
        return ob_get_clean();
    }
}
