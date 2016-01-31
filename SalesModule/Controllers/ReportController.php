<?php

namespace SalesModule\Controllers;

use SalesModule\Repositories\CustomerRepository;
use SalesModule\Repositories\OrderRepository;

class ReportController extends Controller {

    public function filter() {
        if(isset($_POST))  {

            $dateFrom = $_POST['DateFrom'] ?? null;
            $dateTo = $_POST['DateTo'] ?? null;

            $topCustomers = CustomerRepository::getTopByNumOfOrders($dateFrom, $dateTo, 10);
            $this->view->setData('TopCustomersByNumOfOrders', $topCustomers);

            $topOrders = OrderRepository::getTopOrdersByRevenue($dateFrom, $dateTo, 10);
            $this->view->setData('TopOrdersByRevenue', $topOrders);

        }

        $this->view->forTemplate();
    }


    //todo this with a database query, 3 foreaches are not very efficient...
    public function chartdata() {
        $customers = CustomerRepository::getAll();
        $orders = OrderRepository::getAll();

        foreach($customers as $customer) {
            $date = (string) $customer->getCreated();
            $data[$date] = $data[$date] ?? ['Customers' => 0, 'Orders' => 0];
            $data[$date]['Customers']++;
        }

        foreach($orders as $order) {
            $date = (string) $order->getPurchaseDate();
            $data[$date] = $data[$date] ?? ['Customers' => 0, 'Orders' => 0];
            $data[$date]['Orders']++;
        }

        //format data for the map
        foreach($data as $date => $value) {
            $formattedData[] = [$date, $value['Customers'], $value['Orders']];
        }

        sort($formattedData);
        $formattedData[0] = ['Day', 'Customer', 'Orders'];

        return $this->handleJsonResponse($formattedData);

    }
}