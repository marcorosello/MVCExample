<?php

namespace SalesModule\Models;

class Customer {

    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $first_name;

    /**
     * @var string
     */
    private $last_name;

    //todo email as a value object
    /**
     * @var Email
     */
    private $email;

    //todo create a data value object and use it
    /**
     * @var Date
     */
    private $created;

    public function getCreated() {
        return $this->created;
    }

    public function getName() : string {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function __construct(int $id, string $firstName, string $lastName, $email, $created) {
        $this->id = $id;
        $this->first_name = $firstName;
        $this->last_name = $lastName;
        $this->email = $email;
        $this->created = $created;
    }


}