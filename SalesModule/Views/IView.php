<?php

namespace SalesModule\Views;


abstract class IView {

    abstract public function forTemplate();

    protected function escape($value) {
        return (is_string($value)) ? htmlspecialchars($value, ENT_COMPAT, 'UTF-8') : $value;
    }

}