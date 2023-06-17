<?php

class TemplateEngine {
    private $variables;

    public function __construct() {
        $this->variables = array();
    }

    public function assign($name, $value) {
        $this->variables[$name] = $value;
    }

    public function render($templateFile) {
        if (file_exists($templateFile)) {
            extract($this->variables);
            ob_start();
            include $templateFile;
            $content = ob_get_clean();
            return $content;
        } else {
            throw new Exception("Template file '$templateFile' does not exist.");
        }
    }
}