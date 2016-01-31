<?php

namespace SalesModule\Views;

use SalesModule\Templates;

class Page extends IView {

    protected $controller;

    public $data;

    protected $templateName;

    protected $templatePath;

    public function __construct($controller) {
        $this->controller = $controller;
    }

    public function setTemplate($templateName) {
        $this->templateName = $templateName;
        $this->templatePath = THEME_DIR . DIR_SEPARATOR . 'templates' . DIR_SEPARATOR . $templateName . '.php';
    }

    public function forTemplate() {
        if (!$this->templateName || !file_exists($this->templatePath)) {
            $this->setTemplate('ErrorPage');
            include ($this->templatePath);
            return false;
        }

        $data = $this->data;

        foreach ($data as $key => $value) {
            $$key = $this->escape($value);
        }

        include ($this->templatePath);
    }

    public function setData(string $name, $value, $escape = true) {
        if($escape) $value = $this->escape($value);
        $this->data[$name] = $value;
    }


} 