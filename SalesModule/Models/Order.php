<?php

namespace SalesModule\Models;

use SalesModule\ValueObjects\Money;

class Order {

    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $country;

    /**
     * @var string
     */
    private $device;

    /**
     * @var string
     */
    private $purchase_date;

    /**
     * @var array
     */
    private $order_items;

    /**
     * @var int
     */
    private $customer_id;

    //todo make money a value object
    /**
     * @var Money
     */
    private $total_revenue;

    public function getPurchaseDate() {
        return $this->purchase_date;
    }

    public function getID() : int {
        return $this->id;
    }

    public function setTotalRevenue(Money $revenue) {
        $this->total_revenue = $revenue;
    }

    public function getTotalRevenue() {
        return $this->total_revenue;
    }

    public function __construct(int $id, string $country, string $device, $purchase_date) {
        $this->id = $id;
        $this->country = $country;
        $this->device = $device;
        $this->purchase_date = $purchase_date;
    }

} 