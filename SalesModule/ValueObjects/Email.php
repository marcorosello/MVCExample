<?php

namespace SalesModule\ValueObjects;

class Email {

    private $email;

    public function __construct(string $email) {
        //validate email
        $this->email = $email;
    }

    public function __string() {
        return $this->email;
    }
} 