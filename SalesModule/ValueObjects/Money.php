<?php

namespace SalesModule\ValueObjects;

use SalesModule\Views\IView;

class Money extends IView {

    private $amount;

    public function __construct($amount) {
        $this->amount = floatval($amount);
    }

    public function forTemplate() {
        return $this->escape($this->amount . MONEY_SYMBOL);
    }
} 