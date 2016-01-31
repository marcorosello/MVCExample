<?php

namespace SalesModule\Models;

class OrderItem {

    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $ean;

    /**
     * @var int
     */
    private $quantity;

    /**
     * @var double
     */
    private $price;

    /**
     * @var Order
     */
    private $order_id;
} 