<?php

namespace SalesModule\Views;

use SalesModule\Repositories\CustomerRepository;
use SalesModule\Repositories\OrderRepository;
use SalesModule\Templates;

class ReportPage extends Page {

    public function __construct($controller) {
        parent::__construct($controller);
        $controller->setView($this);
    }

    public function forTemplate() {
        $this->setTemplate('ReportPage');
        $this->setData('Title', 'Reports');
        $this->setData('TotalCustomers', $this->data['TotalCustomers'] ?? CustomerRepository::getTotalCount());
        $this->setData('TotalOrders', $this->data['TotalOrders'] ?? OrderRepository::getTotalCount());
        $this->setData('TopCustomersByNumOfOrders', $this->data['TopCustomersByNumOfOrders'] ?? CustomerRepository::getTopByNumOfOrders());
        $this->setData('TopOrdersByRevenue', $this->data['TopOrdersByRevenue'] ?? OrderRepository::getTopOrdersByRevenue());
        $this->setData('FilterForm', $this->getFilterForm(), false);
        parent::forTemplate();
    }

    public function getFilterForm() {
        $html = '<form action="?action=filter" method="post">
        <label>From</label>
        <input id="DateFrom" class="js-calendar" data-date-format="yyyy-m-d" name="DateFrom" type="text" />
        <label>To</label>
        <input id="DateTo" class="js-calendar" name="DateTo" data-date-format="yyyy-m-d" type="text" />
        <input class="btn btn-small btn-primary" type="submit" value="Submit">
        </form>';
        return $html;
    }
}